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
    @if(!$project->isVerified())
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
                                <img alt="..." class="img-fluid rounded" src="{{ asset($project->thumbnail) }}">
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">{{ $project->name }}</h3>
                                <hr>
                                <ul class="list-unstyled">
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Total Trading Volume: <strong class="text-primary">
                                            {{ $project->volume }}
                                            @if($project->ethChoice === 'eth') ETH
                                            @elseif($project->ethChoice === 'matic') MATIC
                                            @elseif($project->ethChoice === 'solana') SOL
                                            @endif
                                        </strong></h4>
                                        <span></span>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Collection Supply: <strong class="text-primary">{{ $project->supply }}</strong></h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Marketplace Link:
                                            <strong class="text-primary">
                                                <a href="{{ $project->marketplaceLink }}">Visit Marketplace</a>
                                            </strong>
                                        </h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Total Traits: <strong class="text-primary">{{ $project->traits }}</strong></h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Floor Price: <strong class="text-primary">
                                            {{ $project->floorPrice }}
                                            @if($project->ethChoice === 'eth') ETH
                                            @elseif($project->ethChoice === 'matic') MATIC
                                            @elseif($project->ethChoice === 'solana') SOL
                                            @endif
                                        </strong></h4>
                                    </li>
                                </ul>
                                <hr>
                                <div class="row items">
                                    <div class="col-12 item px-lg-2">
                                        <h4 class="mt-0 mb-2" style="color: #adacad;">Description:</h4>
                                        <div class="price d-flex justify-content-between align-items-center">
                                            {!! nl2br(e($project->description)) !!}
                                        </div>
                                    </div>

                                    <div class="row items">
                                        <hr>
                                        <div class="col-12 item px-lg-2">
                                            <div class="card no-hover">
                                                <h4 class="mt-0 mb-2">Roadmap</h4>
                                                <div class="price d-flex justify-content-between align-items-center">
                                                    <pre>{{ $project->roadmap }}</pre>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row items">
                                            <div class="col-4 item px-lg-2">
                                                <div class="card no-hover">
                                                    <h4 class="mt-0 mb-2">Royalty:</h4>
                                                    <div class="price d-flex justify-content-between align-items-center">
                                                        {{ $project->royality }}%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 item px-lg-2">
                                                <div class="card no-hover">
                                                    <h4 class="mt-0 mb-2">Team:</h4>
                                                    <div class="price d-flex justify-content-between align-items-center">
                                                        {{ $project->teamAmount }} people
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 item px-lg-2">
                                                <div class="card no-hover">
                                                    <h4 class="mt-0 mb-2">Category:</h4>
                                                    <div class="price d-flex justify-content-between align-items-center">
                                                        {{ $project->category }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="d-block btn btn-bordered-white mt-4" target="_blank"
                                           href="https://twitter.com/{{ $project->twitterName }}" style="color: gray">
                                            <img src="{{ asset('img/extern_logo/twitter_logo.png') }}" style="width:25px;" alt="twitter">
                                            Follow {{ $project->twitterName }}
                                        </a>
                                        <a class="d-block btn btn-bordered mt-4" target="_blank"
                                           href="{{ $project->discordLink }}" style="color: gray">
                                            <img src="{{ asset('img/extern_logo/discord_logo.png') }}" style="width:25px;" alt="discord"> Discord server
                                        </a>
                                        <a class="d-block btn btn-bordered mt-4" target="_blank"
                                           href="{{ $project->websiteLink }}" style="color: gray">
                                            <img src="{{ asset('img/extern_logo/link_icon.jpg') }}" style="width:25px;" alt="website"> Website Link
                                        </a>
                                        <div class="section-padding"></div>
                                    </div>
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
