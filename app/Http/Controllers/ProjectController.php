<?php

namespace App\Http\Controllers;

use App\Models\ListedProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class ProjectController extends Controller
{
    private const ALLOWED_BLOCKCHAINS = [
        'arbitrum', 'avalanche', 'binance', 'cardano',
        'elrond', 'ethereum', 'polygon', 'solana', 'venom',
    ];

    private const ALLOWED_CATEGORIES = ['Artwork', 'Fun', 'Metaverse'];

    private const ALLOWED_PROMOTIONS = ['promote', 'promote1', 'promote2', 'promote3'];

    public function explore(): View
    {
        $projects = ListedProject::where('verified', 'true')->get();

        return view('projects.explore', [
            'pageTitle' => 'Explore Projects',
            'currentPage' => 'exploreProject',
            'seoTitle' => 'NFTDropCalender: Check out all the NFT Projects',
            'seoDescription' => 'Explore the verified NFT projects on NFTDropCalender, a view of NFTs that already dropped!',
            'projects' => $projects,
        ]);
    }

    public function show(Request $request): View|RedirectResponse
    {
        $encoded = $request->query('id');
        $id = $this->decodeId($encoded);

        if ($id === null) {
            return redirect()->route('home');
        }

        $project = ListedProject::find($id);

        if ($project === null) {
            return redirect()->route('home');
        }

        return view('projects.show', [
            'pageTitle' => $project->name . ' | NFTDropCalendar',
            'currentPage' => 'project',
            'seoTitle' => $project->name . ' - NFTDropCalender.info',
            'seoDescription' => $project->description,
            'project' => $project,
        ]);
    }

    public function create(): View
    {
        return view('projects.create', [
            'pageTitle' => 'List Project',
            'currentPage' => 'listProjectFree',
            'seoTitle' => 'NFTDropCalendar: List your own NFT Drop!',
            'seoDescription' => 'List your own NFT Drop on our NFTDropCalendar! ✓ Free ✓ Best tool 2022 ✓ 235% Hype',
            'blockchains' => self::ALLOWED_BLOCKCHAINS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'projectName' => 'required|string|max:25',
            'projectDescription' => 'required|string|max:750',
            'blockchain' => 'required|in:' . implode(',', self::ALLOWED_BLOCKCHAINS),
            'inlineRadioOptions' => 'required|in:' . implode(',', self::ALLOWED_CATEGORIES),
            'traits' => 'nullable|string',
            'floorPrice' => 'required|string',
            'roadmap' => 'nullable|string|max:4000',
            'volume' => 'required|string',
            'royality' => 'required|string',
            'supply' => 'required|string',
            'teamAmount' => 'required|string',
            'twitterName' => 'required|string',
            'discordLink' => 'required|string',
            'websiteLink' => 'required|string',
            'marketplaceLink' => 'required|string',
            'emailContact' => 'required|email|max:70',
            'promotionBox' => 'nullable|in:' . implode(',', self::ALLOWED_PROMOTIONS),
            'thumbnail' => 'required|image|mimes:jpeg,png,gif,webp|max:10240',
        ]);

        $twitterName = $this->normalizeTwitterUsername($validated['twitterName']);
        $discordLink = $this->normalizeUrl($validated['discordLink']);
        $websiteLink = $this->normalizeUrl($validated['websiteLink']);
        $marketplaceLink = $this->normalizeUrl($validated['marketplaceLink']);

        if ($twitterName === '') {
            return back()->withErrors(['twitterName' => 'Invalid Twitter username.'])->withInput();
        }

        if ($discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
            return back()->withErrors(['discordLink' => 'Invalid URL.'])->withInput();
        }

        $filepath = $this->uploadImage($request, 'thumbnail');

        if ($filepath === null) {
            return back()->withErrors(['thumbnail' => 'Please upload a valid image file.'])->withInput();
        }

        $twitterFollowerCount = $this->fetchTwitterFollowerCount($twitterName);

        $project = ListedProject::create([
            'name' => e($validated['projectName']),
            'description' => e($validated['projectDescription']),
            'blockchain' => $validated['blockchain'],
            'category' => $validated['inlineRadioOptions'],
            'thumbnail' => $filepath,
            'traits' => e($validated['traits'] ?? ''),
            'floorPrice' => e($validated['floorPrice']),
            'roadmap' => e($validated['roadmap'] ?? ''),
            'volume' => e($validated['volume']),
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
            'promoted' => $validated['promotionBox'] ?? 'promote2',
            'marketplaceLink' => $marketplaceLink,
        ]);

        return redirect()->route('projects.show', ['id' => base64_encode((string) $project->id)]);
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
