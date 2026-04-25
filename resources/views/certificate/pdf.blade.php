<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <style>
        @font-face {
            font-family: 'Parisienne';
            src: url('{{ public_path("fonts/Parisienne-Regular.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
=======
    <title>Sertifikat Kelulusan - {{ $course->title }}</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f5f6f7;
            color: #0a0a23;
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
<<<<<<< HEAD

        .container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .name {
            font-family: 'Parisienne', cursive;
            font-size: 75px; 
            color: #1a202c;
            position: absolute;
            width: 100%;
            text-align: center;
            /* Nilai ini gua kurangin jadi 44% supaya posisi teks naik ke atas */
            top: 44%; 
            left: 50%;
            transform: translate(-50%, -50%);
            line-height: 1;
=======
        .container {
            width: 950px;
            height: 650px;
            margin: 35px auto;
            background-color: #ffffff;
            border: 12px solid #0a0a23;
            box-sizing: border-box;
            position: relative;
            text-align: center;
        }
        .inner {
            border: 4px solid #d0d0d5;
            margin: 10px;
            height: 598px;
            box-sizing: border-box;
        }
        .header {
            margin-top: 50px;
            font-size: 20px;
            font-weight: bold;
            color: #858591;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .title {
            margin-top: 15px;
            font-size: 44px;
            font-weight: 900;
            color: #0a0a23;
            letter-spacing: 1px;
        }
        .subtitle {
            margin-top: 40px;
            font-size: 18px;
            color: #3b3b4f;
        }
        .name {
            margin-top: 15px;
            font-size: 46px;
            font-weight: bold;
            color: #0a0a23;
            text-decoration: underline;
        }
        .course-name {
            margin-top: 30px;
            font-size: 28px;
            font-weight: bold;
            color: #1b1b32;
        }
        .footer {
            margin-top: 60px;
            display: table;
            width: 100%;
        }
        .footer-col {
            display: table-cell;
            width: 33.33%;
            vertical-align: bottom;
            text-align: center;
        }
        .signature-line {
            width: 180px;
            border-bottom: 2px solid #0a0a23;
            margin: 0 auto;
            margin-bottom: 8px;
        }
        .logo {
            font-family: monospace;
            font-weight: 900;
            font-size: 24px;
            color: #0a0a23;
            border: 3px solid #0a0a23;
            display: inline-block;
            padding: 8px 16px;
            background-color: #f5f6f7;
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
        }
    </style>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        @php
            $path = public_path('images/sertif(tanpanama).jpeg');
            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }
        @endphp

        @if(isset($base64))
            <img src="{{ $base64 }}" class="background">
        @endif
        
        <div class="name">{{ $user->name }}</div>
    </div>
</body>
</html>
=======
        <div class="inner">
            <div class="header">Sertifikat Kelulusan</div>
            <div class="title">Bakti Mahasiswa</div>
            
            <div class="subtitle">Dengan bangga kami menyatakan bahwa</div>
            <div class="name">{{ $user->name }}</div>
            
            <div class="subtitle">telah berhasil menyelesaikan dengan sangat baik seluruh materi pada kursus:</div>
            <div class="course-name">{{ $course->title }}</div>
            
            <div class="footer">
                <div class="footer-col">
                    <div style="height: 60px; display: flex; align-items: end; justify-content: center; margin-bottom: 5px;">
                        <!-- PLACEHOLDER TANDA TANGAN DIGITAL -->
                        <span style="font-family: 'Brush Script MT', 'Lucida Handwriting', 'Segoe Script', cursive; font-size: 32px; font-style: italic; color: #0a0a23;">
                            John Doe
                        </span>
                        <!-- UNTUK MENGGUNAKAN GAMBAR TTD ASLI, ganti span di atas dengan tag img seperti ini: -->
                        <!-- <img src="{{ public_path('images/ttd-instruktur.png') }}" style="height: 50px;"> -->
                    </div>
                    <div class="signature-line"></div>
                    <div style="font-weight: bold; font-size: 16px;">Instruktur Utama</div>
                </div>
                <div class="footer-col">
                    <div class="logo">/LMS_COLAB/</div>
                </div>
                <div class="footer-col">
                    <div class="signature-line"></div>
                    <div style="font-weight: bold; font-size: 16px;">Tanggal: {{ $date }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
