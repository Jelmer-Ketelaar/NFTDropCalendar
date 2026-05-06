@extends('layouts.app')

@section('content')

<!-- Back Link -->
<div style="background: var(--nft-surface); border-bottom: 1px solid var(--nft-border); padding: 1rem 0;">
    <div class="container">
        <a href="{{ route('drops.explore') }}" style="color: var(--nft-accent); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-arrow-left"></i> Back to Drops
        </a>
    </div>
</div>

<!-- Verification Alert -->
@if(!$drop->isVerified())
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
                    <img alt="{{ $drop->name }}" src="{{ $drop->thumbnailUrl() }}" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, var(--nft-bg) 0%, transparent 100%); padding: 3rem 2rem 2rem;">
                        <h1 style="color: var(--nft-text); margin-bottom: 0.5rem;">{{ $drop->name }}</h1>
                        <p style="color: var(--nft-text-secondary); margin-bottom: 1rem;">{{ mb_strimwidth($drop->description, 0, 150, '...') }}</p>
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <span class="badge badge-upcoming">{{ ucfirst($drop->category) }}</span>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <img src="{{ asset('img/extern_logo/crypto/' . $drop->blockchain . '.png') }}" alt="{{ $drop->blockchain }}" style="width: 24px; height: 24px;">
                                <span style="color: var(--nft-text-secondary); font-weight: 500;">{{ ucfirst($drop->blockchain) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status & Countdown -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-4">
                        @if(!$drop->isLive())
                        <p style="color: var(--nft-text-muted); margin-bottom: 1rem; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em;">Time until launch</p>
                        <div class='countdown d-flex justify-content-center' data-date="{{ $drop->dropDatePart() }}" data-time="{{ $drop->dropTimePart() }}"></div>
                        @else
                        <div style="padding: 2rem 0;">
                            <span class="badge badge-live" style="font-size: 1.125rem; padding: 0.75rem 1.5rem;">
                                <i class="fas fa-check-circle"></i> LIVE NOW
                            </span>
                            <p style="color: var(--nft-text-secondary); margin-top: 1rem; margin-bottom: 0;">This NFT drop is now live and available to mint</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Details Grid -->
        <div class="row mb-5">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Mint Price</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">
                            {{ $drop->mintPrice }}
                            @if($drop->blockchain === 'solana') SOL
                            @elseif($drop->blockchain === 'ethereum') ETH
                            @elseif($drop->blockchain === 'cardano') ADA
                            @elseif($drop->blockchain === 'polygon') MATIC
                            @else {{ $drop->blockchain }}
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Collection Supply</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">{{ $drop->supply }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Total Traits</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">{{ $drop->traits }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <p style="color: var(--nft-text-muted); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Royalty</p>
                        <h4 style="color: var(--nft-accent); margin-bottom: 0;">{{ $drop->royality }}%</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description & Details -->
        <div class="row mb-5">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">About This Drop</h3>
                        <div style="color: var(--nft-text-secondary); line-height: 1.8; white-space: pre-wrap;">
                            {!! nl2br(e($drop->description)) !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Project Roadmap</h3>
                        <div style="color: var(--nft-text-secondary); line-height: 1.8; white-space: pre-wrap;">
                            {!! nl2br(e($drop->roadmap)) !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Community Reviews</h3>
                        @if($averageRating > 0)
                        <div style="margin-bottom: 2rem;">
                            <p style="color: var(--nft-text-muted); font-size: 0.875rem; margin-bottom: 0.5rem;">Average Rating</p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                                <span style="color: var(--nft-accent); font-size: 1.5rem; font-weight: 700;">{{ round($averageRating, 1) }}</span>
                                <div style="display: flex; gap: 0.25rem;">
                                    @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star" style="color: {{ $i <= round($averageRating) ? 'var(--nft-accent)' : 'var(--nft-text-muted)' }}; font-size: 0.875rem;"></i>
                                    @endfor
                                </div>
                                <span style="color: var(--nft-text-muted); font-size: 0.875rem;">({{ $reviewCount }} review{{ $reviewCount !== 1 ? 's' : '' }})</span>
                            </div>
                        </div>
                        @endif

                        <h5 style="color: var(--nft-text); margin-top: 2rem; margin-bottom: 1.5rem;">Submit Your Review</h5>
                        <form method="POST" action="{{ route('drops.review', ['encodedId' => base64_encode($drop->id)]) }}" style="margin-bottom: 2rem;">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required maxlength="100" value="{{ old('name') }}">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required maxlength="100" value="{{ old('email') }}">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                    <option value="">Select a rating...</option>
                                    <option value="5" @selected(old('rating') == 5)>⭐⭐⭐⭐⭐ Excellent</option>
                                    <option value="4" @selected(old('rating') == 4)>⭐⭐⭐⭐ Good</option>
                                    <option value="3" @selected(old('rating') == 3)>⭐⭐⭐ Average</option>
                                    <option value="2" @selected(old('rating') == 2)>⭐⭐ Poor</option>
                                    <option value="1" @selected(old('rating') == 1)>⭐ Very Poor</option>
                                </select>
                                @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Review</label>
                                <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" rows="4" required maxlength="500" placeholder="Share your thoughts about this drop...">{{ old('review') }}</textarea>
                                @error('review')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>

                        @if($reviews->isNotEmpty())
                        <hr style="border-color: var(--nft-border); margin: 2rem 0;">
                        <h5 style="color: var(--nft-text); margin-bottom: 1.5rem;">Latest Reviews</h5>
                        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                            @foreach($reviews as $review)
                            <div style="padding: 1.5rem; border-radius: 8px; background: var(--nft-elevated); border: 1px solid var(--nft-border);">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.75rem;">
                                    <div>
                                        <h6 style="color: var(--nft-text); margin-bottom: 0.25rem;">{{ $review->name }}</h6>
                                        <div style="display: flex; gap: 0.25rem; margin-bottom: 0.5rem;">
                                            @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star" style="color: {{ $i <= $review->rating ? 'var(--nft-accent)' : 'var(--nft-text-muted)' }}; font-size: 0.75rem;"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <p style="color: var(--nft-text-secondary); margin-bottom: 0; line-height: 1.6;">{{ $review->review }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Team Size</h5>
                                <p style="color: var(--nft-accent); font-size: 1.75rem; font-weight: 700; margin-bottom: 0;">{{ $drop->teamAmount }}</p>
                                <p style="color: var(--nft-text-muted); margin-bottom: 0; font-size: 0.875rem;">Team members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Category</h5>
                                <p style="color: var(--nft-accent); font-size: 1.75rem; font-weight: 700; margin-bottom: 0;">{{ $drop->category }}</p>
                                <p style="color: var(--nft-text-muted); margin-bottom: 0; font-size: 0.875rem;">Project type</p>
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

                        @if($drop->twitterName)
                        <a href="https://twitter.com/{{ $drop->twitterName }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fab fa-twitter"></i> Follow on Twitter
                        </a>
                        @endif

                        @if($drop->discordLink)
                        <a href="{{ $drop->discordLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fab fa-discord"></i> Join Discord
                        </a>
                        @endif

                        @if($drop->websiteLink)
                        <a href="{{ $drop->websiteLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary w-100">
                            <i class="fas fa-globe"></i> Visit Website
                        </a>
                        @endif

                        <hr style="border-color: var(--nft-border); margin: 2rem 0;">

                        <h5 class="card-title mb-3">Share This Drop</h5>
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 2rem;">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('drops.show', ['id' => base64_encode($drop->id)])) }}&text=Check%20out%20{{ urlencode($drop->name) }}%20on%20NFTDropCalendar!" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('drops.show', ['id' => base64_encode($drop->id)])) }}" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('drops.show', ['id' => base64_encode($drop->id)])) }}" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-primary flex-fill" onclick="navigator.clipboard.writeText('{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}'); alert('Link copied!');">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>

                        <hr style="border-color: var(--nft-border); margin: 2rem 0;">

                        <h5 class="card-title mb-3">Project Links</h5>
                        <div style="font-size: 0.875rem;">
                            <p style="margin-bottom: 0.75rem;">
                                <strong style="color: var(--nft-text-muted);">Email:</strong><br>
                                {{ $drop->emailContact }}
                            </p>
                            @if($drop->twitterFollowerNumber > 0)
                            <p style="margin-bottom: 0.75rem;">
                                <strong style="color: var(--nft-text-muted);">Twitter Followers:</strong><br>
                                {{ number_format($drop->twitterFollowerNumber) }}
                            </p>
                            @endif
                            @if($drop->discordMemberNumber > 0)
                            <p style="margin-bottom: 0;">
                                <strong style="color: var(--nft-text-muted);">Discord Members:</strong><br>
                                {{ number_format($drop->discordMemberNumber) }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Drops -->
        @if($otherDrops->isNotEmpty())
        <div class="row mt-5">
            <div class="col-12">
                <h2 style="margin-bottom: 2rem;">Other Upcoming Drops</h2>
            </div>
            @foreach($otherDrops->take(4) as $related)
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <a href="{{ route('drops.show', ['id' => base64_encode($related->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <img alt="{{ $related->name }}" class="card-img-top" src="{{ $related->thumbnailUrl() }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            @if(!$related->isLive())
                            <div class="countdown-times mb-3">
                                <div class='countdown d-flex justify-content-center' data-date="{{ $related->dropDatePart() }}" data-time="{{ $related->dropTimePart() }}"></div>
                            </div>
                            @else
                            <div class="text-center mb-3">
                                <span class="badge badge-live">LIVE</span>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $related->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($related->description, 0, 60, '...') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection
