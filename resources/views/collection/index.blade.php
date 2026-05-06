@extends('layouts.app')

@section('content')

<div class="collections section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter-tab">
                    <div class="mb-4">
                        <form method="GET" action="{{ route('collection') }}">
                            <select name="blockchain" onchange="this.form.submit()">
                                <option value="">All Blockchains</option>
                                @foreach($blockchains as $value => $label)
                                <option value="{{ $value }}" {{ $selectedBlockchain === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    @if($drops->isNotEmpty())
                    <h5 class="mb-3">Drops</h5>
                    <div class="row">
                        @foreach($drops as $drop)
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="card items">
                                <div class="card-body">
                                    <div class="items-img position-relative">
                                        <a href="{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}">
                                            <img class="avatar-lg" src="{{ asset($drop->thumbnail) }}" style="min-width:90px;height:90px;" alt="">
                                        </a>
                                    </div>
                                    <a href="{{ route('drops.show', ['id' => base64_encode($drop->id)]) }}">
                                        <h4 class="mt-0 mb-2">{{ $drop->name }}</h4>
                                    </a>
                                    <p class="mb-0">{{ Str::limit($drop->description, 80) }}</p>
                                    <p class="text-center mt-2">{{ ucfirst($drop->blockchain) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($projects->isNotEmpty())
                    <h5 class="mb-3 mt-4">Projects</h5>
                    <div class="row">
                        @foreach($projects as $project)
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="card items">
                                <div class="card-body">
                                    <div class="items-img position-relative">
                                        <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}">
                                            <img class="avatar-lg" src="{{ asset($project->thumbnail) }}" style="min-width:90px;height:90px;" alt="">
                                        </a>
                                    </div>
                                    <a href="{{ route('projects.show', ['id' => base64_encode($project->id)]) }}">
                                        <h4 class="mt-0 mb-2">{{ $project->name }}</h4>
                                    </a>
                                    <p class="mb-0">{{ Str::limit($project->description, 80) }}</p>
                                    <p class="text-center mt-2">{{ ucfirst($project->blockchain) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($drops->isEmpty() && $projects->isEmpty())
                    <p class="text-center mt-5">No collections found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
