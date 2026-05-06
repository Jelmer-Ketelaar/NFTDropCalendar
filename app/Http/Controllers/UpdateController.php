<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\ListedProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class UpdateController extends Controller
{
    private const ALLOWED_BLOCKCHAINS = ['avalanche', 'cardano', 'ethereum', 'polygon', 'solana'];

    private const ALLOWED_CATEGORIES = ['Artwork', 'Fun', 'Metaverse'];

    public function index(Request $request): View|RedirectResponse
    {
        $dropParam = $request->query('drop', 'none');
        $projectParam = $request->query('project', 'none');
        $hasSelection = $dropParam !== 'none' || $projectParam !== 'none';

        if (! $hasSelection) {
            $drops = Drop::where('verified', 'true')->orderBy('dropDate')->get();
            $projects = ListedProject::where('verified', 'true')->orderBy('dateUploadDropUser')->get();

            return view('update.index', [
                'pageTitle' => 'Update',
                'currentPage' => 'update',
                'drops' => $drops,
                'projects' => $projects,
                'nft' => null,
                'dropParam' => 'none',
                'projectParam' => 'none',
            ]);
        }

        $nft = null;

        if ($dropParam !== 'none') {
            $id = $this->decodeId($dropParam);

            if ($id === null) {
                return redirect()->route('update');
            }

            $nft = Drop::find($id);
        } elseif ($projectParam !== 'none') {
            $id = $this->decodeId($projectParam);

            if ($id === null) {
                return redirect()->route('update');
            }

            $nft = ListedProject::find($id);
        }

        if ($nft === null) {
            return redirect()->route('update');
        }

        return view('update.index', [
            'pageTitle' => 'Update',
            'currentPage' => 'update',
            'nft' => $nft,
            'drops' => [],
            'projects' => [],
            'dropParam' => $dropParam,
            'projectParam' => $projectParam,
        ]);
    }

    public function updateDrop(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        if ($id === '' || ! ctype_digit((string) $id)) {
            return redirect()->route('update');
        }

        $validated = $request->validate([
            'projectName' => 'required|string|max:25',
            'projectDescription' => 'required|string|max:750',
            'blockchain' => 'required|in:' . implode(',', self::ALLOWED_BLOCKCHAINS),
            'inlineRadioOptions' => 'required|in:' . implode(',', self::ALLOWED_CATEGORIES),
            'dropDate' => 'nullable|string',
            'roadmap' => 'nullable|string|max:2000',
            'mintPrice' => 'nullable|string',
            'royality' => 'required|string',
            'supply' => 'required|string',
            'teamAmount' => 'required|string',
            'twitterName' => 'required|string',
            'discordLink' => 'required|string',
            'websiteLink' => 'required|string',
        ]);

        $twitterName = $this->normalizeTwitterUsername($validated['twitterName']);
        $discordLink = $this->normalizeUrl($validated['discordLink']);
        $websiteLink = $this->normalizeUrl($validated['websiteLink']);

        if ($twitterName === '' || $discordLink === '' || $websiteLink === '') {
            return back()->withErrors(['twitterName' => 'Invalid input.'])->withInput();
        }

        Drop::where('id', (int) $id)->update([
            'name' => e($validated['projectName']),
            'description' => e($validated['projectDescription']),
            'roadmap' => e($validated['roadmap'] ?? ''),
            'blockchain' => $validated['blockchain'],
            'dropDate' => e($validated['dropDate'] ?? ''),
            'category' => $validated['inlineRadioOptions'],
            'mintPrice' => e($validated['mintPrice'] ?? ''),
            'royality' => e($validated['royality']),
            'supply' => e($validated['supply']),
            'teamAmount' => e($validated['teamAmount']),
            'twitterName' => $twitterName,
            'discordLink' => $discordLink,
            'websiteLink' => $websiteLink,
            'updateStatus' => 'true',
        ]);

        return redirect()->route('drops.show', ['id' => base64_encode((string) $id)]);
    }

    public function updateProject(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        if ($id === '' || ! ctype_digit((string) $id)) {
            return redirect()->route('update');
        }

        $validated = $request->validate([
            'projectName' => 'required|string|max:25',
            'projectDescription' => 'required|string|max:750',
            'blockchain' => 'required|in:' . implode(',', self::ALLOWED_BLOCKCHAINS),
            'inlineRadioOptions' => 'required|in:' . implode(',', self::ALLOWED_CATEGORIES),
            'traits' => 'nullable|string',
            'floorPrice' => 'nullable|string',
            'roadmap' => 'nullable|string|max:2000',
            'volume' => 'nullable|string',
            'royality' => 'required|string',
            'supply' => 'required|string',
            'teamAmount' => 'required|string',
            'twitterName' => 'required|string',
            'discordLink' => 'required|string',
            'websiteLink' => 'required|string',
            'marketplaceLink' => 'required|string',
            'emailContact' => 'required|email|max:70',
        ]);

        $twitterName = $this->normalizeTwitterUsername($validated['twitterName']);
        $discordLink = $this->normalizeUrl($validated['discordLink']);
        $websiteLink = $this->normalizeUrl($validated['websiteLink']);
        $marketplaceLink = $this->normalizeUrl($validated['marketplaceLink']);

        if ($twitterName === '' || $discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
            return back()->withErrors(['twitterName' => 'Invalid input.'])->withInput();
        }

        ListedProject::where('id', (int) $id)->update([
            'name' => e($validated['projectName']),
            'description' => e($validated['projectDescription']),
            'roadmap' => e($validated['roadmap'] ?? ''),
            'blockchain' => $validated['blockchain'],
            'traits' => e($validated['traits'] ?? ''),
            'volume' => e($validated['volume'] ?? ''),
            'category' => $validated['inlineRadioOptions'],
            'floorPrice' => e($validated['floorPrice'] ?? ''),
            'royality' => e($validated['royality']),
            'supply' => e($validated['supply']),
            'teamAmount' => e($validated['teamAmount']),
            'twitterName' => $twitterName,
            'discordLink' => $discordLink,
            'websiteLink' => $websiteLink,
            'marketplaceLink' => $marketplaceLink,
            'emailContact' => $validated['emailContact'],
            'updateStatus' => 'true',
        ]);

        return redirect()->route('projects.show', ['id' => base64_encode((string) $id)]);
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
}
