<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreDropRequest;
use App\Models\Drop;
use App\Models\DropReview;
use App\Services\IdEncoderService;
use App\Services\ImageUploadService;
use App\Services\InputNormalizationService;
use App\Services\TwitterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class DropController extends Controller
{
    public function __construct(
        private readonly IdEncoderService $ids,
        private readonly InputNormalizationService $normalize,
        private readonly TwitterService $twitter,
        private readonly ImageUploadService $images,
    ) {}

    public function explore(Request $request): View
    {
        $query = Drop::where('verified', true);

        if ($search = $request->query('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($blockchain = $request->query('blockchain')) {
            $query->where('blockchain', $blockchain);
        }

        if ($category = $request->query('category')) {
            $query->where('category', $category);
        }

        $sort = $request->query('sort', 'upcoming');
        match($sort) {
            'newest' => $query->orderByDesc('id'),
            'trending' => $query->orderByDesc('views'),
            'ending_soon' => $query->orderBy('dropDate'),
            default => $query->orderBy('dropDate'),
        };

        $drops = $query->get();

        $blockchains = Drop::where('verified', true)->distinct()->pluck('blockchain');
        $categories = Drop::where('verified', true)->distinct()->pluck('category');

        return view('drops.explore', [
            'pageTitle'      => 'Explore Drops',
            'currentPage'    => 'exploreDrops',
            'seoTitle'       => 'NFTDropCalender: Check out all the NFT Drops',
            'seoDescription' => 'Explore the verified NFT drops on NFTDropCalender, a view of NFTs about to drop!',
            'drops'          => $drops,
            'blockchains'    => $blockchains,
            'categories'     => $categories,
            'currentSort'    => $sort,
            'searchQuery'    => $search,
        ]);
    }

    public function show(Request $request): View|RedirectResponse
    {
        $id = $this->ids->decode($request->query('id'));

        if ($id === null) {
            return redirect()->route('home');
        }

        $drop = Drop::find($id);

        if ($drop === null) {
            return redirect()->route('home');
        }

        $drop->incrementViews();

        $reviews = DropReview::where('drop_id', $drop->id)->orderByDesc('id')->get();
        $averageRating = DropReview::where('drop_id', $drop->id)->avg('rating') ?? 0;
        $reviewCount = count($reviews);

        $otherDrops = Drop::where('verified', true)->inRandomOrder()->limit(9)->get();

        return view('drops.show', [
            'pageTitle'      => $drop->name . ' | NFTDropCalendar',
            'currentPage'    => 'nft',
            'seoTitle'       => $drop->name . ' - NFTDropCalender.info',
            'seoDescription' => $drop->description,
            'drop'           => $drop,
            'reviews'        => $reviews,
            'averageRating'  => $averageRating,
            'reviewCount'    => $reviewCount,
            'otherDrops'     => $otherDrops,
        ]);
    }

    public function create(): View
    {
        return view('drops.create', [
            'pageTitle'      => 'List Drop',
            'currentPage'    => 'listDropFree',
            'seoTitle'       => 'NFTDropCalendar is an event calendar for the growing NFT industry!',
            'seoDescription' => 'List here your own NFT drop on our NFT Calendar!',
        ]);
    }

    public function store(StoreDropRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $twitterName   = $this->normalize->twitterUsername($validated['twitterName']);
        $discordLink   = $this->normalize->url($validated['discordLink']);
        $websiteLink   = $this->normalize->url($validated['websiteLink']);

        if ($twitterName === '') {
            return back()->withErrors(['twitterName' => 'Invalid Twitter username.'])->withInput();
        }

        if ($discordLink === '' || $websiteLink === '') {
            return back()->withErrors(['discordLink' => 'Invalid URL.'])->withInput();
        }

        $filepath = $this->images->upload($request, 'thumbnail');

        if ($filepath === null) {
            return back()->withErrors(['thumbnail' => 'Please upload a valid image file.'])->withInput();
        }

        $drop = Drop::create([
            'name'                  => $validated['projectName'],
            'description'           => $validated['projectDescription'],
            'blockchain'            => $validated['blockchain'],
            'category'              => $validated['inlineRadioOptions'],
            'thumbnail'             => $filepath,
            'mintPrice'             => $validated['mintPrice'] ?? null,
            'dropDate'              => $validated['dropDate'],
            'roadmap'               => $validated['roadmap'] ?? '',
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
            'traits'                => $validated['traits'] ?? '',
            'promoted'              => $validated['promotionBox'] ?? 'promote2',
        ]);

        return redirect()->route('drops.show', ['id' => $this->ids->encode($drop->id)]);
    }
}
