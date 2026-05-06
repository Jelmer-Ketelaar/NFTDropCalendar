<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\ListedProject;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class CollectionController extends Controller
{
    private const BLOCKCHAINS = [
        'ethereum' => 'Ethereum',
        'binance' => 'Binance',
        'cardano' => 'Cardano',
    ];

    public function index(Request $request): View
    {
        $blockchain = $request->query('blockchain', '');

        if (! array_key_exists($blockchain, self::BLOCKCHAINS)) {
            $blockchain = '';
        }

        $query = fn ($q) => $q
            ->where('verified', 'true')
            ->whereIn('promoted', ['promote', 'promote1', 'promote2', 'promote3'])
            ->when($blockchain !== '', fn ($q) => $q->where('blockchain', $blockchain));

        $drops = Drop::query()->tap($query)->get();
        $projects = ListedProject::query()->tap($query)->get();

        return view('collection.index', [
            'drops' => $drops,
            'projects' => $projects,
            'blockchains' => self::BLOCKCHAINS,
            'selectedBlockchain' => $blockchain,
        ]);
    }
}
