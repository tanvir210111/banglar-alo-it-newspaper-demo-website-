@extends('layouts.front')
@section('contents')

@section('meta')
<title>{{__('Photo Gallery')}}</title>
<meta property="og:title" content="{{__('Photo Gallery')}}" />
@endsection


<section class="photoArchive-page">
            <div class="container">
              
                <div class="photoArchive-page-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="archive-info-cats">
                                <a href="#"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> {{__('Photo Gallery')}}
                            </div>
                      
                            <div class="row">
                                
@php
    // বর্তমান ভাষা আইডি বের করো
    $language_id = Session::has('language') 
        ? Session::get('language') 
        : DB::table('languages')->where('is_default', '=', 1)->first()->id;

    // সেই ভাষার image_albums গুলো আনো
    $photobig = DB::table('image_albums')
        ->where('language_id', $language_id)
        ->orderBy('id', 'DESC')
        ->get();
@endphp

@if ($photobig->count() > 0)
    @foreach ($photobig as $row)
        <div class="themesBazar-4 themesBazar-m2">
            <div class="photoArchive-page-wrpp">
                <div class="photoArchive-page-image">
                    <a class="photoArchive-pageIcon themesbazar" 
                       href="{{ asset('assets/images/image-album/'.$row->photo) }}">  
                        <i class="las la-camera"></i>
                        <img src="{{ asset('assets/images/image-album/'.$row->photo) }}" 
                             alt="{{ $row->album_name }}">
                    </a>
                </div>
                <div class="photoArchive-page-title">
                    <a href="{{ asset('assets/images/image-album/'.$row->photo) }}">
                        {{ $row->album_name }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="themesBazar-4 themesBazar-m2">
        <div class="photoArchive-page-wrpp">
            <div class="photoArchive-page-image">
                <a class="photoArchive-pageIcon themesbazar" href="assets/images/nopic.png">  
                    <i class="las la-camera"></i>
                    <img src="assets/images/nopic.png" alt="{{ __('No Images Here') }}">
                </a>
            </div>
            <div class="photoArchive-page-title">
                <a href="#">{{ __('No Images Here') }}</a>
            </div>
        </div>
    </div>
@endif
								
                                
                                
    
                                
                               
                            </div>

                            <div style="text-align: center; display: ruby; margin : 20px">  </div>
                            
                        </div>
                        
                    </div>
                  
                  
                </div>

      

               
            </div>
        </section>






  
@endsection
@push('js')
<script src="{{asset('assets/front/js/notify.min.js')}}"></script>
<script src="{{asset('assets/front/js/rfront.js')}}"></script>

@endpush