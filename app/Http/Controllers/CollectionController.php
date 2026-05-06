<?php
namespace App\Http\Controllers;

use App\Enums\Blockchain;
use App\Enums\PromotionLevel;
use App\Models\Drop;
use App\Models\ListedProject;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class CollectionController extends Controller
{
    public function index(Request $request): View
    {
        $blockchain = $request->query('blockchain', '');

        if (! in_array($blockchain, Blockchain::values(), true)) {
            $blockchain = '';
        }

        $promotedValues = PromotionLevel::values();

        $query = fn ($q) => $q
            ->where('verified', true)
            ->whereIn('promoted', $promotedValues)
            ->when($blockchain !== '', fn ($q) => $q->where('blockchain', $blockchain));

        return view('collection.index', [
            'drops'             => Drop::query()->tap($query)->get(),
            'projects'          => ListedProject::query()->tap($query)->get(),
            'blockchains'       => Blockchain::options(),
            'selectedBlockchain'=> $blockchain,
        ]);
    }
}
