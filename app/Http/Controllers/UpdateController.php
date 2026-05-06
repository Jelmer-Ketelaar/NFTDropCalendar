<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateDropRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Drop;
use App\Models\ListedProject;
use App\Services\IdEncoderService;
use App\Services\InputNormalizationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class UpdateController extends Controller
{
    public function __construct(
        private readonly IdEncoderService $ids,
        private readonly InputNormalizationService $normalize,
    ) {}

    public function index(Request $request): View|RedirectResponse
    {
        $dropParam    = $request->query('drop', 'none');
        $projectParam = $request->query('project', 'none');
        $hasSelection = $dropParam !== 'none' || $projectParam !== 'none';

        if (! $hasSelection) {
            return view('update.index', [
                'pageTitle'    => 'Update',
                'currentPage'  => 'update',
                'drops'        => Drop::where('verified', true)->orderBy('dropDate')->get(),
                'projects'     => ListedProject::where('verified', true)->orderBy('dateUploadDropUser')->get(),
                'nft'          => null,
                'dropParam'    => 'none',
                'projectParam' => 'none',
            ]);
        }

        $nft = null;

        if ($dropParam !== 'none') {
            $id = $this->ids->decode($dropParam);
            if ($id === null) {
                return redirect()->route('update');
            }
            $nft = Drop::find($id);
        } elseif ($projectParam !== 'none') {
            $id = $this->ids->decode($projectParam);
            if ($id === null) {
                return redirect()->route('update');
            }
            $nft = ListedProject::find($id);
        }

        if ($nft === null) {
            return redirect()->route('update');
        }

        return view('update.index', [
            'pageTitle'    => 'Update',
            'currentPage'  => 'update',
            'nft'          => $nft,
            'drops'        => [],
            'projects'     => [],
            'dropParam'    => $dropParam,
            'projectParam' => $projectParam,
        ]);
    }

    public function updateDrop(UpdateDropRequest $request): RedirectResponse
    {
        $id = $request->input('id');

        if (! ctype_digit((string) $id)) {
            return redirect()->route('update');
        }

        $validated     = $request->validated();
        $twitterName   = $this->normalize->twitterUsername($validated['twitterName']);
        $discordLink   = $this->normalize->url($validated['discordLink']);
        $websiteLink   = $this->normalize->url($validated['websiteLink']);

        if ($twitterName === '' || $discordLink === '' || $websiteLink === '') {
            return back()->withErrors(['twitterName' => 'Invalid input.'])->withInput();
        }

        Drop::where('id', (int) $id)->update([
            'name'         => $validated['projectName'],
            'description'  => $validated['projectDescription'],
            'roadmap'      => $validated['roadmap'] ?? '',
            'blockchain'   => $validated['blockchain'],
            'dropDate'     => $validated['dropDate'] ?? '',
            'category'     => $validated['inlineRadioOptions'],
            'mintPrice'    => $validated['mintPrice'] ?? null,
            'royality'     => $validated['royality'],
            'supply'       => $validated['supply'],
            'teamAmount'   => $validated['teamAmount'],
            'twitterName'  => $twitterName,
            'discordLink'  => $discordLink,
            'websiteLink'  => $websiteLink,
            'updateStatus' => true,
        ]);

        return redirect()->route('drops.show', ['id' => $this->ids->encode((int) $id)]);
    }

    public function updateProject(UpdateProjectRequest $request): RedirectResponse
    {
        $id = $request->input('id');

        if (! ctype_digit((string) $id)) {
            return redirect()->route('update');
        }

        $validated       = $request->validated();
        $twitterName     = $this->normalize->twitterUsername($validated['twitterName']);
        $discordLink     = $this->normalize->url($validated['discordLink']);
        $websiteLink     = $this->normalize->url($validated['websiteLink']);
        $marketplaceLink = $this->normalize->url($validated['marketplaceLink']);

        if ($twitterName === '' || $discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
            return back()->withErrors(['twitterName' => 'Invalid input.'])->withInput();
        }

        ListedProject::where('id', (int) $id)->update([
            'name'            => $validated['projectName'],
            'description'     => $validated['projectDescription'],
            'roadmap'         => $validated['roadmap'] ?? '',
            'blockchain'      => $validated['blockchain'],
            'traits'          => $validated['traits'] ?? '',
            'volume'          => $validated['volume'] ?? null,
            'category'        => $validated['inlineRadioOptions'],
            'floorPrice'      => $validated['floorPrice'] ?? null,
            'royality'        => $validated['royality'],
            'supply'          => $validated['supply'],
            'teamAmount'      => $validated['teamAmount'],
            'twitterName'     => $twitterName,
            'discordLink'     => $discordLink,
            'websiteLink'     => $websiteLink,
            'marketplaceLink' => $marketplaceLink,
            'emailContact'    => $validated['emailContact'],
            'updateStatus'    => true,
        ]);

        return redirect()->route('projects.show', ['id' => $this->ids->encode((int) $id)]);
    }
}
