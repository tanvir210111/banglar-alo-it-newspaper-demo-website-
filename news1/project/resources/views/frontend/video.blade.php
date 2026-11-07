@extends('layouts.front')
@section('contents')
 @section('meta')
<title>{{__('Video Gallery')}}</title>
<meta property="og:title" content="{{__('Video Gallery')}}" />
@endsection 



<section class="videoGallery-page">
            <div class="container">
                <div class="archive-info-cats">
                    <a href="#"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> {{__('Video Gallery')}}
                </div>
          
                <div class="video-page-content">
                    <div class="row">
					
					
					
@php
    // বর্তমান ভাষা আইডি বের করো
    $language_id = Session::has('language') 
        ? Session::get('language') 
        : DB::table('languages')->where('is_default', '=', 1)->first()->id;

    // ঐ ভাষার ভিডিও পোস্টগুলো আনো
    $video2 = DB::table('posts')
        ->where('is_videoGallery', 1)
        ->where('language_id', $language_id)
        ->orderBy('id', 'DESC')
        ->limit(100)
        ->get();
@endphp

@if ($video2->count() > 0)
    @foreach($video2 as $row)
        <div class="themesBazar-4 themesBazar-m2">
            <div class="video-page-wrpp">
                <div class="video-page-image">
                    <img class="lazyload"
                         src="{{ asset('assets/images/logo/'.$gs->lazy_baner) }}"
                         data-src="https://img.youtube.com/vi/{{ $row->embed_video }}/mqdefault.jpg">
                    <a href="https://www.youtube.com/watch?v={{ $row->embed_video }}" 
                       class="video-pageIcon popup">
                        <i class="las la-video"></i>
                    </a>
                </div>
                <div class="video-page-title">
                    <a href="https://www.youtube.com/watch?v={{ $row->embed_video }}">
                        {{ strlen($row->title) > 40 ? mb_substr($row->title, 0, 40, 'utf-8') : $row->title }}...
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="themesBazar-4 themesBazar-m2">
        <div class="video-page-wrpp">
            <div class="video-page-image">
                <img class="lazyload" 
                     src="{{ asset('assets/images/logo/'.$gs->lazy_baner) }}" 
                     data-src="https://img.youtube.com/vi//mqdefault.jpg">
                <a href="#" class="video-pageIcon popup"> 
                    <i class="las la-video"></i>  
                </a>
            </div>
            <div class="video-page-title">
                <a href="#">{{ __('No more Video') }}</a>
            </div>
        </div>
    </div>
@endif
			








                        
                        <div style="text-align: center; display: ruby; margin:20px">  </div>   



             
                       
                    </div>
                    
                   
                   
                   

                </div>

      
              

               
            </div>
        </section>






  
@endsection
@push('js')
<script src="{{asset('assets/front/js/notify.min.js')}}"></script>
<script src="{{asset('assets/front/js/rfront.js')}}"></script>

@endpush