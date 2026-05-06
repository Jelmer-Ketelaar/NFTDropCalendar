@extends('layouts.app')

@push('head')
<style>
    .img-fluid { min-height: 350px; max-height: 400px; width: auto; }
    .alert { padding: 20px; background-color: #f44336; color: white; opacity: 1; transition: opacity 0.6s; margin-bottom: 15px; }
    .alert.warning { background-color: #ff9800; width: 50%; }
</style>
@endpush

@section('content')

<div class="item-single section-padding">
    @if(!$drop->isVerified())
    <center>
        <div class="alert warning">
            <strong>Alert!</strong><br> Your project is private for now. We still need to investigate everything and manually fill in some data before your project is public. We will do the investigation as soon as possible!
        </div>
    </center>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="top-bid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img alt="..." class="img-fluid rounded" src="{{ asset($drop->thumbnail) }}">
                                <div class="countdown-times mb-3 card no-hover" style="padding: 1.5rem; margin-top: 2vh; font-size: 30px;">
                                    @if(!$drop->isLive())
                                    <div class="countdown-times mb-3">
                                        <div class='countdown d-flex justify-content-center'
                                             data-date="{{ $drop->dropDatePart() }}"
                                             data-time="{{ $drop->dropTimePart() }}"></div>
                                    </div>
                                    @else
                                    <center>
                                        <div class="ribbon-wrapper" style="width: 200px;">
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
                            </div>

                            <div class="col-md-6">
                                <h3 class="mb-3">{{ $drop->name }}</h3>
                                <hr>
                                <ul class="list-unstyled">
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Mint Price: <strong class="text-primary">
                                            {{ $drop->mintPrice }}
                                            @if($drop->blockchain === 'solana') SOL
                                            @elseif($drop->blockchain === 'ethereum') ETH
                                            @elseif($drop->blockchain === 'cardano') ADA
                                            @elseif($drop->blockchain === 'polygon') MATIC
                                            @endif
                                        </strong></h4>
                                        <span></span>
                                    </li>
                                    <ul class="list-unstyled">
                                        <li class="price d-flex justify-content-between">
                                            <h4 style="color: #adacad;">Collection Supply: <strong class="text-primary">{{ $drop->supply }}</strong></h4>
                                        </li>
                                        <li class="price d-flex justify-content-between">
                                            <h4 style="color: #adacad;">Total Traits: <strong class="text-primary">{{ $drop->traits }}</strong></h4>
                                        </li>
                                    </ul>
                                </ul>
                                <hr>
                                <div class="row items">
                                    <div class="col-12 item px-lg-2">
                                        <h4 class="mt-0 mb-2">Description: </h4>
                                        <div class="price d-flex justify-content-between align-items-center">
                                            {!! nl2br(e($drop->description)) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row items">
                                    <div class="col-12 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Roadmap:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                <p>{!! nl2br(e($drop->roadmap)) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row items">
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Royalty:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                {{ $drop->royality }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Team:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                {{ $drop->teamAmount }} people
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Category:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                {{ $drop->category }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="d-block btn btn-bordered-white mt-4" target="_blank"
                                   href="https://twitter.com/{{ $drop->twitterName }}" style="color: gray">
                                    <img src="{{ asset('img/extern_logo/twitter_logo.png') }}" alt="twitter_logo" style="width:25px;">
                                    Follow {{ $drop->twitterName }}
                                </a>
                                <a class="d-block btn btn-bordered mt-4" target="_blank"
                                   href="{{ $drop->discordLink }}" style="color: gray">
                                    <img src="{{ asset('img/extern_logo/discord_logo.png') }}" alt="discord_logo" style="width:25px;">
                                    Discord server
                                </a>
                                <a class="d-block btn btn-bordered mt-4" target="_blank"
                                   href="{{ $drop->websiteLink }}" style="color: gray">
                                    <img src="{{ asset('img/extern_logo/link_icon.jpg') }}" alt="website_link" style="width:25px;">
                                    Website Link
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
