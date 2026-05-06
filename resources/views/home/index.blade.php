@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="intro1 section-padding">
    <div class="container">
        <div class="row justify-content-between align-items-center py-5">
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="intro-content">
                    <h1 class="mb-4">Discover the next NFT <span>drop before it launches</span></h1>
                    <p style="font-size: 1.125rem; margin-bottom: 2rem;">Explore upcoming NFT projects, track launch dates, and never miss a drop again.</p>
                    <div class="intro-btn">
                        <a class="btn btn-primary" href="{{ route('drops.explore') }}" style="min-width: 180px;">Explore Drops</a>
                        <a class="btn btn-outline-primary" href="{{ route('drops.create') }}" style="min-width: 180px;">Submit Your Drop</a>
                    </div>
                </div>
            </div>
            @if($banner)
            <div class="col-xl-5 col-lg-6 col-12">
                <a href="{{ route('drops.show', ['id' => base64_encode($banner->id)]) }}" class="d-block">
                    <div class="card" style="margin-top: 0;">
                        <img alt="{{ $banner->name }}" class="card-img-top" src="{{ $banner->thumbnailUrl() }}" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $banner->name }}</h5>
                            <p class="card-text small">{{ mb_strimwidth($banner->description, 0, 120, '...') }}</p>
                            <span class="badge badge-upcoming" style="margin-top: 1rem;">Featured Drop</span>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Featured Drops Section -->
@if($projectsPaid->isNotEmpty())
<div class="notable-drops section-padding">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="intro">
                    <span>Premium Listings</span>
                    <h2>Promoted NFT Drops</h2>
                    <p style="margin-top: 0.5rem;">Discover featured NFT projects launching soon</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($projectsPaid->take(4) as $project)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="{{ route('drops.show', ['id' => base64_encode($project->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <img alt="{{ $project->name }}" class="card-img-top" src="{{ $project->thumbnailUrl() }}" style="height: 200px; object-fit: cover;">
                        @if($project->isPromoted())
                        <div style="position: absolute; top: 10px; right: 10px;">
                            <span class="badge badge-upcoming">Featured</span>
                        </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            @if(!$project->isLive())
                            <div class="countdown-times mb-3">
                                <div class='countdown d-flex justify-content-center' data-date="{{ $project->dropDatePart() }}" data-time="{{ $project->dropTimePart() }}"></div>
                            </div>
                            @else
                            <div class="text-center mb-3">
                                <span class="badge badge-live">LIVE NOW</span>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($project->description, 0, 80, '...') }}</p>
                            <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--nft-border);">
                                <img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" alt="{{ $project->blockchain }}" style="width: 24px; height: 24px;">
                                <span class="text-muted small">{{ ucfirst($project->blockchain) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Trending Drops Section -->
@if($trendingDrops->isNotEmpty())
<div class="notable-drops section-padding">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="intro">
                    <span>Hot & Popular</span>
                    <h2>Trending Now</h2>
                    <p style="margin-top: 0.5rem;">Most viewed and discussed NFT drops</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($trendingDrops as $trending)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="{{ route('drops.show', ['id' => base64_encode($trending->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div style="position: relative;">
                            <img alt="{{ $trending->name }}" class="card-img-top" src="{{ $trending->thumbnailUrl() }}" style="height: 200px; object-fit: cover;">
                            <span class="badge" style="position: absolute; top: 10px; right: 10px; background-color: rgba(34, 211, 238, 0.9); border: 1px solid var(--nft-accent); color: var(--nft-accent);">
                                <i class="fas fa-fire"></i> Trending
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            @if(!$trending->isLive())
                            <div class="countdown-times mb-3">
                                <div class='countdown d-flex justify-content-center' data-date="{{ $trending->dropDatePart() }}" data-time="{{ $trending->dropTimePart() }}"></div>
                            </div>
                            @else
                            <div class="text-center mb-3">
                                <span class="badge badge-live">LIVE NOW</span>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $trending->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($trending->description, 0, 80, '...') }}</p>
                            <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--nft-border);">
                                <img src="{{ asset('img/extern_logo/crypto/' . $trending->blockchain . '.png') }}" alt="{{ $trending->blockchain }}" style="width: 24px; height: 24px;">
                                <span class="text-muted small">{{ ucfirst($trending->blockchain) }}</span>
                                <span style="margin-left: auto; color: var(--nft-text-muted); font-size: 0.75rem;">
                                    <i class="fas fa-eye"></i> {{ $trending->views }} views
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- All Drops Section -->
@if($projects->isNotEmpty())
<div class="notable-drops section-padding">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="intro">
                    <span>Browse All</span>
                    <h2>Latest NFT Drops</h2>
                    <p style="margin-top: 0.5rem;">Check out all verified NFT projects launching soon</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($projects->take(8) as $project)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <a href="{{ route('drops.show', ['id' => base64_encode($project->id)]) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <img alt="{{ $project->name }}" class="card-img-top" src="{{ $project->thumbnailUrl() }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            @if(!$project->isLive())
                            <div class="countdown-times mb-3">
                                <div class='countdown d-flex justify-content-center' data-date="{{ $project->dropDatePart() }}" data-time="{{ $project->dropTimePart() }}"></div>
                            </div>
                            @else
                            <div class="text-center mb-3">
                                <span class="badge badge-live">LIVE NOW</span>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ mb_strimwidth($project->description, 0, 80, '...') }}</p>
                            <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--nft-border);">
                                <img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" alt="{{ $project->blockchain }}" style="width: 24px; height: 24px;">
                                <span class="text-muted small">{{ ucfirst($project->blockchain) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('drops.explore') }}" class="btn btn-outline-primary">View All Drops</a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Why Choose Section -->
