<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Creative Design">
    @yield('meta')
		<title>{{ $gs->title }}</title>
		<!-- Meta Pixel Code -->
    <link rel="shortcut icon" href="{{asset('assets/images/'.$gs->favicon)}}" type="image/x-icon">

    <!-- Css Link Start    -->
    <!-- <link rel="stylesheet" href="assets/css/all.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/stellarnav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/gallery5.html')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/responsive.css')}}">
     <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/slick.css')}}">
     <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/all.css')}}">
	 
	
	 
	 
	 
	 
    <link rel="stylesheet" href="{{asset('assets/frontend/style.css')}}">
	@if(DB::table('languages')->where('is_default','=',1)->first()->rtl == 1)
		<link rel="stylesheet" href="{{asset('assets/front/css/rtl/style.css')}}">
	@endif
	
	{!!$gs->adsense_code!!}
    {!!$gs->search_console!!}
	{!! $seo->google_analytics !!}
	
	
	
	
	<style>
/* Poll widget */
.poll-widget { border-radius: 6px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
.poll-widget .card-header { background:#0d6efd; color:#fff; font-weight:600; }
.poll-widget .poll-question { font-size:14px; margin-bottom:8px; color:#333; }
.poll-widget .form-check { margin-bottom:6px; }
.poll-widget .form-check-label { color:#333; }
.btn-vote, .btn-voted, .view-result { font-size:13px; padding:6px 12px; border-radius:4px; }
.poll-feedback .text-danger { font-size:13px; }
.poll-results .progress { height:14px; background:#e9ecef; border-radius:8px; overflow:hidden; margin-bottom:6px; }
.poll-results .progress .progress-bar { background: linear-gradient(90deg,#007bff,#00a8ff); color:#fff; font-size:12px; line-height:14px; padding-left:8px; }
.poll-results .poll-answer-label { display:block; font-size:13px; margin-bottom:6px; color:#333; }
</style>
<style>
.custom-pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination-list {
    display: inline-flex;
    list-style: none;
    padding: 0;
    background: #f7f7f7;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
}

.pagination-list li {
    margin: 0;
}

.pagination-list li a,
.pagination-list li span {
    display: block;
    padding: 8px 15px;
    color: #222;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s;
}

.pagination-list li a:hover {
    background: #bd0202;
    color: #fff;
}

.pagination-list li.active span {
    background: #bd0202;
    color: #fff;
    font-weight: bold;
}

.pagination-list li.disabled span {
    color: #aaa;
    cursor: not-allowed;
}
</style>

	
<style> 

.menu-section {
	background: {{$gs->theme_color}};
	-webkit-box-shadow: 0 0 6px rgba(0,0,0,0.3);
	box-shadow: 0 2px 3px rgba(0,0,0,0.3);
	margin-bottom: 15px;
	position: relative;
}

.scroll3-left {
	position: absolute;
	width: auto;
	padding: 9px 20px 9px 10px;
	font-size: 17px;
	background-color: {{$gs->theme_color}};
	color: #fff;
	font-weight: 400;
	line-height: 24px;
	    z-index: 99;
}

#recentPopular-tab .nav-link.active {
	color: #fff;
	background: {{$gs->theme_color}};
	border-top: 3px solid {{$gs->footer_color}};
}

.creativeDesign_cat02 a {
	color: #fff;
	font-weight: 400;
	font-size: 18px;
	text-decoration: none;
	position: relative;
	display: inline-block;
	background: {{$gs->theme_color}};
	padding: 10px 10px;
}

.creativeDesign_cat02 > a::after {
	left: 100%;
	height: 0;
	width: 7px;
	position: absolute;
	top: 0;
	content: "";
	pointer-events: none;
	margin-left: 0;
	margin-top: 0;
	border-top: 44px solid {{$gs->theme_color}};
	border-right: 8px solid transparent;
}

.sitebar-catWrpp {
	box-shadow: 0 0 10px #efefef;
	padding: 5px;
	border: 4px solid {{$gs->theme_color}};
	margin-bottom: 13px;
	border-radius: 5px;
	background: #f6fafd;
}

.sectionNews-active .owl-dots button {
    margin: 0 2px;
    padding: 3px !important;
    transition: .8s all;
    background: {{$gs->theme_color}} !important;
    outline: inherit;
}

.live_title {
	text-align: left;
	position: relative;
	padding-left: 13px;
	background: {{$gs->theme_color}};
	margin-bottom: 3px;
	border-left: 5px solid {{$gs->footer_color}};
}

.creativeDesign_cat03 {
	background: #0335670f;
	padding: 10px 6px 12px;
	border-left: 4px solid {{$gs->footer_color}};
	margin-bottom: 10px;
	line-height: 22px;
}

.creativeDesign_facebook {
	background: #0335670f;
	padding: 10px 6px;
	font-size: 20px;
	color: #000;
	border-left: 4px solid {{$gs->footer_color}};
	margin-bottom: 10px;
	
}

.creativeDesign_cat01 {
	border-top: 2px solid {{$gs->theme_color}};
	border-bottom: 2px solid #ddd;
	padding: 9px 6px 11px;
	margin-bottom: 10px;
	line-height: 15px;
}

.section-four {
	background: {{$gs->copyright_color}};
	margin: 0 0 30px;
}

.footer-area {
	background: {{$gs->copyright_color}};
	padding: 40px 0 20px;
	margin-top: 40px;
}

.stellarnav.dark .active {
	background: {{$gs->footer_color}};
}
.stellarnav.dark li a:hover {
	background: {{$gs->footer_color}};
	color: #fff;
}

.stellarnav.dark ul ul {
	background: {{$gs->theme_color}};
}
.footer-title {
	color: #fff;
	font-size: 20px;
	padding-bottom: 11px;
	position: relative;
	border-bottom: 1px solid {{$gs->footer_color}};
	margin-bottom: 22px;
}

.footer-menu2 ul > li > a {
	display: inline-block;
	border: 1px solid {{$gs->footer_color}};
	padding: 6px 15px;
	transition: .8s all;
}
#recentPopular-tab .nav-link {
	display: block;
	color: #000D39;
	padding: 10px 10px;
	text-decoration: none;
	transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
	text-align: center;
	background: #ddd;
	border-top: 3px solid {{$gs->theme_color}};
	font-size: 17px;
	margin: 0;
}

.creativeDesign_cat03 > span > a {
	background: transparent;
	font-size: 18px;
	padding: 4px 7px;
	color: {{$gs->theme_color}};
}

.creativeDesign_cat02 > span > a {
	background:transparent;
	font-size: 18px;
	padding: 4px 7px;
	color: {{$gs->theme_color}};
}
.more_news a {
	display: inline-block;
	color: {{$gs->theme_color}};
	font-size: 15px;
	padding: 6px 20px;
	border-radius: 50px;
	font-weight: 500;
	transition: .5s all;
	margin-top: 2px;
	text-decoration: none;
}

.creativeDesign_cat01 > span > a {
	background: #F5F5F5;
	font-size: 18px;
	padding: 4px 7px;
	color: {{$gs->theme_color}};
}

</style> 











</head>


<body>
           


   

    


    <!-- Header Part-->
    @include('partial.front.header')
    <!-- Header Part End-->
   

    



  
     <!--Content of each page-->
    @yield('contents')
	<!--Content of each page end-->
                                           


                        
                            

                       
                        
                        
        
        
                
       
	<!-- Footer Area Start -->
	@include('partial.front.footer')
	<!-- Footer Area End -->














  

                                           


                        
                            

                       
                        
                        
        
        
                
       
 
             
            
          
    

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v21.0&appId=1716117305495236"></script>
        <script src="{{asset('assets/frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/stellarnav.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/jquery-ui.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/lazyload.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/frontend/assets/js/main.js')}}"></script>
		
		<script>
$(document).ready(function() {
  // ভোট সাবমিট
  $(document).on('click', '.vote-btn', function(e) {
    e.preventDefault();
    var pollId = $(this).data('id');
    var answerId = $('input[name="poll_answer_id_' + pollId + '"]:checked').val();
    var messageBox = $(this).closest('.poll-box').find('.poll-message');
    var resultBox = $(this).closest('.poll-box').find('.poll-result');
    var button = $(this);

    messageBox.html('');

    if (!answerId) {
      messageBox.html('Please select an option');
      return;
    }

    $.ajax({
      url: "{{ route('front.poll.vote') }}",
      method: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        poll_question_id: pollId,
        poll_answer_id: answerId
      },
      success: function(res) {
        if (res.status === 'success') {
          button.removeClass('btn-primary').addClass('btn-success').text('Voted').prop('disabled', true);
          $.get("{{ url('poll-result') }}/" + pollId, function(data) {
            resultBox.html(data);
          });
        } else {
          messageBox.html(res.message);
        }
      },
      error: function(xhr) {
        messageBox.html('Error submitting vote');
      }
    });
  });

  // ফলাফল দেখা
  $(document).on('click', '.view-result', function(e) {
    e.preventDefault();
    var pollId = $(this).data('id');
    var box = $(this).closest('.poll-box').find('.poll-result');
    $.get("{{ url('poll-result') }}/" + pollId, function(data) {
      box.html(data);
    });
  });
});
</script>


    </body>
</html>
