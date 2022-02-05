{{-- Bagian Praktikum --}}
<?php
    $array = [1,2,3,4,5];

    $nama = 'Rafi';

    $nilai = 80;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ini Halaman beranda</h1>

    {{-- php native --}}
    <?php echo "Halo dunia" ?>

    {{-- menggunakan blade --}}
    <p>
        {{"Hello World"}}
    </p>

    @if (1+1 ==2)
    <p>
        {{"Hello World"}}
    </p>
    @endif

    <hr>

    <h1>
        Perulangan
    </h1>

    {{-- php native --}}
    <?php for($i = 0; $i < count($array); $i++) { ?>
        <p>
            {{$array[$i]}}
        </p>
    <?php } ?>

    {{-- menggunakan blade --}}
    @for($i = 0; $i < count($array); $i++)
        <p>
            {{$array[$i]}}
        </p>
    @endfor

    <hr>

    {{-- menggunakan blade --}}
    <h1>Percabangan</h1>

    @if (1+1 == 3)
        <p>
            {{"Jawaban Benar"}}
        </p>
    @else
        {{'Jawaban Salah'}}
    @endif

    @if($nama == "Raihan")
        <p>
            {{"Nama saya Raihan"}}
        </p>
    @elseif($nama == 'Rafi')
        <p>
            {{"Nama saya Rafi"}}
        </p>
    @else
        <p>
            {{"Nama saya tidak diketahui"}}
        </p>
    @endif

    <hr>

    <h1>Percabangan Switch</h1>

    @switch($nilai)
        @case(90)
            {{"Nilai anda A"}}
            @break

        @case(80)
            {{"Nilai anda B"}}
            @break

        @case(70)
            {{"Nilai anda C"}}
            @break

        @default
            {{"Nilai anda D"}}

    @endswitch
</body>
</html>
