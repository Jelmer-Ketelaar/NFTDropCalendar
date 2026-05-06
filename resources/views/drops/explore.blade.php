@extends('layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="page-title-content">
                    <h1 class="mb-3">Explore NFT Drops</h1>
                    <p class="mb-0" style="font-size: 1.125rem;">All drops listed are verified and checked by NFTDropCalendar. Discover upcoming NFT launches with detailed project information and launch dates.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter and Search Section -->
<section class="filter-area section-padding">
    <div class="container">
        <form method="GET" class="nft-filter-form">
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search drops by name..." value="{{ $searchQuery ?? '' }}">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <select name="blockchain" class="form-control">
                        <option value="">All Blockchains</option>
                        @foreach($blockchains as $blockchain)
                        <option value="{{ $blockchain }}" @selected(request('blockchain') === $blockchain)>{{ ucfirst($blockchain) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <select name="sort" class="form-control">
                        <option value="upcoming" @selected($currentSort === 'upcoming')>Upcoming</option>
                        <option value="newest" @selected($currentSort === 'newest')>Newest First</option>
                        <option value="trending" @selected($currentSort === 'trending')>Trending</option>
                        <option value="ending_soon" @selected($currentSort === 'ending_soon')>Ending Soon</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
                <a href="{{ route('drops.explore') }}" class="btn btn-outline-secondary">Clear</a>
            </div>
        </form>
    </div>
</section>

<!-- Drops Grid -->
<section class="explore-area section-padding">
    <div class="container">
        @if($drops->isNotEmpty())
        <div class="row g-4">
            @foreach($drops as $drop)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <a href="{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div style="position: relative;">
                            <img alt="{{ $drop->name }}" class="card-img-top" src="{{ $drop->thumbnailUrl() }}" style="height: 240px; object-fit: cover; width: 100%;">
                            @if($drop->isPromoted())
                            <span class="badge badge-upcoming" style="position: absolute; top: 10px; right: 10px;">Featured</span>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            @if(!$drop->isLive())
                            <div class="countdown-times mb-3">
                                <div class='countdown d-flex justify-content-center' data-date="{{ $drop->dropDatePart() }}" data-time="{{ $drop->dropTimePart() }}"></div>
                            </div>
                            @else
                            <div class="text-center mb-3">
                                <span class="badge badge-live">LIVE NOW</span>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $drop->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($drop->description, 0, 80, '...') }}</p>
                            <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--nft-border);">
                                <div class="d-flex gap-2 align-items-center" style="margin-bottom: 0.75rem;">
                                    <img src="{{ asset('img/extern_logo/crypto/' . $drop->blockchain . '.png') }}" alt="{{ $drop->blockchain }}" style="width: 20px; height: 20px;">
                                    <span class="text-muted small">{{ ucfirst($drop->blockchain) }}</span>
                                </div>
                                <button class="btn btn-outline-primary btn-sm w-100">View Details</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center py-5">
                <div style="padding: 3rem 1rem;">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: var(--nft-text-muted); margin-bottom: 1rem; display: block;"></i>
                    <h3 style="color: var(--nft-text); margin-bottom: 0.5rem;">No Drops Yet</h3>
                    <p style="color: var(--nft-text-secondary); margin-bottom: 1.5rem;">Come back soon to see upcoming NFT drops. Be the first to submit your project!</p>
                    <a href="{{ route('drops.create') }}" class="btn btn-primary">Submit Your Drop</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
