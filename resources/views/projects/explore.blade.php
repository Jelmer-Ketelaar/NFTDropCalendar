@extends('layouts.app')

@section('content')

<section class="explore-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7">
                <div class="intro text-center mb-4">
                    <br>
                    <span>Explore Projects</span>
                    <h3 class="mt-3 mb-0">Verified & Real Projects</h3>
                    <p>All the projects on this page are verified and checked by NFTDropCalendar, they also have a roadmap with bright future plans.</p>
                </div>
            </div>
        </div>

        <div class="row items explore-items">
            @foreach($projects as $project)
            <div class="col-12 col-sm-3 item explore-item" data-groups='["ethereum"]' style="margin-top:0;">
                <div class="swiper-slide item">
                    <div class="card" style="{{ $project->isPromoted() ? 'max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253,156,46,0.7),10px 10px rgba(253,156,46,0.5),15px 15px rgba(253,156,46,0.3),20px 20px rgba(253,156,46,0.2),25px 25px rgba(253,156,46,0.1);' : 'max-height: 700px; min-height: 500px;' }}">
                        <img alt="" class="img-fluid card-img-top" src="{{ asset($project->thumbnail) }}" style="object-fit: cover;">
                        @if($project->isPromoted())
                        <div class="sample">
                            <div class="ribbon down" style="--color: #fd9c2e;">
                                <div class="content">
                                    <svg width="24px" height="24px" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="card-caption col-12 p-0">
                            <div class="card-body">
                                <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}" target="_blank">
                                    <h5 class="mb-0">{{ $project->name }}</h5>
                                </a>
                                <a class="seller d-flex align-items-center my-3" href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}" target="_blank">
                                    <span class="ml-2" style="color:grey;">{{ mb_strimwidth($project->description, 0, 47, '..') }}</span>
                                </a>
                                <div class="card-bottom d-flex justify-content-between">
                                    <span><img src="{{ asset('img/extern_logo/twitter_logo.png') }}" style="width:40px;" alt="twitter"> {{ $project->twitterFollowerNumber }}</span>
                                    <span><img src="{{ asset('img/extern_logo/crypto/' . $project->blockchain . '.png') }}" style="width:30px;" alt="blockchain"></span>
                                    <span><img src="{{ asset('img/extern_logo/discord_logo.png') }}" style="width:35px;" alt="discord"> {{ $project->discordMemberNumber }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="section-padding"></div>

@endsection
