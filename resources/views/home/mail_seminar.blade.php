<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $content = nl2br(
                "Yang terhormat Bapak/Ibu
                Terimakasih kami ucapkan karena telah mendaftarkan diri menjadi peserta pada Seminar Master Plan Rumah Sakit Seri 12:
                'Perencanaan Sarana Prasarana Radioterapi dan Nuklir'.
                Berikut kami sertakan link zoom untuk Seminar tersebut:

                Please click the link below to join the webinar:
                https://us02web.zoom.us/j/86925707142
                Webinar ID: 869 2570 7142

                Berhubung kuota zoom terbatas hanya untuk 500 peserta, kami menyediakan opsi live streaming youtube bagi Bapak/Ibu yg tidak bisa lagi masuk ke zoom webinar.
                Live streaming Youtube juga akan dipantau oleh panitia seminar PTPI, sehingga semua informasi di zoom akan disampaikan juga ke live streaming Youtube.
                Sertifikat tetap diberikan kepada semua peserta yang telah mendaftar dengan catatan mengikuti Pretest dan Post Test dan mendapatkan nilai rata-rata 45%.
                Live streaming youtube dapat diakses pada link berikut:
                bit.ly/PTPI_youtube

                Pretest akan dibuka pada hari Jumat pukul 12.00 dan akan ditutup pukul 15.00, sedangkan post test akan dibuka setelah sesi tanya jawab seminar dan ditutup pukul 19.00.
                Untuk link pretest, post test, dan angket Bapak/Ibu bisa mengakses pada link berikut:

                https://bit.ly/pretest_seminar12
                https://bit.ly/posttest_seminar12

                Salam hormat,
                Panitia Seminar PTPI"
        );
    @endphp
    <p>{!! $content !!}</p>
</body>
</html>
