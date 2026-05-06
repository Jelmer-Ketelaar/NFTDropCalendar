@extends('layouts.admin')

@section('content')
<section class="activity-area load-more">
    <div class="container">
        <div class="intro mb-4">
            <div class="intro-content">
                <span>Drops</span>
                <h3 class="mt-3 mb-0">Edit</h3>
            </div>
        </div>
        <ul class="list-unstyled">
            @foreach($drops as $drop)
            <li class="single-tab-list d-flex align-items-center" style="{{ $drop->promoted === 'promote' ? 'background-color:yellow;' : '' }}">
                <a href="{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}" target="_blank">
                    <img class="avatar-lg" src="{{ $drop->thumbnail }}" style="min-width:100px;height:100px;" alt="">
                </a>
                <div class="activity-content ml-4">
                    <a href="{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}" target="_blank">
                        <h5 class="mt-0 mb-2">{{ $drop->name }}
                            <a href="https://twitter.com/{{ $drop->twitterName }}" style="color:blue;" target="_blank">Twitter: {{ $drop->twitterName }}</a>
                            <a href="{{ $drop->discordLink }}" style="color:blue;" target="_blank">Discord: {{ $drop->name }}</a>
                        </h5>
                    </a>
                    <form action="{{ route('admin.approve-drop') }}" method="GET">
                        <input type="hidden" name="id" value="{{ base64_encode($drop->id) }}">
                        <div class="row">
                            <div class="col-sm-2">
                                <label>Description</label>
                                <input type="text" value="{{ $drop->description }}" name="projectDes">
                            </div>
                            <div class="col-sm-2">
                                <label>Twitter followers:</label>
                                <input type="text" value="{{ $drop->twitterFollowerNumber }}" name="twitterFollowerAmount">
                            </div>
                            <div class="col-sm-2">
                                <label>Discord:</label>
                                <input type="text" value="{{ $drop->discordMemberNumber ?: '' }}" name="discordMemberNumber">
                            </div>
                            <div class="col-sm-2">
                                <label>Twitter:</label>
                                <input type="text" value="{{ ltrim($drop->twitterName, '@') }}" name="twitterName">
                            </div>
                            <div class="col-sm-2">
                                <label>Mint price:</label>
                                <input type="text" value="{{ $drop->mintPrice }}" name="mintPrice">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" style="background-color:green;color:white;">Update & Accept</button>
                                <a href="{{ route('admin.delete-drop', ['id' => base64_encode($drop->id)]) }}" style="background-color:red;color:white;">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="container mt-5">
        <div class="intro mb-4">
            <div class="intro-content">
                <span>Projects</span>
            </div>
        </div>
        <ul class="list-unstyled">
            @foreach($projects as $project)
            <li class="single-tab-list d-flex align-items-center" style="{{ $project->promoted === 'promote' ? 'background-color:yellow;' : '' }}">
                <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}" target="_blank">
                    <img class="avatar-lg" src="{{ $project->thumbnail }}" style="min-width:100px;height:100px;" alt="">
                </a>
                <div class="activity-content ml-4">
                    <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}" target="_blank">
                        <h5 class="mt-0 mb-2">{{ $project->name }}
                            <a href="https://twitter.com/{{ $project->twitterName }}" style="color:blue;" target="_blank">Twitter: {{ $project->twitterName }}</a>
                            <a href="{{ $project->discordLink }}" style="color:blue;" target="_blank">Discord: {{ $project->name }}</a>
                        </h5>
                    </a>
                    <form action="{{ route('admin.approve-project') }}" method="GET">
                        <input type="hidden" name="id" value="{{ base64_encode($project->id) }}">
                        <div class="row">
                            <div class="col-2">
                                <label>Floorprice:</label>
                                <input type="text" value="{{ $project->floorPrice }}" name="floorPrice">
                            </div>
                            <div class="col-2">
                                <label>Discord:</label>
                                <input type="text" value="{{ $project->discordMemberNumber ?: '' }}" name="discordMemberNumber">
                            </div>
                            <div class="col-2">
                                <label>Twitter:</label>
                                <input type="text" value="{{ ltrim($project->twitterName, '@') }}" name="twitterName">
                            </div>
                            <div class="col-2">
                                <label>Volume:</label>
                                <input type="text" value="{{ $project->volume }}" name="volume">
                            </div>
                            <div class="col-2">
                                <label>Traits:</label>
                                <input type="text" value="{{ $project->traits }}" name="traits" required>
                            </div>
                            <div class="col-2">
                                <button type="submit" style="background-color:green;color:white;">Update & Accept</button>
                                <a href="{{ route('admin.delete-project', ['id' => base64_encode($project->id)]) }}" style="background-color:red;color:white;">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
