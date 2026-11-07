                   <!--=======================
                        creativeDesign_Footer_section_Start
                    ==========================-->    

                            
            <footer class="footer-area">
                <div class="container">
                    <div class="footerMenu-content">
                        

                          
                        <div class="footerMenu-wrpp">
                            <ul>
							
							 @foreach ($categories as $category)
                                                                <li><a href="{{ route('frontend.category',$category->slug)}}" > {{$category->title}} </a></li>
																@endforeach 
																
                                                                 <li><a href="{{ URL::to('/reporter') }}" > {{__('Our Reporters')}} </a></li>
																 <li><a href="{{ URL::to('/photo') }}" > {{__('Photo Gallery')}} </a></li>
                                  

                            </ul>                    
                                         
                    </div>

                      

                         
                    <div class="editorial_content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                                                <h3 class="footer-title">
                                {{__('Editorial')}} :
                                </h3>
                                                                <div class="footer-contentLeft">
                                    <p align="left">{{__('Editor and Publisher')}} : {{__('Sompadok & Prokasok')}}</p><p align="left">{{__('Executive Editor')}} : {{__('Nirbahi Sompadok')}}<br></p><p align="left">{{__('Message editor')}} : {{__('Barta Sompadok')}}</p><p align="left"><br></p>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-4">
                                                                <h3 class="footer-title">
                                {{__('Office')}} :
                                </h3>
                                                                <div class="footer-contentRight">
                                    <p align="left">{{__('Office')}} : {{__('Office Address')}}</p><p align="left">{{__('Email')}} : {{ $gs->email }}</p><p align="left">{{__('Mob')}} : {{__('Mobile Number')}}<br></p>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-4">                        
                            
                                                                <h3 class="footer-title">
                                    {{__('Footer Menu')}}
                                </h3>
                                                                <div class="footer-menu2">
                                    <ul>
									
									
									
                                    @if (!auth()->user())																				
                                    <li><a href="{{ route('front.LogReg') }}" >{{__('Login')}}</a></li>     
                                     @endif
									@if (auth()->user())
									     @php
											 $data = auth()->user();
										 @endphp									 
                                       <li><a href="{{ route('user.dashboard') }}" >{{__('Reporter Dashboard')}}</a></li>
                                     @endif	
					@php
    // বর্তমান ল্যাঙ্গুয়েজ আইডি বের করছি
    $lid = Session::has('language') 
        ? Session::get('language') 
        : DB::table('languages')->where('is_default', 1)->first()->id;

    // Footer পেজগুলো নিচ্ছি বর্তমান ল্যাঙ্গুয়েজ অনুযায়ী
    $footer_menus = \App\Models\Page::where('placement', 'footer')
                    ->where('status', 1)
                    ->where('language_id', $lid)
                    ->get();
@endphp

<ul class="footer-menu">
    @foreach ($footer_menus as $menu)
        <li>
            <a href="{{ route('dynamic.page', $menu->slug) }}">
                {{ $menu->title }}
            </a>
        </li>
    @endforeach
</ul>
                                                 
                                                                
                                </ul>                
                                
                            </div>
    
    
    
    
                        </div>
                        <div class="copy_right_section">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="copy-right">
                                         <a href="https://banglaraloit.tech/" target="_blank" style="color: inherit; text-decoration: none;">{{__('Footer Credite')}}</a>
                                    </div>
                                </div>
                              <div class="col-lg-6 col-md-6">
    <div class="design-developed d-flex align-items-center justify-content-center justify-content-md-end">
        
        <span class="tech-text">সকল কারিগরী সহযোগিতায়:</span>
        
        <a href="https://banglaraloit.tech/" target="_blank" title="Banglar Alo IT" class="developer-link d-flex align-items-center"> 
            <span class="company-name">Banglar Alo IT</span>
        </a>

    </div>
</div>


<style>
    /* মেইন কন্টেইনার */
    .design-developed {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        /* কোনো এক্সট্রা ফন্ট ফ্যামিলি দেওয়া হয়নি, আপনার সাইটের ফন্টই পাবে */
    }

    /* "সকল কারিগরী সহযোগিতায়" টেক্সট ডিজাইন */
    .tech-text {
        color: #ffffff;      /* সাদা কালার */
        font-size: 17px;     /* ফন্ট সাইজ বাড়ানো হয়েছে */
        font-weight: bold;   /* মোটা করা হয়েছে */
        margin-right: 8px;   /* ডানপাশে গ্যাপ */
        white-space: nowrap; 
    }

    /* লিংকের ডিজাইন */
    .developer-link {
        text-decoration: none !important;
        display: flex;
        align-items: center;
    }

    /* লোগো আইকন */
    .tech-icon {
        width: 32px;         /* আইকনের সাইজ একটু বাড়ানো হয়েছে */
        height: auto;
        margin-right: 8px;   
        vertical-align: middle;
    }

    /* "ক্রিয়েটিভ ডিজাইন" নাম ডিজাইন */
    .company-name {
        color: #ffffff !important; /* সাদা কালার */
        font-size: 19px;     /* নামের সাইজ আরও একটু বড় করা হয়েছে */
        font-weight: bold;   /* মোটা করা হয়েছে */
        white-space: nowrap;
    }

    /* হোভার করলে কালার চেঞ্জ */
    .developer-link:hover .company-name {
        color: #ffc107 !important; /* হলুদ কালার */
    }

    /* -------- রেসপনসিভ (মোবাইল ভিউ) -------- */
    @media (max-width: 768px) {
        .design-developed {
            justify-content: center !important; /* মোবাইলে মাঝখানে */
            margin-top: 15px;
        }
        
        /* মোবাইলে সাইজ সামান্য অ্যাডজাস্টমেন্ট (চাইলে বাড়াতে/কমাতে পারেন) */
        .tech-text {
            font-size: 16px; 
        }
        .company-name {
            font-size: 18px;
        }
    }
</style>
                            </div>
                        </div>
                        <a href="#" class="scrollToTop"><i class="las la-long-arrow-alt-up"></i></a>
    
                        </div>
                    </div>  
            </footer>     
                                        
    
            
            @if($gs->is_notice== 1)
<div class="footer-scrool">
    <div class="footer-scrool-1">
        <span> {{__('Notice')}} </span>
    </div>
    <div class="footer-scrool-2">
        <marquee direction="left" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
            <a href="https://banglaraloit.tech/" target="_blank">
                <i class="lar la-dot-circle"></i> {{ $gs->notice_text }}
            </a>
        </marquee>
    </div>
</div>
@endif