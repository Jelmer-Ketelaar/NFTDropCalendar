<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\ListedProject;
use App\Services\IdEncoderService;
use App\Services\ImageUploadService;
use App\Services\InputNormalizationService;
use App\Services\TwitterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class ProjectController extends Controller
{
    public function __construct(
        private readonly IdEncoderService $ids,
        private readonly InputNormalizationService $normalize,
        private readonly TwitterService $twitter,
        private readonly ImageUploadService $images,
    ) {}

    public function explore(): View
    {
        $projects = ListedProject::where('verified', true)->get();

        return view('projects.explore', [
            'pageTitle'      => 'Explore Projects',
            'currentPage'    => 'exploreProject',
            'seoTitle'       => 'NFTDropCalender: Check out all the NFT Projects',
            'seoDescription' => 'Explore the verified NFT projects on NFTDropCalender, a view of NFTs that already dropped!',
            'projects'       => $projects,
        ]);
    }

    public function show(Request $request): View|RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('home');
        }

        $project = ListedProject::find($id);

        if ($project === null) {
            return redirect()->route('home');
        }

        return view('projects.show', [
            'pageTitle'      => $project->name . ' | NFTDropCalendar',
            'currentPage'    => 'project',
            'seoTitle'       => $project->name . ' - NFTDropCalender.info',
            'seoDescription' => $project->description,
            'project'        => $project,
        ]);
    }

    public function create(): View
    {
        return view('projects.create', [
            'pageTitle'      => 'List Project',
            'currentPage'    => 'listProjectFree',
            'seoTitle'       => 'NFTDropCalendar: List your own NFT Drop!',
            'seoDescription' => 'List your own NFT Drop on our NFTDropCalendar! ✓ Free ✓ Best tool 2022 ✓ 235% Hype',
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $twitterName    = $this->normalize->twitterUsername($validated['twitterName']);
        $discordLink    = $this->normalize->url($validated['discordLink']);
        $websiteLink    = $this->normalize->url($validated['websiteLink']);
        $marketplaceLink = $this->normalize->url($validated['marketplaceLink']);

        if ($twitterName === '') {
            return back()->withErrors(['twitterName' => 'Invalid Twitter username.'])->withInput();
        }

        if ($discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
            return back()->withErrors(['discordLink' => 'Invalid URL.'])->withInput();
        }

        $filepath = $this->images->upload($request, 'thumbnail');

        if ($filepath === null) {
            return back()->withErrors(['thumbnail' => 'Please upload a valid image file.'])->withInput();
        }

        $project = ListedProject::create([
            'name'                  => $validated['projectName'],
            'description'           => $validated['projectDescription'],
            'blockchain'            => $validated['blockchain'],
            'category'              => $validated['inlineRadioOptions'],
            'thumbnail'             => $filepath,
            'traits'                => $validated['traits'] ?? '',
            'floorPrice'            => $validated['floorPrice'] ?? null,
            'roadmap'               => $validated['roadmap'] ?? '',
            'volume'                => $validated['volume'] ?? null,
            'royality'              => $validated['royality'],
            'supply'                => $validated['supply'],
            'teamAmount'            => $validated['teamAmount'],
            'twitterName'           => $twitterName,
            'discordLink'           => $discordLink,
            'websiteLink'           => $websiteLink,
            'emailContact'          => $validated['emailContact'],
            'discordMemberNumber'   => 0,
            'twitterFollowerNumber' => $this->twitter->followerCount($twitterName),
            'signature'             => $request->input('signature', ''),
            'promoted'              => $validated['promotionBox'] ?? 'promote2',
            'marketplaceLink'       => $marketplaceLink,
        ]);

        return redirect()->route('projects.show', ['id' => $this->ids->encode($project->id)]);
    }
}
