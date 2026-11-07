@extends('layouts.front')
@section('contents')
@section('meta')
<title>{{$data->title}}</title>
<meta name="Description" content="{!! $data->short_description !!}">
<meta name="Keywords" content="{!! $data->meta_tag !!}">
<meta property="og:title" content="{{$data->title}}" />
<meta property="og:description" content="{!! $data->short_description !!}" />
<meta property="og:image" content="{{asset('assets/images/post/'.$data->image_big)}}" />
@endsection

<div class="single-page2" >
       
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-page2-topAdd">
                            
                            
                        </div>
                      
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-7 col-md-9">
                      <div class="single-home2">
                           <div class="single-white">
                               <div class="single-home-cat2">
                                   <ul>
                                       <li><a href="#"> <i class="las la-home"></i> {{__('Home')}} </a> <i class="las la-angle-double-right"></i></li>
                                       <li><a href="#">  {{$data->category->title}} </a> <i class="las la-angle-double-right"></i> </li>
                                                                              
                                   </ul>
                               </div>
                            </div>
                        </div>
                        
                        <div class="single-white2 ">

                            <h1 class="single-page2-title"> 
                                {{$data->title}}
                            </h1>
                            <div class="update-time">

                                <ul>
								
								
								
								
								
								
								
								@if ($data->admin_id == 0 && $data->user_id != 0)
                                    <li>  <a href="#"> <img src="{{asset('assets/images/admin/'.$data->user->photo)}}" alt="">{{ $data->user->name }}</a> </li>
                                @else
								<li>  <a href="#"> <img src="{{asset('assets/images/admin/'.$data->admin->photo)}}" alt="">{{$data->admin->name}}</a> </li>
							 @endif
							 
							 
								
								
								
								
								
								
								
								
								</ul>


                                <ul>
                                   
                                   <li> <i class="lar la-clock"></i>
                            {{__('News Release Date')}} : 
                                                      
                                                                                                             {{$data->createdAt()}} | <a href="{{ route('frontend.photo.card', [$data->id, $data->slug]) }}" 
   target="_blank" 
   class="text-dark fw-normal text-decoration-none">
    <i class="lar la-image"></i> {{ __('Photo Card') }}
</a>
 |  <i class="lar la-eye"></i> {{__('How Many People See')}}: {{ $data->views_count }}
                                                        
                                                        
                                                         </li>
                                </ul>
                             
                            </div>
                            <div class="single-image2">
                                <img class="lazyload" src="{{asset('assets/images/post/'.$data->image_big)}}" data-src="{{asset('assets/images/post/'.$data->image_big)}}" alt="{{$data->title}}" title="{{$data->title}}" width="100%" height="auto">
                                <span style="font-style: italic; color: #333;"> {{__('Images Caption')}} : {{ $data->images_caption }} </span> 

                     

                            </div>

                            <div class="single-page-add2">
                                 {!!$gs->header3_728!!}
                            
                            </div>
                           
                           <div class="single-content2">
                                 @if ($data->post_type == 'article')
                                    {!! $data->description !!}
								  @endif
								  @if ($data->post_type == 'video')
								
                                  @if ($data->embed_video)							
								  {!! $data->description !!}
								   <iframe width="615" height="400" src="https://www.youtube.com/embed/{!!$data->embed_video!!}" title="Types Of ভাড়াটিয়া || Comedy Special || Sanjay Das - Bishakto Sanju | Joy-Rupam-Ayan-Shuvro || 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
								  @else 
									    <video controls >
                                            <source src="{{asset('assets/videos/'.$data->video)}}" type="video/mp4">
                                        </video>
										@endif
								   
								   @endif
								   
								                              @if ($data->post_type == 'audio')
	<p style="text-align: center;"><b>{{__('Audio File')}}</b></p>
<audio controls="" style="width:100%">
				 <source src="{{asset('assets/audios/'.$data->audio)}}" type="audio/mp3">
				</audio>
				 {!! $data->description !!}
				@endif
                                    								
								  
									 
							</div>

                           </br>
{{__('Posted by')}} : 

