<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\ListedProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class AdminController extends Controller
{
    private const REVIEW_PASSWORD = 'Test';
    private const DB_PASSWORD = 'Jelmer01';

    public function review(Request $request): Response|RedirectResponse
    {
        if ($request->query('ww') !== self::REVIEW_PASSWORD) {
            abort(403);
        }

        $drops = Drop::where('verified', 'false')->get();
        $projects = ListedProject::where('verified', 'false')->get();
        $updatedDrops = Drop::where('updateStatus', '!=', '')->get();
        $updatedProjects = ListedProject::where('updateStatus', '!=', '')->get();

        return response(view('admin.review', compact('drops', 'projects', 'updatedDrops', 'updatedProjects')));
    }

    public function approveDrop(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if (! $id) {
            return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
        }

        Drop::where('id', $id)->update([
            'verified' => 'true',
            'discordMemberNumber' => $request->query('discordMemberNumber', 0),
            'twitterFollowerNumber' => $request->query('twitterFollowerAmount', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function approveProject(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if (! $id) {
            return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
        }

        ListedProject::where('id', $id)->update([
            'verified' => 'true',
            'floorPrice' => $request->query('floorPrice', 0),
            'traits' => $request->query('traits', 0),
            'volume' => $request->query('volume', 0),
            'discordMemberNumber' => $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function updateDropStatus(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if (! $id) {
            return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
        }

        Drop::where('id', $id)->update([
            'updateStatus' => '',
            'twitterFollowerNumber' => $request->query('twitterFollowerAmount', 0),
            'discordMemberNumber' => $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function updateProjectStatus(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if (! $id) {
            return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
        }

        ListedProject::where('id', $id)->update([
            'updateStatus' => '',
            'twitterFollowerNumber' => $request->query('twitterFollowerNumber', 0),
            'discordMemberNumber' => $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function database(Request $request): Response
    {
        if ($request->query('ww') !== self::DB_PASSWORD) {
            abort(403);
        }

        $drops = Drop::orderBy('id', 'desc')->get();
        $projects = ListedProject::orderBy('id', 'desc')->get();

        return response(view('admin.db', compact('drops', 'projects')));
    }

    public function updateDatabase(Request $request): RedirectResponse
    {
        $ids = $request->input('id', []);

        if (! is_array($ids) || count($ids) === 0) {
            return redirect()->route('admin.db', ['ww' => self::DB_PASSWORD]);
        }

        foreach ($ids as $index => $id) {
            Drop::where('id', $id)->update([
                'verified' => $request->input('verified')[$index] ?? 'false',
                'name' => $request->input('name')[$index] ?? '',
                'blockchain' => $request->input('blockchain')[$index] ?? '',
                'dropDate' => $request->input('dropDate')[$index] ?? null,
                'mintPrice' => $request->input('mintPrice')[$index] ?? null,
                'royality' => $request->input('royality')[$index] ?? 0,
                'supply' => $request->input('supply')[$index] ?? 0,
                'teamAmount' => $request->input('teamAmount')[$index] ?? 0,
                'twitterFollowerNumber' => $request->input('twitterFollowerNumber')[$index] ?? 0,
                'discordMemberNumber' => $request->input('discordMemberNumber')[$index] ?? 0,
                'promoted' => $request->input('promoted')[$index] ?? 'promote2',
                'twitterName' => $request->input('twitterName')[$index] ?? '',
                'discordLink' => $request->input('discordLink')[$index] ?? '',
                'websiteLink' => $request->input('websiteLink')[$index] ?? '',
            ]);
        }

        return redirect()->route('admin.db', ['ww' => self::DB_PASSWORD]);
    }

    public function deleteDrop(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if ($id) {
            Drop::where('id', $id)->delete();
        }

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function deleteProject(Request $request): RedirectResponse
    {
        $id = base64_decode($request->query('id', ''));

        if ($id) {
            ListedProject::where('id', $id)->delete();
        }

        return redirect()->route('admin.review', ['ww' => self::REVIEW_PASSWORD]);
    }

    public function edit(): Response
    {
        $drops = Drop::where('verified', 'true')->get();
        $projects = ListedProject::where('verified', 'true')->get();

        return response(view('admin.edit', compact('drops', 'projects')));
    }
}
