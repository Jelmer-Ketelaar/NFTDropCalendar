@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

<div class="cont">
    <h2>Write Us</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter your email" required value="{{ old('email') }}"> <br>
        <input type="text" name="name" id="name" placeholder="Enter your name" required value="{{ old('name') }}"><br>
        <input type="text" name="subject" id="subject" placeholder="Subject" required value="{{ old('subject') }}"><br>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message here" required>{{ old('message') }}</textarea><br>
        <button type="submit" class="btn btn-primary w-75">Send</button>
    </form>
</div>
<div class="section-padding"></div>

@endsection