@if ($data->admin_id == 0 && $data->user_id != 0)
	{{ $data->user->name }}
 @else
	 {{$data->admin->name}}
@endif
</br></br>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_mastodon"></a>
<a class="a2a_button_email"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_google_gmail"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_pocket"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_reddit"></a>
<a class="a2a_button_pinterest"></a>
<a class="a2a_button_facebook_messenger"></a>
</div>
<script defer src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
                            

                       
    <div class="row">
        <div class="col-lg-9 col-md-9">

                                
                <div class="addthis_inline_share_toolbox"></div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="single-social" style="  background: #3b5998; width: 100%; padding: 10px; text-align: center; "> 
            <a href="{{ URL::to('print/'.$data->id.'/'.$data->slug)}}" style="color:white;" target="_blank"> {{__('Print News')}} : <i class="las la-print"></i></a>
        </div>
        </div>

    </div>


    
<div style="margin-top: 20px; border-bottom: 1px solid #ddd; padding: 8px 0px;"> {{__('Comment Box')}} </div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0&appId=1716117305495236" nonce="OKS9Fdbx"></script>
<div class="fb-comments" data-href="{{ URL::to($data->id.'/'.$data->slug)}}" data-width="600" data-numposts="10"></div>


                          
                       
                        </div>
                        

                          <!-- Author start -->
                        <div class="author">
                      
                            <div class="author-content">

                                <h6 class="author-caption">
                                   <span> {{__('Reporter information')}}  </span>                         
                                </h6>




@if ($data->admin_id == 0 && $data->user_id != 0)
                                <div class="author-image">
                                    <img src="{{asset('assets/images/admin/'.$data->user->photo)}}" alt="{{ $data->user->name }}">
                                </div>

                                <h1 class="author-name">
                                    <a href=""> {{ $data->user->name }}  </a>   
                                </h1>

                                <div class="author-title">
                                 <strong><a href="">{{__('Reporter mobile')}} : {{$data->user->phone}} </a></strong>
                                </div>
								  @else
								
								
						<div class="author-image">
                                    <img src="{{asset('assets/images/admin/'.$data->admin->photo)}}" alt="{{$data->admin->name}}">
                                </div>

                                <h1 class="author-name">
                                    <a href=""> {{$data->admin->name}}  </a>   
                                </h1>

                                <div class="author-title">
                                 <strong><a href="">{{__('Reporter mobile')}} : {{$data->admin->phone}} </a></strong>
                                </div>
								@endif
    

                            </div>
                        

                            

                        </div>


                       <!-- Author End -->

                <!--======== Related news start ========-->
                        <div class="related-section">
                           <div class="related-new-cat">
                                       <span><a href="#"> {{__('More news like this')}} </a></span>
                                   </div>
                            <div class="single-white">
                                <div class="related-news-content2"> <!--Related News start-->
                                   <div class="row">
            @php
    // ✅ সেশন থেকে বর্তমান ভাষা আইডি বের করা
    if(session()->has('language')){
        $default_language = session()->get('language');
    }else{
        $default_language = \App\Models\Language::where('is_default',1)->value('id');
    }

    // ✅ ভাষা অনুযায়ী জনপ্রিয় পোস্ট লোড করা
    $popular = DB::table('posts')
                ->where('language_id', $default_language)
                ->where('is_feature', 1)
                ->orderByDesc('id')
                ->inRandomOrder()
                ->limit(6)
                ->get();
