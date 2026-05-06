@extends('layouts.app')

@push('head')
<style>#listing { position: absolute; margin-top: -100000px; visibility: hidden; }</style>
@endpush

@section('content')

<section class="author-area section-padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-4">
                <div class="card no-hover text-center" style="position: sticky; top:15vh;">
                    <div class="image-over">
                        <img class="card-img-top" id="projectImage" src="{{ $nft ? asset($nft->thumbnail) : asset('img/content/auction_2.jpg') }}" alt="">
                        <div class="author">
                            <div class="author-thumb avatar-lg">
                                <img class="rounded-circle" id="blockchainLogo"
                                     src="{{ asset('img/extern_logo/crypto/' . ($nft ? $nft->blockchain : 'ethereum') . '.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-caption col-12 p-0">
                        <div class="card-body mt-4">
                            <h5 class="mb-3" id="projectNameInput">{{ $nft ? $nft->name : 'Project Title' }}</h5>
                            <p class="my-3" id="projectShortDesInput">{{ $nft ? $nft->description : 'Project Description' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="intro mt-5 mt-lg-0 mb-4 mb-lg-5">
                    <div class="intro-content">
                        <span>Update your own NFT drop/project</span>
                        <h3 class="mt-3 mb-0">NFT Collection</h3>
                    </div>
                </div>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($dropParam !== 'none' && $nft)
                <form class="item-form card no-hover" id="listingForm" action="{{ route('update.drop') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $nft->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="projectName" placeholder="Project name" required value="{{ old('projectName', $nft->name) }}" maxlength="25">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label>Description:</label>
                                <textarea class="form-control" name="projectDescription" maxlength="750" cols="30" required rows="3">{{ old('projectDescription', $nft->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label>Blockchain:</label>
                                <select name="blockchain" id="selectBlockchain">
                                    @foreach(['ethereum', 'solana', 'polygon', 'cardano', 'avalanche'] as $bc)
                                    <option value="{{ $bc }}" {{ old('blockchain', $nft->blockchain) === $bc ? 'selected' : '' }}>{{ ucfirst($bc) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <hr>
                                <label>Category:</label>
                                @foreach(['Fun', 'Metaverse', 'Artwork'] as $cat)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio{{ $loop->index }}" value="{{ $cat }}" {{ old('inlineRadioOptions', $nft->category) === $cat ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio{{ $loop->index }}">{{ $cat }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <div class="form-group mt-3">
                                <label>NFT public mint date:</label>
                                <input type="datetime-local" name="dropDate" value="{{ old('dropDate', $nft->dropDate) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <div class="form-group">
                                <label>Roadmap:</label>
                                <textarea class="form-control" name="roadmap" cols="30" rows="5" maxlength="2000">{{ old('roadmap', $nft->roadmap) }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <label>Mint Price:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="mintPrice" placeholder="Mint Price (ETH)" step=".0001" value="{{ old('mintPrice', $nft->mintPrice) }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <label>Royalty:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="royality" placeholder="Royalty fee (%)" value="{{ old('royality', $nft->royality) }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Supply:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="supply" placeholder="NFT Supply" value="{{ old('supply', $nft->supply) }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Team Size:</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="teamAmount" placeholder="Team size" value="{{ old('teamAmount', $nft->teamAmount) }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <label>Twitter Name:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="twitterName" placeholder="Twitter username" value="{{ old('twitterName', $nft->twitterName) }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <label>Discord Invite Link:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="discordLink" placeholder="Discord invite link" value="{{ old('discordLink', $nft->discordLink) }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <br>
                            <label>Website Link:</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="websiteLink" placeholder="Website link" value="{{ old('websiteLink', $nft->websiteLink) }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit">Update Drop</button>
                        </div>
                    </div>
                </form>

                @elseif($projectParam !== 'none' && $nft)
                <form class="item-form card no-hover" id="listingForm" action="{{ route('update.project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $nft->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="projectName" placeholder="Project name" value="{{ old('projectName', $nft->name) }}" required maxlength="25">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="projectDescription" maxlength="750" cols="30" required rows="3">{{ old('projectDescription', $nft->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                <select name="blockchain" id="selectBlockchain">
                                    @foreach(['ethereum', 'solana', 'polygon', 'cardano', 'avalanche'] as $bc)
                                    <option value="{{ $bc }}" {{ old('blockchain', $nft->blockchain) === $bc ? 'selected' : '' }}>{{ ucfirst($bc) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-3">
                                @foreach(['Fun', 'Metaverse', 'Artwork'] as $cat)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio{{ $loop->index }}" value="{{ $cat }}" {{ old('inlineRadioOptions', $nft->category) === $cat ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio{{ $loop->index }}">{{ $cat }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <input type="number" class="form-control" name="traits" value="{{ old('traits', $nft->traits) }}" placeholder="Different Traits amount" step="1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-3">
                                <input type="number" class="form-control" name="floorPrice" value="{{ old('floorPrice', $nft->floorPrice) }}" placeholder="Current Floor-price" step="0.00001">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Roadmap:</label>
                                <textarea class="form-control" name="roadmap" cols="30" rows="5" maxlength="2000">{{ old('roadmap', $nft->roadmap) }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="volume" value="{{ old('volume', $nft->volume) }}" placeholder="Volume traded (ETH)" step=".0001">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="royality" value="{{ old('royality', $nft->royality) }}" placeholder="Royalty fee (%)" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="supply" value="{{ old('supply', $nft->supply) }}" placeholder="NFT Supply" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="teamAmount" value="{{ old('teamAmount', $nft->teamAmount) }}" placeholder="Team size" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <div class="form-group">
                                <input type="text" class="form-control" name="twitterName" value="{{ old('twitterName', $nft->twitterName) }}" placeholder="Twitter username" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <hr>
                            <div class="form-group">
                                <input type="text" class="form-control" name="discordLink" value="{{ old('discordLink', $nft->discordLink) }}" placeholder="Discord invite link" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="websiteLink" value="{{ old('websiteLink', $nft->websiteLink) }}" placeholder="Website link" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="marketplaceLink" value="{{ old('marketplaceLink', $nft->marketplaceLink) }}" placeholder="Marketplace link" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="emailContact" value="{{ old('emailContact', $nft->emailContact) }}" placeholder="Email" required maxlength="70">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit">Update project</button>
                        </div>
                    </div>
                </form>

                @else
                <form class="item-form card no-hover" action="{{ route('update') }}" method="GET">
                    <div class="form-group mt-3">
                        <label>Only for drops (that have a mint date):</label>
                        <br>
                        <select name="drop" id="selectDrop">
                            <option value="none">Search your Drop:</option>
                            @foreach($drops as $drop)
                            <option value="{{ base64_encode($drop->id) }}">{{ $drop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Only for projects that already dropped:</label>
                        <br>
                        <select name="project" id="selectProject">
                            <option value="none">Search your Project:</option>
                            @foreach($projects as $project)
                            <option value="{{ base64_encode($project->id) }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit">Get the info</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="section-padding"></div>

@endsection
