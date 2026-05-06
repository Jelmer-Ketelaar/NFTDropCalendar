<?php
namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\ListedProject;
use App\Services\IdEncoderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class AdminController extends Controller
{
    public function __construct(
        private readonly IdEncoderService $ids,
    ) {}

    public function review(Request $request): Response|RedirectResponse
    {
        if ($request->query('ww') !== config('admin.review_password')) {
            abort(403);
        }

        return response(view('admin.review', [
            'drops'           => Drop::where('verified', false)->get(),
            'projects'        => ListedProject::where('verified', false)->get(),
            'updatedDrops'    => Drop::where('updateStatus', true)->get(),
            'updatedProjects' => ListedProject::where('updateStatus', true)->get(),
        ]));
    }

    public function approveDrop(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
        }

        Drop::where('id', $id)->update([
            'verified'             => true,
            'discordMemberNumber'  => (int) $request->query('discordMemberNumber', 0),
            'twitterFollowerNumber'=> (int) $request->query('twitterFollowerAmount', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function approveProject(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
        }

        ListedProject::where('id', $id)->update([
            'verified'            => true,
            'floorPrice'          => (float) $request->query('floorPrice', 0),
            'traits'              => (int) $request->query('traits', 0),
            'volume'              => (float) $request->query('volume', 0),
            'discordMemberNumber' => (int) $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function updateDropStatus(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
        }

        Drop::where('id', $id)->update([
            'updateStatus'         => false,
            'twitterFollowerNumber'=> (int) $request->query('twitterFollowerAmount', 0),
            'discordMemberNumber'  => (int) $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function updateProjectStatus(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
        }

        ListedProject::where('id', $id)->update([
            'updateStatus'         => false,
            'twitterFollowerNumber'=> (int) $request->query('twitterFollowerNumber', 0),
            'discordMemberNumber'  => (int) $request->query('discordMemberNumber', 0),
        ]);

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function database(Request $request): Response
    {
        if ($request->query('ww') !== config('admin.db_password')) {
            abort(403);
        }

        return response(view('admin.db', [
            'drops'    => Drop::orderBy('id', 'desc')->get(),
            'projects' => ListedProject::orderBy('id', 'desc')->get(),
        ]));
    }

    public function updateDatabase(Request $request): RedirectResponse
    {
        $ids = $request->input('id', []);

        if (! is_array($ids) || count($ids) === 0) {
            return redirect()->route('admin.db', ['ww' => config('admin.db_password')]);
        }

        $fields = ['verified', 'name', 'blockchain', 'dropDate', 'mintPrice', 'royality',
                   'supply', 'teamAmount', 'twitterFollowerNumber', 'discordMemberNumber',
                   'promoted', 'twitterName', 'discordLink', 'websiteLink'];

        foreach ($ids as $index => $id) {
            if (! ctype_digit((string) $id)) {
                continue;
            }

            $data = [];
            foreach ($fields as $field) {
                $value = $request->input($field);
                if (is_array($value) && array_key_exists($index, $value)) {
                    $data[$field] = $value[$index];
                }
            }

            if (! empty($data)) {
                Drop::where('id', (int) $id)->update($data);
            }
        }

        return redirect()->route('admin.db', ['ww' => config('admin.db_password')]);
    }

    public function deleteDrop(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id !== null) {
            Drop::where('id', $id)->delete();
        }

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function deleteProject(Request $request): RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id !== null) {
            ListedProject::where('id', $id)->delete();
        }

        return redirect()->route('admin.review', ['ww' => config('admin.review_password')]);
    }

    public function edit(): Response
    {
        return response(view('admin.edit', [
            'drops'    => Drop::where('verified', true)->get(),
            'projects' => ListedProject::where('verified', true)->get(),
        ]));
    }
}
