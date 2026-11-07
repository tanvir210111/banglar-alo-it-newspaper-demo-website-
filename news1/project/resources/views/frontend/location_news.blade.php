@extends('layouts.front')
@section('contents')
 @section('meta')
<title>অবস্থানভিত্তিক খবর</title>
<meta property="og:title" content="অবস্থানভিত্তিক খবর" />
<meta property="og:image" content="{{asset('assets/images/'.$gs->og_baner)}}" />
@endsection	 
<div class="archive-page2">
            <div class="container">


                <div class="row">   
                    <div class="col-lg-8 col-md-8">
                        <div class="rachive-info-cats">
                            <a href="/"><i class="las la-home"> </i> </a>  <i class="las la-angle-right"></i> {{ $division->name ?? '' }} <i class="las la-angle-right"></i> {{ $district->name ?? '' }} <i class="las la-angle-right"></i> {{ $upazila->name ?? '' }}
                        </div>

                        <div class="archivePage-content2">
                            <div class="row">
                                

                                
                                                                    

                          @if($posts->count() > 0)
                                       @foreach($posts as $post)
							   <div class="themesBazar-3 themesBazar-m2">
                                    <div class="archivePage-wrpp2">
                                        <div class="archive2-image">
                                            <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}" title="{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}">

                                             

                                        </div>
                                        <h4 class="archivePage2-title">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug])}}">{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}</a>
                                        </h4>
                                        
                                        <div class="archive-meta2">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug])}}"><i class="las la-tags"> </i>  {{__('Release Date')}} : {{$post->createdAt()}}
  </a>
                                        </div>
                                    </div>
                                </div>
@endforeach
                               @else
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-danger text-danger text-center">{{__('No information found.')}}</p>
                                        </div>
                                    </div>
                                </div>
                        @endif                                                              

                              
							  
							  
							  

                                 
     @if ($posts->hasPages())
    <div class="custom-pagination text-center mt-4 mb-4">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($posts->onFirstPage())
                <li class="disabled"><span>« {{__('Previous')}}</span></li>
            @else
                <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">« {{__('Previous')}}</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($posts->links()->elements[0] ?? [] as $page => $url)
                @if ($page == $posts->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($posts->hasMorePages())
                <li><a href="{{ $posts->nextPageUrl() }}" rel="next">{{__('Next')}} »</a></li>
            @else
                <li class="disabled"><span>{{__('Next')}} »</span></li>
            @endif
        </ul>
    </div>
@endif
                            </div>
                         
                         
                            
                          
                            
                            
                            
                        </div>
                        
                    </div> 
                                 

                    <div class="col-lg-4 col-md-4">
                        <div class="sitebar-fixd" style="position: sticky; top: 0;"><!-- Fixd Siteber -->

                            
                                

                       
                            <div class="archivePopular">                        
                                <ul class="nav nav-pills" id="archivePopular-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link active"  data-bs-toggle="pill" data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent" aria-selected="false"> {{__('Latest News')}} </div>
                                    </li>
                                    
        
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab" aria-controls="archivePopulars" aria-selected="false"> {{__('Featured News')}} </div>
                                    </li>
                                      
        
                                
        
                                </ul>
                            </div>

                            <div class="tab-content" id="pills-tabContentarchive">
                                <div class="tab-pane active show  fade" id="archiveTab_recent" role="tabpanel" aria-labelledby="archiveRecent">                                                                                                   
                                    <div class="archiveTab-sibearNews">
                                        

                                                        @php
					$secondcat=DB::table('categories')->where('language_id', $default_language->id)->where('parent_id',null)->skip(1)->first();
					$secondcatpostbig=DB::table('posts')->where('category_id',$secondcat->id)->where('is_trending',1)->orderBy('id','DESC')->limit(1)->get();
					$secondcatpostsmall=DB::table('posts')->where('category_id',$secondcat->id)->where('is_trending',1)->orderBy('id','DESC')->skip(1)->limit(20)->get();
					@endphp                                                         
                                                                         
@foreach ($secondcatpostsmall as $row)	
                                    <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">
                                            </div>
                                             

                                            <h4 class="archiveTab_hadding"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}">{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}</a>
                                            
                                            </h4> 

                                            <div class="archive-conut">
                                                                                             {{ $loop->iteration }}
                                                 
                                            </div>
                                            

                                        </div>
                                                                              
@endforeach














                                         
                                        
                                     
                                    </div>
                                 
                             
                                   
                                                    
                                </div>
    
                                    
                                <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">                                            
                                    <div class="archiveTab-sibearNews">
                                        

                                        
                                                                  @php
					$thirdcat=DB::table('categories')->where('language_id', $default_language->id)->where('parent_id',null)->skip(2)->first();
					$thirdcatpostbig=DB::table('posts')->where('category_id',$thirdcat->id)->where('is_trending',1)->orderBy('id','DESC')->limit(1)->get();
					$thirdcatpostsmall=DB::table('posts')->where('category_id',$thirdcat->id)->where('is_trending',1)->orderBy('id','DESC')->skip(1)->limit(20)->get();
					@endphp                          
                                                                         
 @foreach ($thirdcatpostbig as $row)
                                    <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">
                                            </div>
                                             

                                            <h4 class="archiveTab_hadding"><a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}">{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}</a>
                                            
                                            </h4> 

                                            <div class="archive-conut">
                                                                                               {{ $loop->iteration }}
                                                 
                                            </div>
                                            

                                        </div>
                                                                              
 @endforeach 
                                    
									
                                                                            
   
                                        
                                     
                                    </div>
                              
                                  
    
                                    
                                </div>
    
                            </div>
                            
                            
                            <div class="siteber-add2">
                              {!!$gs->sidebar_ads!!}   
                                
                            </div>                           
                        
                        </div> <!-- Fixd Siteber End -->


                    </div>
                </div>
            </div>
        </div>
 
 
@endsection