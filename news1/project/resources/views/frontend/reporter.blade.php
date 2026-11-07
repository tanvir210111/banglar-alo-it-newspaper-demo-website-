@extends('layouts.front')

@section('meta')
    <title>{{ __('Our Reporters') }}</title>
    <meta property="og:title" content="{{ __('Our Reporters') }}" />
@endsection

@section('contents')

<style>
/* ✅ Team Section Styling */
.team-section {
    background: #f9f9f9;
    padding: 60px 0;
}
.team-wrpp {
    position: relative;
    overflow: hidden;
    background: #fff;
    border-radius: 15px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}
.team-wrpp:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
.team-image {
    width: 100%;
    aspect-ratio: 1/1;
    overflow: hidden;
    border-radius: 15px 15px 0 0;
    position: relative;
}
.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s ease;
}
.team-wrpp:hover img {
    transform: scale(1.05);
    filter: brightness(80%);
}
.team-info {
    padding: 15px;
}
.team-name {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 5px;
    transition: 0.3s;
}
.team-name a {
    text-decoration: none;
    color: inherit;
}
.team-name a:hover {
    color: #e91e63;
}
.team-deg {
    color: #777;
    font-size: 14px;
}
.team-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    transition: 0.3s ease;
}
.team-wrpp:hover .team-overlay {
    opacity: 1;
}
.team-overlay h5 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}
</style>

<div class="team-section">
    <div class="container">
        <h2 class="text-center mb-5" style="font-weight:700; font-size:30px; color:#222;">
            {{ __('Our Reporters') }}
        </h2>

        <div class="row justify-content-center">
            @php
                $reporters = DB::table('users')->limit(1000)->get();
            @endphp

            @foreach($reporters as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="team-wrpp">
                        <div class="team-image">
                            <img src="{{ asset('assets/images/admin/'.$row->photo) }}" alt="{{ $row->name }}">
                            <div class="team-overlay">
                                <h5>{{ $row->name }}</h5>
                            </div>
                        </div>
                        <div class="team-info text-center">
                            <h4 class="team-name"><a href="#">{{ $row->name }}</a></h4>
                            <h6 class="team-deg">{{ $row->designation }}</h6>
							<h6 class="team-deg">মোবাইল : {{ $row->phone }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
