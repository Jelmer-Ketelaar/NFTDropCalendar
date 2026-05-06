@extends('layouts.app')

@section('content')

<!-- Back Link -->
<div style="background: var(--nft-surface); border-bottom: 1px solid var(--nft-border); padding: 1rem 0;">
    <div class="container">
        <a href="{{ route('projects.explore') }}" style="color: var(--nft-accent); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-arrow-left"></i> Back to Projects
        </a>
    </div>
</div>

<!-- Verification Alert -->
@if(!$project->isVerified())
<div class="container mt-4">
    <div class="alert alert-warning" style="margin-bottom: 2rem;">
        <i class="fas fa-info-circle"></i> <strong>Under Review</strong><br>This project is currently under verification. We're checking the details and will make it public shortly.
    </div>
</div>
@endif

<div class="item-single section-padding">
    <div class="container">
        <!-- Hero Section with Image -->
        <div class="row mb-5">
            <div class="col-12">
                <div style="position: relative; border-radius: 12px; overflow: hidden; height: 400px;">
                    <img alt="{{ $project->name }}" src="{{ $project->thumbnailUrl() }}" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, var(--nft-bg) 0%, transparent 100%); padding: 3rem 2rem 2rem;">
                        <h1 style="color: var(--nft-text); margin-bottom: 0.5rem;">{{ $project->name }}</h1>
                        <p style="color: var(--nft-text-secondary); margin-bottom: 1rem;">{{ mb_strimwidth($project->description, 0, 150, '...') }}</p>
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <span class="badge badge-upcoming">{{ ucfirst($project->category) }}</span>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" alt="{{ $project->blockchain }}" style="width: 24px; height: 24px;">
                                <span style="color: var(--nft-text-secondary); font-weight: 500;">{{ ucfirst($project->blockchain) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Stats -->
        <div class="row mb-5">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Trading Volume</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">
                            {{ $project->volume }}
                            @if($project->ethChoice === 'eth') ETH
                            @elseif($project->ethChoice === 'matic') MATIC
                            @elseif($project->ethChoice === 'solana') SOL
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Floor Price</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">
                            {{ $project->floorPrice }}
                            @if($project->ethChoice === 'eth') ETH
                            @elseif($project->ethChoice === 'matic') MATIC
                            @elseif($project->ethChoice === 'solana') SOL
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Collection Supply</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">{{ $project->supply }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Total Traits</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">{{ $project->traits }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description & Details -->
        <div class="row mb-5">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">About This Project</h3>
                        <div style="color: var(--nft-text-secondary); line-height: 1.8; white-space: pre-wrap;">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Project Roadmap</h3>
                        <div style="color: var(--nft-text-secondary); line-height: 1.8; white-space: pre-wrap;">
                            {{ $project->roadmap }}
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Team Size</h5>
                                <p style="color: var(--nft-accent); font-size: 1.75rem; font-weight: 700; margin-bottom: 0;">{{ $project->teamAmount }}</p>
                                <p style="color: var(--nft-text-muted); margin-bottom: 0; font-size: 0.875rem;">Team members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Royalty</h5>
                                <p style="color: var(--nft-accent); font-size: 1.75rem; font-weight: 700; margin-bottom: 0;">{{ $project->royality }}%</p>
                                <p style="color: var(--nft-text-muted); margin-bottom: 0; font-size: 0.875rem;">Creator royalty</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar: Social Links -->
            <div class="col-lg-4 col-md-12">
                <div class="card sticky-top" style="top: 100px;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Connect with the Team</h5>

                        @if($project->twitterName)
                        <a href="https://twitter.com/{{ $project->twitterName }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fab fa-twitter"></i> Follow on Twitter
                        </a>
                        @endif

                        @if($project->discordLink)
                        <a href="{{ $project->discordLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fab fa-discord"></i> Join Discord
                        </a>
                        @endif

                        @if($project->websiteLink)
                        <a href="{{ $project->websiteLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fas fa-globe"></i> Visit Website
                        </a>
                        @endif

                        @if($project->marketplaceLink)
                        <a href="{{ $project->marketplaceLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary w-100">
                            <i class="fas fa-shopping-cart"></i> View on Marketplace
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
