<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
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
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

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
        }
    </style>
</head>
<body>
    <div class="container">
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