@endphp

                                  @foreach($popular as $row)   
                                 <div class="themesBazar-3 themesBazar-m2">
                                            <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                                <div class="relatedImage2">
                                                    <img class="lazyload" src="{{asset('assets/images/post/'.$row->image_big)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">

                                                     <a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}" class="single2-rIcon"></a>  

                                                </div>                                        
                                                <h4 class="relatedTitle2"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}</a></h4> 
                                                
                                            </div> <!--Related Wrpp End-->
                                       </div>
                                             @endforeach                                                                   
                                                                               

                                   </div>
                                    
                             
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    <div class="col-lg-2 col-md-3 order-first">
                        <div class="fixrd-sitber" style="position: sticky; top: 0;">
                            <div class="single-white ">
                                <div class="latest-title">
                                    <i class="fas fa-map-marker-alt"></i>  {{__('Latest News')}}
                                </div>
                                <div class="single-itemContent">
                                    <div class="row">
@php
    // ✅ বর্তমান ভাষা নির্ধারণ
    if(session()->has('language')){
        $default_language = session()->get('language');
    }else{
        $default_language = \App\Models\Language::where('is_default',1)->value('id');
    }

    // ✅ ভাষাভিত্তিক ট্রেন্ডিং (latest) পোস্ট লোড
    $latest = DB::table('posts')
                ->where('language_id', $default_language)
                ->where('is_trending', 1)
                ->orderByDesc('id')
                ->inRandomOrder()
                ->limit(10)
                ->get();
@endphp

                                        
                                          


										 @foreach ($latest as $row) 
                                        <div class="themesBazar-1 themesBazar-m2">
                                            <div class="single-drack-bg">
                                                <div class="single-left">
                                                    <img class="lazyload" src="{{asset('assets/images/post/'.$row->image_big)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">
                                                     

                                                </div>
                                                <h4 class="leftSitbe-title"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}  </a></h4> 
                                            </div>
                                        </div>
@endforeach 
                                                                        
                                        

                                                                                

                                    </div>


                                   <div class="seingle2-sitebarAdd2">
                                
                            
                            </div>
                              

                        
                               
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8">
                        <div class="fixrd-sitber" style="position: sticky; top: 0;">
                           
                            <div class="single-white">

                                


                            <div class="popular-cat">
                                {{__('Featured News')}}
                            </div>
@php
    // ✅ বর্তমান ভাষা নির্ধারণ
    if (session()->has('language')) {
        $default_language = session()->get('language');
    } else {
        $default_language = \App\Models\Language::where('is_default', 1)->value('id');
    }

    // ✅ ভাষাভিত্তিক স্লাইডার পোস্ট লোড
    $alocito1 = DB::table('posts')
                ->where('language_id', $default_language)
                ->where('is_slider', 1)
                ->orderByDesc('id')
                ->inRandomOrder()
                ->limit(1)
                ->get();

    $alocito2 = DB::table('posts')
                ->where('language_id', $default_language)
                ->where('is_slider', 1)
                ->orderByDesc('id')
                ->inRandomOrder()
                ->skip(1)
                ->limit(10)
                ->get();
@endphp
                                                        

                                                                     
@foreach ($alocito1 as $row)
                                <div class="rightSitbear-image">
                                    <img class="lazyload" src="{{asset('assets/images/post/'.$row->image_big)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">

                                     <a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}" class="single2-siteIcon"></a>  

                                </div>
                                <h4 class="rSitebar-title"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}  </a></h4> 
                                
     @endforeach  
                                
                                <div class="popular-content"> <!--Popular Content-->
                                    <div class="row">
                                        

                                         

										 @foreach ($alocito2 as $row)
                                        <div class="themesBazar-2 themesBazar-m2">
                                            <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                                <div class="rightSitbear-image2">
                                                    <img class="lazyload" src="public/templateimage/63c14ff5deb73.jpg" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">

                                                     

                                                </div>
                                                <h4 class="rSitebar-title2"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}  </a></h4> 
                                            </div> <!--Popular Wpp End-->
                                            
                                        </div>
                                             @endforeach   
										   
										   
										   
                                         

                                    </div>

                                    
                               
                                
                                </div>
                                
                                
                            </div>
                            
                            <div class="seingle2-sitebarAdd2">
                                
                            
                            </div>

                        </div>
                     
                        
                    </div>
                </div>
            </div>

 
        </div>


@endsection