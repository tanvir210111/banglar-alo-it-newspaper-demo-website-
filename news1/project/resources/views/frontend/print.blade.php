<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>প্রিন্ট | {{ $data->title }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/'.$gs->favicon) }}" type="image/png">

    <style>
        body {
            font-family: "SolaimanLipi", Arial, sans-serif;
            background: #fff;
            color: #000;
            margin: 0 auto;
            padding: 20px;
            width: 210mm;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }

        #print-area {
            border: 5px solid red;
            padding: 20px;
        }

        .print-header {
            text-align: center;
            padding: 10px;
            border-bottom: 3px solid #006400;
        }

        .print-header img {
            width: 260px;
            margin-bottom: 8px;
        }

        .date-bar {
            background: #006400;
            color: #fff;
            padding: 6px;
            font-size: 15px;
            text-align: center;
            border-radius: 3px;
        }

        .news-title {
            font-size: 26px;
            font-weight: bold;
            margin: 20px 0 10px;
            line-height: 1.4;
            color: #222;
            text-align: justify;
        }

        .news-img {
            width: 100%;
            height: auto;
            margin: 10px 0;
            border: 1px solid #ccc;
        }

        .news-content {
            font-size: 18px;
            text-align: justify;
            column-count: 2;
            column-gap: 25px;
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            font-size: 16px;
            color: #333;
            margin-top: 30px;
            border-top: 2px solid #006400;
            padding-top: 10px;
        }

        .print-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 999;
        }

        .btn {
            text-decoration: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn.red { background: #e60000; }
        .btn.green { background: #008000; }
        .btn.blue { background: #0066cc; }
        .btn:hover { opacity: 0.8; }

        @media print {
            .print-buttons { display: none; }
        }
    </style>
</head>

<body>
    <div id="print-area">
        <div class="print-header">
            <img src="{{ asset('assets/images/logo/'.$gs->logo) }}" alt="Logo">
        </div>

        <div class="date-bar">
            প্রিন্টের তারিখ: {{ \Carbon\Carbon::now()->format('d F Y') }} |
            প্রকাশের তারিখ: {{ $data->createdAt() }}
        </div>

        <div class="news-section">
            <h2 class="news-title">{{__('News Headlines')}} : {{ $data->title }}</h2>
            <img class="news-img" src="{{ asset('assets/images/post/'.$data->image_big) }}" alt="{{ $data->title }}">
            <div class="news-content">
                {!! $data->description !!}
            </div>
        </div>

        <div class="footer">
            <strong>{{__('Footer Credite')}}</strong><br>
            <span>সকল কারিগরি সহায়তায়ঃ ক্রিয়েটিভ ডিজাইন</span>
        </div>
    </div>

    <!-- Buttons -->
    <div class="print-buttons">
        <a href="#" class="btn red" onclick="window.print()">🖨️ প্রিন্ট</a>
        <a href="#" id="downloadJPG" class="btn green">💾 JPG</a>
        <a href="#" id="downloadPDF" class="btn blue">📄 PDF</a>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        const printArea = document.getElementById("print-area");

        // JPG Download
        document.getElementById("downloadJPG").addEventListener("click", function() {
            html2canvas(printArea, {
                scale: 2,
                useCORS: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                const imageData = canvas.toDataURL("image/jpeg");
                const link = document.createElement('a');
                link.download = 'news-print.jpg';
                link.href = imageData;
                link.click();
            });
        });

        // PDF Download
        document.getElementById("downloadPDF").addEventListener("click", function() {
            html2canvas(printArea, {
                scale: 2,
                useCORS: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                const imgData = canvas.toDataURL("image/jpeg");
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');
                const width = pdf.internal.pageSize.getWidth();
                const height = (canvas.height * width) / canvas.width;
                pdf.addImage(imgData, 'JPEG', 0, 0, width, height);
                pdf.save('news-print.pdf');
            });
        });
    </script>
</body>
</html>
