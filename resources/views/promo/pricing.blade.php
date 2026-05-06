@extends('layouts.app')

@section('content')

<div style="text-align:center;">
    <img src="{{ asset('img/NFTDropCalendar_pricing.jpg') }}" style="width:30vw; height:100%; margin-top:5vh; box-shadow:0 0 20px #dadee6; border-radius:5px;" id="pdf" alt="NFT Drop Calendar Pricing">
</div>
<div class="section-padding" style="padding-bottom:10vh;"></div>

@endsection

@push('head')
<style>
    @media (max-width: 993px) { #pdf { width: 90vw !important; } }
</style>
@endpush
