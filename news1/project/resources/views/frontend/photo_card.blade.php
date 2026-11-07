<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="Creative Design Photocard - Create your automatic photocard online. ফটোকার্ড তৈরি করুন সহজভাবে অটোমেটিক।">
  <meta name="keywords" content="Creative Design, Creative Design, Photocard, Photocard ফটোকার্ড, অটোমেটিক ফটোকার্ড, Automatic Photocard">
  <meta name="author" content="Creative Design">

  <!-- Favicons -->
  <link href="{{ asset('assets/images/'.$gs->favicon) }}" rel="icon">
  <link href="{{ asset('assets/images/'.$gs->favicon) }}" rel="apple-touch-icon">

        <meta name="theme-color" content="#c20000" />
      <meta name="msapplication-navbutton-color" content="#c20000">
      <meta name="apple-mobile-web-app-status-bar-style" content="#c20000">
       <link href="{{asset('assets/frontend/photocard/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>ফটো কার্ড | {{ $data->title }}</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&amp;display=swap');
         body{
           background: #07263b;
         }
         .font-control{
           background-color: #0b3049;
         }
         #creativedesignbdPhotocard {
             width: 360px;
             min-height: 360px;
             font-family: "Noto Serif Bengali", serif;
             position: relative;
             background-color: white;
             overflow: hidden;
         }
         #creativedesignbdPhotocard { 
    min-height: 357px !important; 
}     
:root {
           --primary-color: #fff200;
           --secondary-color: #fff;
         }
        .creativedesignbd-photo-card {
            width: 360px; 
            font-family: "Noto Serif Bengali", serif;
            position: relative;
        } 
.creativedesignbd-photo-card .creativedesignbd-meta {
    font-size: 10px;
    font-weight: bold;
    position: absolute;
    top: 2px;
    left: 8px;
    color: white;
    z-index: 33;
}
.creativedesignbd-pc-logo {
    z-index: 99;
    position: absolute;
    top: 166px;
    left: 158px;
    height: 39px;
}
         .creativedesignbd-photo-card .creativedesignbd-meta .tt_category {
             font-weight: bold;
         }
        .creativedesignbd-photo-card .creativedesignbd-pc-photo img {
            width: 100%;
            object-fit: cover;
            margin: auto;
            position: absolute;
            height: 200px;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .creativedesign-news-heading {
            position: absolute;
            top: 205px;
            left: 0;
            width: 100%;
            z-index: 9999; 
        }
            .creativedesignbd-photo-card .creativedesign-news-heading h2 {
                font-weight: 800;
                font-size: 20px;
                line-height: 28px;
                text-align: center;
                padding: 0 10px;
                margin-top: 5px;
                height: 62px;
                color: var(--secondary-color);
                align-content: center;
                overflow: hidden;
                cursor: pointer;
            }
         .controller-photocard {
             width:100%;
             max-width:400px;
             margin:10px auto ;
         }
         .creativedesignbd-photo-card .highlight {
           color:  var(--primary-color);
         }
         .creativedesignbd-photo-card .vc-button {
             background:  var(--primary-color);
             width: 116px;
             display: inline-block;
             font-size: 14px;
             color: white;
             text-align: center;
             border-radius: 38px;
         }
         .creativedesignbd-photo-card .vc-element {
             display: inline-block;
             height: 13px;
             width: 13px;
             background: var(--primary-color);
             border-radius: 100%;
         }
         .creativedesignbd-photo-card .vc-element-2 {
             display: inline-block;
             height: 8px;
             width: 8px;
             background:  var(--primary-color);
             border-radius: 100%;
         }
         .creativedesignbd-photo-card .creativedesignbd-view-comment {
             display: flex;
             justify-content: center;
             align-items: center;
             gap: 8px;
             margin-top: 10px;
         }
.ads {
    position: absolute;
    top: 324px;
    left: 0;
    width: 100%;
    z-index: 9999;
}
        .creativedesignbd-web-address {
            text-align: center;
            font-family: Calibri;
            font-size: 10px;
            font-weight: 400;
            color: #383838;
            letter-spacing: 1px;
            margin-top: 9px;
        }
.card-bg {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 3;
}     </style>
  </head>
  <body>
      <script src="https://bangla.plus/scripts/bangladatetoday.min.js"></script>
<script>dateToday('date-today', 'bangla');</script>
           
<script>
                        setInterval(displayTime, 1000);

function displayTime() {

    const timeNow = new Date();

    let hoursOfDay = timeNow.getHours();
    let minutes = timeNow.getMinutes();
    let seconds = timeNow.getSeconds();
    let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
    let today = weekDay[timeNow.getDay()];
    let months = timeNow.toLocaleString("default", {
        month: "long"
    });
    let year = timeNow.getFullYear();
    let period = "AM";

    if (hoursOfDay > 12) {
        hoursOfDay-= 12;
        period = "PM";
    }

    if (hoursOfDay === 0) {
        hoursOfDay = 12;
        period = "AM";
    }

    hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;

   document.getElementById('Clock').innerHTML = time ;
    
    var chars = {'1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯','0':'০','A':'এ','P':'পি','M':'এম'};
    let str = document.getElementById("Clock").innerHTML; 
    let res = str.replace(/[1234567890AMP]/g, m => chars[m]);
    document.getElementById("Clock").innerHTML = res;

}
displayTime();

                        </script>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
         
          <div class="overflow-auto">
            <div id="creativedesignbdPhotocard" class="m-auto creativedesignbd-photo-card"><div class="card-bg">
    <img class="w-100" src="{{asset('assets/images/logo/'.$gs->photo_card)}}" alt="Featured Image">
</div>
<div class="card-content">
    <div class="creativedesignbd-pcard-header">
        <span class="creativedesignbd-meta"> {{$data->category->title}} |ঢাকা <span id ="Clock" onload="displayTime()"></span> </span>
    </div>  
    <img class="creativedesignbd-pc-logo" src="{{asset('assets/images/logo/'.$gs->photo_card_logo)}}" alt="Logo"> 
    <div class="creativedesignbd-pc-photo text-center">
        <img src="{{ asset('assets/images/post/'.$data->image_big) }}" alt="Featured Image">
    </div> 
    <div class="creativedesign-news-heading">
        <h2 id="clickable-heading">{{ $data->title }}</h2>
    </div>  
    <div class="ads">
      <!-- Your Ads Link -->
      <img src="{{asset('assets/images/logo/'.$gs->photo_card_ads)}}" class="w-100">
    </div>
</div>  

</div>
          </div>
          
          <!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>Responsive Marquee</title>
<style>
  .marquee-container {
    width: 100%;
    overflow: hidden;
    background-color: #cc0000;
    border: 1px solid #cc3300;
    font-weight: bold;
    position: relative;
    box-sizing: border-box;
  }

  .marquee-text {
    display: inline-block;
    white-space: nowrap;
    padding-left: 100%;
    animation: marquee 10s linear infinite;
    color: #ffffff;
    font-size: 18px;
  }

  @keyframes marquee {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-100%); }
  }

  /* Responsive font size */
  @media (max-width: 600px) {
    .marquee-text {
      font-size: 16px;
    }
  }
