@extends('layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="page-title-content">
                    <h1 class="mb-3">Submit Your NFT Drop</h1>
                    <p class="mb-0" style="font-size: 1.125rem;">Get your NFT project discovered by thousands of collectors. Fill out the form below to list your drop on NFTDropCalendar.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="upload-item section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- Form Column -->
            <div class="col-lg-8 col-12">
                @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <h5 style="margin-top: 0;">Please fix the following errors:</h5>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('drops.store') }}" method="POST" enctype="multipart/form-data" id="listingForm">
                    @csrf

                    <!-- Basic Info Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="border-bottom: 2px solid var(--nft-border); padding-bottom: 1rem;">
                                <i class="fas fa-info-circle"></i> Basic Information
                            </h5>

                            <div class="form-group mb-4">
                                <label class="form-label" for="projectNameInput">Project Name <span style="color: var(--nft-red);">*</span></label>
                                <input class="form-control" name="projectName" type="text" required maxlength="50" id="projectNameInput" placeholder="Your NFT project name" value="{{ old('projectName') }}">
                                <small class="d-block" style="margin-top: 0.5rem;">Max 50 characters</small>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label" for="projectShortDesInput">Project Description <span style="color: var(--nft-red);">*</span></label>
                                <textarea class="form-control" id="projectShortDesInput" name="projectDescription" placeholder="Tell the world about your NFT project..." maxlength="750" required rows="4">{{ old('projectDescription') }}</textarea>
                                <small class="d-block" style="margin-top: 0.5rem;">Max 750 characters</small>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="selectBlockchain">Blockchain <span style="color: var(--nft-red);">*</span></label>
                                        <select name="blockchain" id="selectBlockchain" class="form-control" required>
                                            <option value="">Select Blockchain</option>
                                            <option value="ethereum" {{ old('blockchain') === 'ethereum' ? 'selected' : '' }}>Ethereum</option>
                                            <option value="solana" {{ old('blockchain') === 'solana' ? 'selected' : '' }}>Solana</option>
                                            <option value="polygon" {{ old('blockchain') === 'polygon' ? 'selected' : '' }}>Polygon</option>
                                            <option value="cardano" {{ old('blockchain') === 'cardano' ? 'selected' : '' }}>Cardano</option>
                                            <option value="avalanche" {{ old('blockchain') === 'avalanche' ? 'selected' : '' }}>Avalanche</option>
                                            <option value="binance" {{ old('blockchain') === 'binance' ? 'selected' : '' }}>Binance Smart Chain</option>
                                            <option value="elrond" {{ old('blockchain') === 'elrond' ? 'selected' : '' }}>Elrond</option>
                                            <option value="arbitrum" {{ old('blockchain') === 'arbitrum' ? 'selected' : '' }}>Arbitrum</option>
                                            <option value="venom" {{ old('blockchain') === 'venom' ? 'selected' : '' }}>Venom Foundation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category <span style="color: var(--nft-red);">*</span></label>
                                        <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                                            @foreach(['Fun', 'Metaverse', 'Artwork'] as $cat)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio{{ $loop->index }}" value="{{ $cat }}" {{ old('inlineRadioOptions', 'Fun') === $cat ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio{{ $loop->index }}" style="cursor: pointer; margin-bottom: 0;">{{ $cat }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputGroupFile01">Project Image <span style="color: var(--nft-red);">*</span></label>
                                <div class="input-group">
                                    <input type="file" name="thumbnail" class="form-control" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)" required>
                                </div>
                                <small class="d-block" style="margin-top: 0.5rem;">JPG, PNG, GIF or WebP. Max 10MB. Square image recommended.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Drop Details Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="border-bottom: 2px solid var(--nft-border); padding-bottom: 1rem;">
                                <i class="fas fa-calendar-alt"></i> Drop Details
                            </h5>

                            <div class="form-group mb-4">
                                <label class="form-label" for="birthdaytime">NFT Launch Date & Time <span style="color: var(--nft-red);">*</span></label>
                                <input type="datetime-local" class="form-control" id="birthdaytime" name="dropDate" required value="{{ old('dropDate') }}">
                                <small class="d-block" style="margin-top: 0.5rem;">When will your NFT be available for minting?</small>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="mintPrice">Mint Price <span style="color: var(--nft-red);">*</span></label>
                                        <input type="number" class="form-control" id="mintPrice" name="mintPrice" placeholder="0.00" step=".0001" required value="{{ old('mintPrice') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Price per NFT in blockchain currency</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="supply">NFT Supply <span style="color: var(--nft-red);">*</span></label>
                                        <input type="number" class="form-control" id="supply" name="supply" placeholder="3333" required value="{{ old('supply') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Total number of NFTs in collection</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="traits">Total Traits <span style="color: var(--nft-red);">*</span></label>
                                        <input type="number" class="form-control" id="traits" name="traits" placeholder="150" step="1" required value="{{ old('traits') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Number of unique traits</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="royality">Royalty % <span style="color: var(--nft-red);">*</span></label>
                                        <input type="number" class="form-control" id="royality" name="royality" placeholder="5" required value="{{ old('royality') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Creator royalty percentage (0-100)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="roadmap">Project Roadmap <span style="color: var(--nft-red);">*</span></label>
                                <textarea class="form-control" id="roadmap" name="roadmap" placeholder="Outline your project roadmap and future plans..." rows="6" maxlength="4000" required>{{ old('roadmap') }}</textarea>
                                <small class="d-block" style="margin-top: 0.5rem;">Max 4000 characters</small>
                            </div>
                        </div>
                    </div>

                    <!-- Team & Social Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="border-bottom: 2px solid var(--nft-border); padding-bottom: 1rem;">
                                <i class="fas fa-users"></i> Team & Social Links
                            </h5>

                            <div class="form-group mb-4">
                                <label class="form-label" for="teamAmount">Team Size <span style="color: var(--nft-red);">*</span></label>
                                <input type="number" class="form-control" id="teamAmount" name="teamAmount" placeholder="5" required value="{{ old('teamAmount') }}">
                                <small class="d-block" style="margin-top: 0.5rem;">Number of team members</small>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="twitterNameInput">Twitter Username <span style="color: var(--nft-red);">*</span></label>
                                        <input type="text" class="form-control" id="twitterNameInput" name="twitterName" placeholder="yourhandle (without @)" required value="{{ old('twitterName') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Twitter handle (no links)</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discordNameInput">Discord Invite Link <span style="color: var(--nft-red);">*</span></label>
                                        <input type="text" class="form-control" id="discordNameInput" name="discordLink" placeholder="https://discord.gg/..." required value="{{ old('discordLink') }}">
                                        <small class="d-block" style="margin-top: 0.5rem;">Full Discord invite URL</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="websiteLinkInput">Website Link <span style="color: var(--nft-red);">*</span></label>
                                <input type="text" class="form-control" id="websiteLinkInput" name="websiteLink" placeholder="https://yourproject.com" required value="{{ old('websiteLink') }}">
                                <small class="d-block" style="margin-top: 0.5rem;">Full URL to your project website</small>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="border-bottom: 2px solid var(--nft-border); padding-bottom: 1rem;">
                                <i class="fas fa-envelope"></i> Contact Information
                            </h5>

                            <div class="form-group">
                                <label class="form-label" for="emailContact">Email Address <span style="color: var(--nft-red);">*</span></label>
                                <input type="email" class="form-control" id="emailContact" name="emailContact" placeholder="you@example.com" required maxlength="70" value="{{ old('emailContact') }}">
                                <small class="d-block" style="margin-top: 0.5rem;">Private - used only for contact purposes</small>
                            </div>
                        </div>
                    </div>

                    <!-- Listing Options -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4" style="border-bottom: 2px solid var(--nft-border); padding-bottom: 1rem;">
                                <i class="fas fa-star"></i> Listing Option
                            </h5>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promotionBox" id="promotionBox2" value="promote2" checked>
                                <label class="form-check-label" for="promotionBox2">
                                    <strong style="color: var(--nft-accent);">Free Listing</strong> on NFTDropCalendar
                                    <br>
                                    <small style="color: var(--nft-text-muted);">Your drop will appear in our directory</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Fields -->
                    <input type="hidden" id="signature" name="signature" value="">

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit" style="padding: 1rem;">
                            <i class="fas fa-rocket"></i> Submit Your Drop
                        </button>
                    </div>
                </form>
            </div>

            <!-- Preview Sidebar -->
            <div class="col-lg-4 col-12">
                <div style="position: sticky; top: 120px;">
                    <h5 class="mb-4" style="color: var(--nft-text);">Live Preview</h5>
                    <div class="card">
                        <img alt="Preview" class="card-img-top" src="{{ asset('img/items/1.jpg') }}" id="projectImage" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <div style="text-align: center; margin-bottom: 1rem;">
                                <img class="rounded-circle" id="blockchainLogo" src="{{ asset('img/extern_logo/crypto/ethereum.png') }}" alt="Blockchain" style="width: 60px; height: 60px; border: 2px solid var(--nft-border);">
                            </div>
                            <h5 class="card-title text-center" id="projectName">Project name</h5>
                            <p class="card-text text-muted text-center" id="projectShortDes" style="font-size: 0.9rem;">Project description</p>
                        </div>
                    </div>
                    <small style="display: block; margin-top: 1rem; color: var(--nft-text-muted); text-align: center;">
                        This is how your drop will appear in the gallery
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/data.js') }}"></script>
@endpush
