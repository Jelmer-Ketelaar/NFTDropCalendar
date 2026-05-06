@extends('layouts.app')

@push('head')
<style>.img-fluid { height: auto; width: 100%; }</style>
@endpush

@section('content')

<div class="page-title">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <div class="page-title-content">
                    <h3>NFT Drop</h3>
                    <p class="mb-2">List here your NFT<strong> Drop</strong><br>
                        <strong>DO NOT LIST YOUR PROJECT HERE</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="upload-item section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <h4 class="card-title mb-3">NFT Drop</h4>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('drops.store') }}" method="POST" enctype="multipart/form-data" id="listingForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="projectNameInput">Project Name</label>
                                    <input class="form-control" name="projectName" type="text" required maxlength="50" id="projectNameInput" value="{{ old('projectName') }}">
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="projectShortDesInput">Project Description</label>
                                        <textarea class="form-control" id="projectShortDesInput" name="projectDescription" placeholder="Description about the project" maxlength="750" cols="30" required rows="3">{{ old('projectDescription') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="selectBlockchain">Select Blockchain</label>
                                        <select name="blockchain" id="selectBlockchain" required>
                                            <option value="ethereum" {{ old('blockchain') === 'ethereum' ? 'selected' : '' }}>Ethereum</option>
                                            <option value="solana" {{ old('blockchain') === 'solana' ? 'selected' : '' }}>Solana</option>
                                            <option value="polygon" {{ old('blockchain') === 'polygon' ? 'selected' : '' }}>Polygon</option>
                                            <option value="cardano" {{ old('blockchain') === 'cardano' ? 'selected' : '' }}>Cardano</option>
                                            <option value="avalanche" {{ old('blockchain') === 'avalanche' ? 'selected' : '' }}>Avalanche</option>
                                            <option value="binance" {{ old('blockchain') === 'binance' ? 'selected' : '' }}>Binance</option>
                                            <option value="elrond" {{ old('blockchain') === 'elrond' ? 'selected' : '' }}>Elrond</option>
                                            <option value="arbitrum" {{ old('blockchain') === 'arbitrum' ? 'selected' : '' }}>Arbitrum</option>
                                            <option value="venom" {{ old('blockchain') === 'venom' ? 'selected' : '' }}>Venom Foundation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        @foreach(['Fun', 'Metaverse', 'Artwork'] as $cat)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio{{ $loop->index }}" value="{{ $cat }}" {{ old('inlineRadioOptions', 'Fun') === $cat ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio{{ $loop->index }}">{{ $cat }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <div class="input-group form-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose project image (NO BANNER)</label>
                                            <input type="file" name="thumbnail" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <hr>
                                        <label>NFT public mint date:</label>
                                        <input type="datetime-local" id="birthdaytime" name="dropDate" required value="{{ old('dropDate') }}">
                                        <sub>Already dropped? <a style="color:blue;" href="{{ route('projects.create') }}">here</a></sub>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="traits">Traits</label>
                                        <input type="number" class="form-control" id="traits" name="traits" placeholder="Different Traits amount" step="1" required value="{{ old('traits') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="roadmap">Roadmap:</label>
                                        <textarea class="form-control" id="roadmap" name="roadmap" cols="30" rows="5" maxlength="4000" required>{{ old('roadmap') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="mintPrice">Mint Price</label>
                                        <input type="number" class="form-control" id="mintPrice" name="mintPrice" placeholder="Mint Price (ETH)" step=".0001" required value="{{ old('mintPrice') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="royality">Royalty</label>
                                        <input type="number" class="form-control" id="royality" name="royality" placeholder="Royalty fee (%)" required value="{{ old('royality') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="form-group">
                                        <label for="supply">NFT Supply</label>
                                        <input type="number" class="form-control" id="supply" name="supply" placeholder="NFT Supply (example 3333)" required value="{{ old('supply') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="form-group">
                                        <label for="teamAmount">Team Size</label>
                                        <input type="number" class="form-control" id="teamAmount" name="teamAmount" placeholder="Team size" required value="{{ old('teamAmount') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="twitterNameInput">Twitter Username</label>
                                        <input type="text" class="form-control" id="twitterNameInput" name="twitterName" placeholder="Twitter username (NO LINKS)" required value="{{ old('twitterName') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="discordNameInput">Discord Invite Link</label>
                                        <input type="text" class="form-control" id="discordNameInput" name="discordLink" placeholder="Discord invite link" required value="{{ old('discordLink') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="websiteLinkInput" class="form-label">Website Link</label>
                                        <input type="text" class="form-control" id="websiteLinkInput" name="websiteLink" placeholder="Website link" required value="{{ old('websiteLink') }}">
                                    </div>
                                </div>
                                <input type="hidden" id="signature" name="signature" value="">
                                <div class="col-12">
                                    <hr>
                                    <div class="form-group mt-3">
                                        <label for="emailContact" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailContact" name="emailContact" placeholder="Email (only for contact, nobody can see)" required maxlength="70" value="{{ old('emailContact') }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="promotionBox" id="promotionBox2" value="promote2" checked>
                                            <label class="form-check-label" for="promotionBox2">Listing on NFTDropCalendar <strong>FREE</strong></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit">List drop</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-6">
                <div style="position: sticky; top: 0;">
                    <h4 class="card-title mb-3">Preview</h4>
                    <div class="card items">
                        <div class="card-body mt-4">
                            <div class="items-img position-relative image-over">
                                <img alt="" class="img-fluid rounded mb-3" src="{{ asset('img/items/1.jpg') }}" id="projectImage">
                                <center>
                                    <div class="author">
                                        <div class="author-thumb avatar-lg">
                                            <img class="rounded-circle" id="blockchainLogo" src="{{ asset('img/extern_logo/crypto/ethereum.png') }}" alt="">
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <h4 class="mb-3" id="projectName">Project name</h4>
                            <p class="my-3" id="projectShortDes">Project description</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/data.js') }}"></script>
@endpush
