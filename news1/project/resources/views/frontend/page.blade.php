@extends('layouts.front')
@section('contents')
@section('meta')
<title>{{$page->title}}</title>
<meta property="og:title" content="{{$page->title}}"/>
@endsection
             
                         
@php
    // বর্তমান ভাষা আইডি বের করো
    $language_id = Session::has('language') 
        ? Session::get('language') 
        : DB::table('languages')->where('is_default', '=', 1)->first()->id;

    // ঐ ভাষার পেজ বের করো (slug অনুযায়ী)
    $page = DB::table('pages')
        ->where('slug', $page->slug)
        ->where('language_id', $language_id)
        ->first();
@endphp

@if($page)
<div class="create-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="create-pageTitle">                        
                    <span>{{ $page->title }}</span>     
                </div>
                
                <div class="create-page-details">
                    <p>{!! $page->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="create-page">
    <div class="container">
        <p style="text-align:center; font-weight:bold;">{{ __('No content available for this language') }}</p>
    </div>
</div>
@endif



@endsection