</style>
</head>
<body>

<div class="marquee-container">
  <div class="marquee-text">⚠️ ফটোকার্ড টি Download করুন এবং আমাদের লিংক সহ আপনার ফেসবুক ও অন্যান্য সোশ্যাল মিডিয়া শেয়ার করুন⚠️ </div>
</div>

</body>

</html>

          
          <div class="font-control p-4 rounded-3  px-4 py-3 mt-3">
              
<p id="blinkText" style="color:#fff200; font-size:15px; font-weight:bold; text-align:center; margin:0px 0;">
    লেখার উপরে ক্লিক করলে কালার হবে!</p>

<script>
setInterval(function(){
    var blink = document.getElementById('blinkText');
    blink.style.visibility = (blink.style.visibility == 'hidden' ? '' : 'hidden');
}, 500); // প্রতি 0.5 সেকেন্ডে blink হবে
</script>

            <div class=" ">
              <label for="creativedesignbdAdjstFontSize" class="form-label text-white">লেখার সাইজ কমান বাড়ান</label>
              <input type="range" class="form-range" id="creativedesignbdAdjstFontSize" min="16" max="50" value="28">
            </div>
            <div class="mb-3">
              <label for="creativedesignbdAdjstLineHeight" class="form-label text-white">লাইনের উচ্চতা কমান বাড়ান</label>
              <input type="range" class="form-range" id="creativedesignbdAdjstLineHeight" min="20" max="60" value="37">
            </div>
            <div class="row">
                <div class="col-6">
                    <a  href="{{ URL::to($data->id.'/'.$data->slug)}}" class="text-white btn btn-secondary w-100 btn-sm" >পোষ্টটি দেখুন</a>
                </div>
                <div class="col-6">
                    <button onclick="captureAndDownload()" class="w-100 btn-sm btn btn-info" id="dw_bt">ডাউনলোড করুন</button>
                </div>
            </div>
          </div>
          <div class="mt-2 text-center text-white mb-3">
            <small style="color:#137bc2">{{__('Footer Credite')}} </small>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        // Highlight individual words on click
        const heading = document.getElementById("clickable-heading");
        const words = heading.textContent.split(" ");
        heading.innerHTML = words.map(word => `<span>${word}</span>`).join(" ");

        const spans = heading.querySelectorAll("span");
        spans.forEach(span => {
            span.addEventListener("click", () => {
                span.classList.toggle("highlight");
            });
        });

        // Adjust font size and line height of heading using sliders
        document.addEventListener("DOMContentLoaded", () => {
            const fontSizeSlider = document.getElementById("creativedesignbdAdjstFontSize");
            const lineHeightSlider = document.getElementById("creativedesignbdAdjstLineHeight");

            fontSizeSlider.addEventListener("input", () => {
                heading.style.fontSize = `${fontSizeSlider.value}px`;
            });

            lineHeightSlider.addEventListener("input", () => {
                heading.style.lineHeight = `${lineHeightSlider.value}px`;
            });
        });

        // Capture and download an element as an image
        async function captureAndDownload() {
            const element = document.getElementById("creativedesignbdPhotocard");
            element.style.pointerEvents = "none";

            // Convert all images to Base64 first
            const images = element.getElementsByTagName("img");

            await Promise.all(Array.from(images).map(async (img) => {
                if (!img.src.startsWith("data:")) { // skip if already Base64
                    const response = await fetch(img.src);
                    const blob = await response.blob();
                    const reader = new FileReader();
                    await new Promise(resolve => {
                        reader.onloadend = () => { img.src = reader.result; resolve(); };
                        reader.readAsDataURL(blob);
                    });
                }
            }));

            // Ensure all images are loaded (after replacement)
            await Promise.all(Array.from(images).map(img =>
                img.complete ? Promise.resolve() : new Promise(resolve => { img.onload = resolve; })
            ));

            element.style.pointerEvents = "";

            // Capture with html2canvas
            html2canvas(element, {
                backgroundColor: "transparent",
                scale: 3
            }).then(canvas => {
                const imageData = canvas.toDataURL("image/png");
                const downloadLink = document.createElement("a");
                downloadLink.href = imageData;
                downloadLink.download = "photocard_{{ $data->slug }}.png";
                downloadLink.click();
            });
        }

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{asset('assets/frontend/photocard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script
  </body>
</html>
