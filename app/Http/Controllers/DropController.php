<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class DropController extends Controller
{
    private const array ALLOWED_BLOCKCHAINS = [
        'arbitrum', 'avalanche', 'binance', 'cardano',
        'elrond', 'ethereum', 'polygon', 'solana', 'venom',
    ];

    private const array ALLOWED_CATEGORIES = ['Artwork', 'Fun', 'Metaverse'];

    private const array ALLOWED_PROMOTIONS = ['promote', 'promote1', 'promote2', 'promote3'];

    public function explore(): View
    {
        $drops = Drop::where('verified', 'true')->orderBy('dropDate')->get();

        return view('drops.explore', [
            'pageTitle' => 'Explore Drops',
            'currentPage' => 'exploreDrops',
            'seoTitle' => 'NFTDropCalender: Check out all the NFT Drops',
            'seoDescription' => 'Explore the verified NFT drops on NFTDropCalender, a view of NFTs about to drop!',
            'drops' => $drops,
        ]);
    }

    public function show(Request $request): View|RedirectResponse
    {
        $encoded = $request->query('id');
        $id = $this->decodeId($encoded);

        if ($id === null) {
            return redirect()->route('home');
        }

        $drop = Drop::find($id);

        if ($drop === null) {
            return redirect()->route('home');
        }

        $otherDrops = Drop::where('verified', 'true')->inRandomOrder()->limit(9)->get();

        return view('drops.show', [
            'pageTitle' => $drop->name . ' | NFTDropCalendar',
            'currentPage' => 'nft',
            'seoTitle' => $drop->name . ' - NFTDropCalender.info',
            'seoDescription' => $drop->description,
            'drop' => $drop,
            'otherDrops' => $otherDrops,
        ]);
    }

    public function create(): View
    {
        return view('drops.create', [
            'pageTitle' => 'List Drop',
            'currentPage' => 'listDropFree',
            'seoTitle' => 'NFTDropCalendar is an event calendar for the growing NFT industry!',
            'seoDescription' => 'List here your own NFT drop on our NFT Calendar!',
            'blockchains' => self::ALLOWED_BLOCKCHAINS,
        ]);
    }

    public function store(Request $request): RedirectResponse|string
    {
        $validated = $request->validate([
            'projectName' => 'required|string|max:50',
            'projectDescription' => 'required|string|max:750',
            'blockchain' => 'required|in:' . implode(',', self::ALLOWED_BLOCKCHAINS),
            'inlineRadioOptions' => 'required|in:' . implode(',', self::ALLOWED_CATEGORIES),
            'dropDate' => 'required|string',
            'roadmap' => 'required|string|max:4000',
            'mintPrice' => 'required|string',
            'royality' => 'required|string',
            'supply' => 'required|string',
            'teamAmount' => 'required|string',
            'twitterName' => 'required|string',
            'discordLink' => 'required|string',
            'websiteLink' => 'required|string',
            'emailContact' => 'required|email|max:70',
            'traits' => 'required|string',
            'promotionBox' => 'nullable|in:' . implode(',', self::ALLOWED_PROMOTIONS),
            'thumbnail' => 'required|image|mimes:jpeg,png,gif,webp|max:10240',
        ]);

        $twitterName = $this->normalizeTwitterUsername($validated['twitterName']);
        $discordLink = $this->normalizeUrl($validated['discordLink']);
        $websiteLink = $this->normalizeUrl($validated['websiteLink']);

        if ($twitterName === '') {
            return back()->withErrors(['twitterName' => 'Invalid Twitter username.'])->withInput();
        }

        if ($discordLink === '' || $websiteLink === '') {
            return back()->withErrors(['discordLink' => 'Invalid URL.'])->withInput();
        }

        $filepath = $this->uploadImage($request, 'thumbnail');

        if ($filepath === null) {
            return back()->withErrors(['thumbnail' => 'Please upload a valid image file.'])->withInput();
        }

        $twitterFollowerCount = $this->fetchTwitterFollowerCount($twitterName);

        $drop = Drop::create([
            'name' => e($validated['projectName']),
            'description' => e($validated['projectDescription']),
            'blockchain' => $validated['blockchain'],
            'category' => $validated['inlineRadioOptions'],
            'thumbnail' => $filepath,
            'mintPrice' => e($validated['mintPrice']),
            'dropDate' => e($validated['dropDate']),
            'roadmap' => e($validated['roadmap']),
            'royality' => e($validated['royality']),
            'supply' => e($validated['supply']),
            'teamAmount' => e($validated['teamAmount']),
            'twitterName' => $twitterName,
            'discordLink' => $discordLink,
            'websiteLink' => $websiteLink,
            'emailContact' => $validated['emailContact'],
            'discordMemberNumber' => 0,
            'twitterFollowerNumber' => $twitterFollowerCount,
            'signature' => e($request->input('signature', '')),
            'traits' => e($validated['traits']),
            'promoted' => $validated['promotionBox'] ?? 'promote2',
        ]);

        return redirect()->route('drops.show', ['id' => base64_encode((string) $drop->id)]);
    }

    private function decodeId(?string $encoded): ?int
    {
        if ($encoded === null || $encoded === '' || $encoded === 'none') {
            return null;
        }

        $decoded = base64_decode($encoded, true);

        if ($decoded === false || ! ctype_digit($decoded)) {
            return null;
        }

        return (int) $decoded;
    }

    private function normalizeTwitterUsername(string $value): string
    {
        $value = trim($value);

        if (preg_match('#^https?://#i', $value)) {
            $path = parse_url($value, PHP_URL_PATH);
            $value = is_string($path) ? $path : $value;
        }

        $value = trim($value, "@/ \t\n\r\0\x0B");

        if (! preg_match('/^[A-Za-z0-9_]{1,15}$/', $value)) {
            return '';
        }

        return $value;
    }

    private function normalizeUrl(string $value): string
    {
        $value = trim($value);

        if ($value === '') {
            return '';
        }

        if (! preg_match('#^https?://#i', $value)) {
            $value = 'https://' . $value;
        }

        return filter_var($value, FILTER_VALIDATE_URL) ? $value : '';
    }

    private function fetchTwitterFollowerCount(string $username): int
    {
        if ($username === '') {
            return 0;
        }

        $url = 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=' . rawurlencode($username);
        $context = stream_context_create(['http' => ['timeout' => 3, 'ignore_errors' => true]]);
        $data = @file_get_contents($url, false, $context);

        if ($data === false) {
            return 0;
        }

        $parsed = json_decode($data, true);

        if (! is_array($parsed) || ! isset($parsed[0]['followers_count'])) {
            return 0;
        }

        return max(0, (int) $parsed[0]['followers_count']);
    }

    private function uploadImage(Request $request, string $field): ?string
    {
        if (! $request->hasFile($field) || ! $request->file($field)->isValid()) {
            return null;
        }

        $file = $request->file($field);
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = strtolower(trim(preg_replace('/[^A-Za-z0-9_-]+/', '-', $originalName) ?: 'upload', '-'));
        $safeName = $safeName !== '' ? $safeName : 'upload';
        $filename = date('Y-m-d-H-i-s') . '-' . bin2hex(random_bytes(4)) . '-' . $safeName . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images'), $filename);

        return 'images/' . $filename;
    }
}