<div class="notable-drops section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose NFTDropCalendar</h2>
            <p>Trusted by NFT creators and collectors worldwide</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-md-12">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Verified Projects</h4>
                    <p>All projects and drops are manually verified and checked, ensuring you discover legitimate opportunities.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h4>Never Miss a Drop</h4>
                    <p>Stay updated with accurate launch dates, countdown timers, and project details all in one place.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon">
                        <i class="fas fa-megaphone"></i>
                    </div>
                    <h4>Promote Your Project</h4>
                    <p>Get discovered by collectors actively searching for new NFT launches. Premium visibility options available.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Free to Explore</h4>
                    <p>Browse verified drops and projects completely free. Simple pricing for creators who want to promote.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Signup Section -->
<div style="background: linear-gradient(135deg, rgba(34, 211, 238, 0.08) 0%, rgba(139, 92, 246, 0.08) 100%); border-top: 1px solid var(--nft-border); border-bottom: 1px solid var(--nft-border); padding: 4rem 0; margin-bottom: 4rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h2 style="margin-bottom: 1rem;">Never Miss a Drop</h2>
                <p style="font-size: 1.125rem; color: var(--nft-text-secondary); margin-bottom: 0;">Get notified about new NFT drops and updates delivered straight to your inbox.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-12">
                <form method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <div style="display: flex; gap: 0.75rem;">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                    @if(session('info'))
                    <div class="alert alert-info mt-3 mb-0">{{ session('info') }}</div>
                    @elseif(session('success'))
                    <div class="alert alert-success mt-3 mb-0">{{ session('success') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Creator CTA Section -->
<div style="background: linear-gradient(135deg, rgba(34, 211, 238, 0.08) 0%, rgba(59, 130, 246, 0.08) 100%); border-top: 1px solid var(--nft-border); border-bottom: 1px solid var(--nft-border); padding: 4rem 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12 mb-4 mb-lg-0">
                <h2 style="margin-bottom: 1rem;">Ready to Launch Your NFT Project?</h2>
                <p style="font-size: 1.125rem; color: var(--nft-text-secondary);">Submit your NFT drop and get discovered by thousands of collectors actively searching for the next big project.</p>
            </div>
            <div class="col-lg-4 col-md-12 text-lg-end">
                <a href="{{ route('drops.create') }}" class="btn btn-primary btn-lg">Submit Your Drop</a>
            </div>
        </div>
    </div>
</div>

<div class="notable-drops section-padding bg-light triangle-top-light triangle-bottom-light" id="NFT-DROPS">
    <div class="container">
        <div class="section-padding">
            <center>
                <a href="{{ url('prices') }}" target="_blank">
                    <img alt="banner" class="CoverPhoto" src="{{ asset('banner.png') }}">
                </a>
            </center>
        </div>

        @if($projectsPaid->isNotEmpty())
        <div class="row">
            <div class="col-xl-12">
                <div class="intro d-flex justify-content-between align-items-end m-0">
                    <div class="intro-content">
                        <h1 class="mt-3 mb-0">Promotion Drops</h1>
                    </div>
                </div>
            </div>
            <div class="swiper-container">
                <div class="row">
                    @foreach($projectsPaid->take(8) as $project)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="{{ route('drops.show', ['id' => base64_encode($project->id)]) }}" target="_blank">
                            <div class="card" style="background-color: inherit; max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253, 156, 46, 0.7), 10px 10px rgba(253, 156, 46, 0.5), 15px 15px rgba(253, 156, 46, 0.3), 20px 20px rgba(253, 156, 46, 0.2), 25px 25px rgba(253, 156, 46, 0.1);">
                                <img alt="{{ $project->name }}" class="img-fluid card-img-top" src="{{ $project->thumbnailUrl() }}">
                                <div class="sample">
                                    <div class="ribbon down" style="--color: #fd9c2e;">
                                        <div class="content">
                                            <svg width="24px" height="24px" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color: inherit;">
                                    <div class="countdown-times mb-3">
                                        @if(!$project->isLive())
                                        <div class='countdown d-flex justify-content-center'
                                             data-date="{{ $project->dropDatePart() }}"
                                             data-time="{{ $project->dropTimePart() }}"></div>
                                        @else
                                        <center>
                                            <div class="ribbon-wrapper">
                                                <div class="glow">&nbsp;</div>
                                                <div class="ribbon-front">LIVE</div>
                                                <div class="ribbon-edge-topleft"></div>
                                                <div class="ribbon-edge-topright"></div>
                                                <div class="ribbon-edge-bottomleft"></div>
                                                <div class="ribbon-edge-bottomright"></div>
                                            </div>
                                        </center>
                                        @endif
                                    </div>
                                    <h4 class="card-title">{{ $project->name }}</h4>
                                    <p>{{ mb_strimwidth($project->description, 0, 80, '...') }}</p>
                                    <div class="card-bottom d-flex justify-content-between">
                                        <span><img src="{{ asset('img/extern_logo/twitter_logo.png') }}" style="width:40px;" alt="twitter"> {{ $project->twitterFollowerNumber }}</span>
                                        <span><img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" style="width:30px;" alt="blockchain"></span>
                                        <span><img src="{{ asset('img/extern_logo/discord_logo.png') }}" style="width:35px;" alt="discord"> {{ $project->discordMemberNumber }}</span>
                                    </div>
                                    <a href="{{ route('drops.show', ['id' => base64_encode($project->id)]) }}">Check this NFT</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if($projectsExistPaid->isNotEmpty())
        <div class="row">
            <div class="col-xl-12">
                <div class="intro d-flex justify-content-between align-items-end m-0">
                    <div class="intro-content">
                        <h1 class="mt-3 mb-0">Promotion Projects</h1>
                    </div>
                </div>
            </div>
            <div class="swiper-container">
                <div class="row">
                    @foreach($projectsExistPaid->take(4) as $projectExist)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="{{ route('projects.show', ['id' => base64_encode($projectExist->id)]) }}" target="_blank">
                            <div class="card" style="max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253, 156, 46, 0.7), 10px 10px rgba(253, 156, 46, 0.5), 15px 15px rgba(253, 156, 46, 0.3), 20px 20px rgba(253, 156, 46, 0.2), 25px 25px rgba(253, 156, 46, 0.1);">
                                <strong style="position:absolute;color:white;margin:5px;text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">{{ $projectExist->floorPrice }}</strong>
                                <img alt="{{ $projectExist->name }}" class="img-fluid card-img-top" src="{{ $projectExist->thumbnailUrl() }}">
                                <div class="sample">
                                    <div class="ribbon down" style="--color: #fd9c2e;">
                                        <div class="content">
                                            <svg width="24px" height="24px" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $projectExist->name }}</h4>
                                    <p>{{ mb_strimwidth($projectExist->description, 0, 80, '...') }}</p>
                                    <div class="card-bottom d-flex justify-content-between">
                                        <span><img src="{{ asset('img/extern_logo/twitter_logo.png') }}" style="width:40px;" alt="twitter"> {{ $projectExist->twitterFollowerNumber }}</span>
                                        <span><img src="{{ asset('img/extern_logo/crypto/' . $projectExist->blockchain . '.png') }}" style="width:30px;" alt="blockchain"></span>
                                        <span><img src="{{ asset('img/extern_logo/discord_logo.png') }}" style="width:35px;" alt="discord"> {{ $projectExist->discordMemberNumber }}</span>
                                    </div>
                                    <a href="{{ route('projects.show', ['id' => base64_encode($projectExist->id)]) }}">Check this NFT</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="intro d-flex justify-content-between align-items-end m-0">
                        <div class="intro-content">
                            <span>NFT Drops</span>
                            <h1 class="mt-3 mb-0">NFT Drops</h1>
                        </div>
                        <div class="intro-btn">
                            <a class="btn content-btn" href="{{ route('drops.explore') }}" style="padding: 0; font-weight: 600; color: var(--primary-t-color); background: transparent; box-shadow: none; padding-right: 15px;">View All</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-container">
                    <div class="row">
                        @foreach($projects->take(4) as $project)
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card" style="{{ $project->isPromoted() ? 'max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253,156,46,0.7),10px 10px rgba(253,156,46,0.5),15px 15px rgba(253,156,46,0.3),20px 20px rgba(253,156,46,0.2),25px 25px rgba(253,156,46,0.1);' : 'max-height: 700px; min-height: 500px;' }}">
                                <img alt="{{ $project->name }}" class="img-fluid card-img-top"
                                     style="max-height: 256px; max-width: 256px; min-height: 256px; object-fit: cover;"
                                     src="{{ $project->thumbnailUrl() }}">
                                <div class="card-body">
                                    <div class="countdown-times mb-3">
                                        @if(!$project->isLive())
                                        <div class='countdown d-flex justify-content-center'
                                             data-date="{{ $project->dropDatePart() }}"
                                             data-time="{{ $project->dropTimePart() }}"></div>
                                        @else
                                        <center>
                                            <div class="ribbon-wrapper">
                                                <div class="glow">&nbsp;</div>
                                                <div class="ribbon-front">LIVE</div>
                                                <div class="ribbon-edge-topleft"></div>
                                                <div class="ribbon-edge-topright"></div>
                                                <div class="ribbon-edge-bottomleft"></div>
                                                <div class="ribbon-edge-bottomright"></div>
                                            </div>
                                        </center>
                                        @endif
                                    </div>
                                    <h4 class="card-title">{{ $project->name }}</h4>
                                    <p>{{ mb_strimwidth($project->description, 0, 80, '...') }}</p>
                                    <div class="card-bottom d-flex justify-content-between">
                                        <span><img src="{{ asset('img/extern_logo/twitter_logo.png') }}" style="width:40px;" alt="twitter"> {{ $project->twitterFollowerNumber }}</span>
                                        <span><img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" style="width:30px;" alt="blockchain"></span>
                                        <span><img src="{{ asset('img/extern_logo/discord_logo.png') }}" style="width:35px;" alt="discord"> {{ $project->discordMemberNumber }}</span>
                                    </div>
                                    <a href="{{ route('drops.show', ['id' => base64_encode($project->id)]) }}">Check this NFT</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="notable-drops section-padding" id="NFT-DROPS">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section-title text-center">
                                <h2>Why Choose NFTDropCalendar</h2>
                                <p>Discover the benefits of using NFTDropCalendar</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="create-sell-content">
                                <div class="create-sell-content-icon"><i class="fas fa-shield-check"></i></div>
                                <div>
                                    <h4>Verified Projects</h4>
                                    <p>All projects and drops on NFTDropCalendar are verified and legitimate, ensuring a safe and reliable experience for users.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="create-sell-content">
                                <div class="create-sell-content-icon"><i class="fas fa-info-circle"></i></div>
                                <div>
                                    <h4>Comprehensive Information</h4>
                                    <p>NFTDropCalendar provides all the necessary information and tools for users to stay informed and make informed decisions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="create-sell-content">
                                <div class="create-sell-content-icon"><i class="fas fa-bullhorn"></i></div>
                                <div>
                                    <h4>Promote Your Project</h4>
                                    <p>Listing your own NFT project or drop on NFTDropCalendar will give it extra visibility and reach through our newsletter and social media channels.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="create-sell-content">
                                <div class="create-sell-content-icon"><i class="fas fa-dollar-sign"></i></div>
                                <div>
                                    <h4>Free to Use</h4>
                                    <p>NFTDropCalendar is completely free to use for users, with a small fee for listing projects or drops.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
