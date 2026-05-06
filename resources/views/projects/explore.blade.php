@extends('layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="page-title-content">
                    <h1 class="mb-3">Explore NFT Projects</h1>
                    <p class="mb-0" style="font-size: 1.125rem;">Browse verified NFT projects with solid roadmaps and active communities. All projects are checked by NFTDropCalendar to ensure quality and legitimacy.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Projects Grid -->
<section class="explore-area section-padding">
    <div class="container">
        @if($projects->isNotEmpty())
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div style="position: relative;">
                            <img alt="{{ $project->name }}" class="card-img-top" src="{{ asset($project->thumbnail) }}" style="height: 240px; object-fit: cover; width: 100%;">
                            @if($project->isPromoted())
                            <span class="badge badge-upcoming" style="position: absolute; top: 10px; right: 10px;">Featured</span>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($project->description, 0, 80, '...') }}</p>
                            <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--nft-border);">
                                <div class="d-flex gap-2 align-items-center" style="margin-bottom: 0.75rem;">
                                    <img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" alt="{{ $project->blockchain }}" style="width: 20px; height: 20px;">
                                    <span class="text-muted small">{{ ucfirst($project->blockchain) }}</span>
                                </div>
                                <button class="btn btn-outline-primary btn-sm w-100">View Project</button>
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
                    <i class="fas fa-search" style="font-size: 3rem; color: var(--nft-text-muted); margin-bottom: 1rem; display: block;"></i>
                    <h3 style="color: var(--nft-text); margin-bottom: 0.5rem;">No Projects Yet</h3>
                    <p style="color: var(--nft-text-secondary); margin-bottom: 1.5rem;">Come back soon to see more NFT projects. Be the first to submit yours!</p>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Submit Your Project</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
