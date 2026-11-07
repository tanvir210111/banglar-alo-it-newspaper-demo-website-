@extends('layouts.front')
@section('contents')
    @section('meta')
<title>{{$data->title}}</title>
<meta property="og:title" content="{{$data->title}}" />
<meta property="og:image" content="{{asset('assets/images/'.$gs->og_baner)}}" />
@endsection	
@push('css')

@endpush
		
<div class="archive-page2">
            <div class="container">


                <div class="row">   
                    <div class="col-lg-8 col-md-8">
                        <div class="rachive-info-cats">
                            <a href="/"><i class="las la-home"> </i> </a>  <i class="las la-angle-right"></i> {{$data->title}}
                        </div>

                        <div class="archivePage-content2">
                            <div class="row">
                                

                                
                                                                    

        @if ($posts->count()>0)                       
 @foreach ($posts as $post)
							   <div class="themesBazar-3 themesBazar-m2">
                                    <div class="archivePage-wrpp2">
                                        <div class="archive2-image">
                                            <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}" title="{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}">

                                             

                                        </div>
                                        <h4 class="archivePage2-title">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug])}}">{{ strlen($post->title)>100 ? mb_substr($post->title,0,100,'utf-8').'...' : $post->title}}</a>
                                        </h4>
                                        
                                        <div class="archive-meta2">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug])}}"><i class="las la-tags"> </i>  প্রকাশের তারিখঃ {{$post->createdAt()}}
  </a>
                                        </div>
                                    </div>
                                </div>
@endforeach
                               @else
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-danger text-danger text-center">{{__('This Category has no news.')}}</p>
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
                                        

                                                                                             
                                                                         
@foreach($is_trendings as $is_trending)	
                                    <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$is_trending->image_big)}}" alt="{{strlen($is_trending->title)>60 ? mb_substr($is_trending->title,0,60,"utf-8") : $is_trending->title}}" title="{{strlen($is_trending->title)>60 ? mb_substr($is_trending->title,0,60,"utf-8") : $is_trending->title}}">
                                            </div>
                                             

                                            <h4 class="archiveTab_hadding"><a href="{{ route('frontend.postBySubcategory.details',[$is_trending->category->slug,$is_trending->slug])}}"> {{strlen($is_trending->title)>60 ? mb_substr($is_trending->title,0,60,"utf-8") : $is_trending->title}} </a>
                                            
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
                                        

                                        
                                                     
                                                                         
@foreach ($is_recents as $is_recent)
                                    <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$is_recent->image_big)}}" alt="{{strlen($is_recent->title)>60 ? mb_substr($is_recent->title,0,60,"utf-8") : $is_recent->title}}" title="{{strlen($is_recent->title)>60 ? mb_substr($is_recent->title,0,60,"utf-8") : $is_recent->title}}">
                                            </div>
                                             

                                            <h4 class="archiveTab_hadding"><a href="{{route('frontend.postBySubcategory.details',[$is_recent->category->slug,$is_recent->slug])}}"> {{strlen($is_recent->title)>60 ? mb_substr($is_recent->title,0,60,"utf-8") : $is_recent->title}} </a>
                                            
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