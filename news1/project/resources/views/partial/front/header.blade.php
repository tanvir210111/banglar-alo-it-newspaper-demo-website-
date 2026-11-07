
	
	
	<header class="header2">
        <div class="container">
            <div class="header-border2">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="header-date2">
                            <i class="las la-map-marker"></i> {{__('Dhaka')}} <i class="lar la-calendar-minus"></i> 
                                                                                                      
<span id ="Clock"></span> | <span id="Date"></span> {{__('Bengali')}}
                                     
         @php
    $activeLangId = 1; // ডিফল্ট ইংরেজি
    if (Session::has('language')) {
        $activeLangId = Session::get('language');
    } else {
        $defaultLang = \Illuminate\Support\Facades\DB::table('languages')->where('is_default', 1)->first();
        if ($defaultLang) {
            $activeLangId = $defaultLang->id;
        }
    }
@endphp

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentLangId = "{{ $activeLangId }}";
        var isBangla = (currentLangId == 2); // আইডি ২ হলে বাংলা

        setInterval(displayTime, 1000);
        displayTime(); 

        function displayTime() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var day = date.getDay();
            var dayMonth = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();
            var session = "AM";

            // ১২ ঘণ্টার ফরম্যাট
            if(hours == 0){ hours = 12; }
            if(hours > 12){ hours = hours - 12; session = "PM"; }

            // দুই ডিজিট (যেমন: ০৯)
            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            var timeString = "";
            var dateString = "";

            if (isBangla) {
                // --- বাংলা কনভার্টার ---
                var toBn = n => n.toString().replace(/\d/g, d => "০১২৩৪৫৬৭৮৯"[d]);
                var days = ["রবিবার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার", "শনিবার"];
                var months = ["জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
                var bnSession = session === "PM" ? "পিএম" : "এএম";

                // সময়: ০১:১৭:২২ এএম
                timeString = toBn(hours) + ":" + toBn(minutes) + ":" + toBn(seconds) + " " + bnSession;
                
                // তারিখ: ১৪ পৌষ ১৪৩২ (সরাসরি কনভার্ট করা কঠিন, তাই আমরা ইংরেজি তারিখ বাংলায় দেখাব)
                // অথবা: রবিবার, ২৯ ডিসেম্বর ২০২৫
                dateString = days[day] + ", " + toBn(dayMonth) + " " + months[month] + " " + toBn(year);

            } else {
                // --- ইংরেজি ---
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                
                // Time: 01:17:22 AM
                timeString = hours + ":" + minutes + ":" + seconds + " " + session;
                
                // Date: Sunday, 29 December 2025
                dateString = days[day] + ", " + dayMonth + " " + months[month] + " " + year;
            }

            // HTML-এ ভ্যালু বসানো
            var clockEl = document.getElementById("Clock");
            var dateEl = document.getElementById("Date");

            if(clockEl) clockEl.innerText = timeString;
            if(dateEl) dateEl.innerText = dateString;
        }
    });
</script>                            
                            
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="header2-social">
						
						
						
						
					@foreach ($social_links->sortBy('id') as $social_link)
                                                                                                    <a href="{{ $social_link->link}}" target="_blank" title="{{$social_link->name}}"><i class="{{$social_link->icon}}"></i> </a>
										@endforeach															
                                                            
                        </div>
                    </div>
                </div>

            </div>

                <div class="hader2-logoBanner">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
							@php
								Session::has('language') ? $lid=Session::get('language') : $lid = (DB::table('languages')->where('is_default','=',1)->first()->id)
							@endphp
							
							@php
								$header_footer_logo = d_logo($lid);
							@endphp

                            <div class="logo2">
                              <a href="{{route('frontend.index')}}"> <img src="{{asset('assets/images/logo/'.$gs->logo)}}" alt="Songbad71"> </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="banner2">
                                      {!!$gs->horizontal_adds1!!}
                                         
                            </div>
                        </div>
                    </div>
                </div>

          
        </div>
    </header>

       

                    <!--=========ThemesBazar==============
                        Menu-section-Start
                    =============ThemesBazar=============-->           
        <div class="menu-section" id="myHeader">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 col-md-11">
                        <div class="mobile_logo">
                            <a href="{{route('frontend.index')}}"> <img src="{{asset('assets/images/logo/'.$gs->footer_logo)}}" alt="Songbad71"> </a>
                        </div>
                        <div class="stellarnav">
                            <ul>
                                @foreach ($categories as $category)
								 @if ($loop->first)
								  <li class="active"><a href="{{ route('frontend.index')}}"> <i class="las la-home"></i> {{$category->title}}</a></li>
								  @endif
								  
								  
								    
								  
                               @if ($category->child()->count() > 0)
								<li><a href="{{ route('frontend.category',$category->slug)}}" >{{$category->title}}</a>
									   <ul>
									   @foreach ($category->child as $child)
                                        <li><a href="{{ route('frontend.postBySubcategory.details',[$category->slug,$child->slug])}}" data-tab="
											#{{$child->id}}">{{$child->title}}</a></li>	
                            				@endforeach						
                                        </ul>
                                       </li>

										
					@else
					@if ($loop->first)
					@else 
										  <li><a href="{{ route('frontend.category',$category->slug)}}" >{{$category->title}}</a></li>
										
             @endif
				@endif
			@endforeach	
			
			
							

							
<li>
    <a href="#">
        <i class="las la-language"></i>
        {{__('Language')}}
    </a>
    <ul>
        @foreach ($languages as $language)
            <li>
                <a href="{{ route('front.language.change', $language->id) }}"
                   class="{{ Session::has('language') 
                        ? (Session::get('language') == $language->id ? 'active' : '') 
                        : (DB::table('languages')->where('is_default','=',1)->first()->id == $language->id ? 'active' : '') }}">
                    {{ $language->language }}
                </a>
            </li>
        @endforeach
    </ul>
</li>



	
							</ul>
							
							
							
							
							
							
							
							
                        </div><!-- .stellarnav -->
                    </div>
                    
                    <div class="col-lg-1 col-md-1">
                        <div id="wrapper">
                            <div class="menuIcon">
                            ‍<span>  </span> 
                                <div class="circle icon">
                                        
                                    </div>
                            </div>
                        </div>

                        <div class="searchIcon">
                            <i class="las la-search"></i>
                        </div>
                        
                        <form class="searchBar" method="get" action="{{ route('front.news_search') }}">
							<input type="text" name="search"  placeholder="{{__('Write Here')}}">
                            <button><input type="submit" value="{{__('Search')}}"></button>
                            
                            <div class="remove">
                                <i class="las la-times"></i>
                            </div>

                        </form>

                    </div>         
                    
                    
                </div>

            

            </div>
            
        </div>

                    <!--==========ThemesBazar=============
                        Menu-section-End
                    ==============ThemesBazar============-->