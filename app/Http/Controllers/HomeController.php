<?php
namespace App\Http\Controllers;

use App\Enums\PromotionLevel;
use App\Models\Drop;
use App\Models\ListedProject;
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index', [
            'pageTitle'         => 'Home',
            'currentPage'       => 'index',
            'seoTitle'          => 'NFTDropCalender: Explore all NFTs Drops',
            'seoDescription'    => 'Explore the verified NFT drops on NFTDropCalender, a pro view of that are NFTs about to drop! ✓ A new NFT calendar',
            'projects'          => Drop::where('verified', true)->inRandomOrder()->get(),
            'banner'            => Drop::whereNotNull('banner')->where('banner', '!=', 'null')->orderBy('dropDate')->first(),
            'projectsPaid'      => Drop::where('verified', true)->where('promoted', PromotionLevel::Promote->value)->inRandomOrder()->get(),
            'projectsExistPaid' => ListedProject::where('verified', true)->where('promoted', PromotionLevel::Promote->value)->inRandomOrder()->get(),
            'trendingDrops'     => Drop::trending(6)->get(),
        ]);
    }
}
