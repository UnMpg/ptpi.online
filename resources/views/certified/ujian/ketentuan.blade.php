@extends('layouts.certifiedUjian.app')
@section('title','tatatertib')

@section('content')

<div class="home">
    <div class="container">
        <div class="text-center head-waktu">
            <div class="counter">
                <h3 id="counter" ></h3>
            </div>
        </div>
        <div class="body-ketentuan">
            <h2 class="text-center">Tatertib Ujian</h2>

            <p>1. Waktu pengerjaan ujian selama 2 jam </p>
            <p>2. Soal ujian terdiri dari 100 Soal </p>
            <p>3. Ujian tulis dilakukan secara online dengan zoom sebagai media pengawasan. </p>
            <p>4. Peserta dapat mengerjakan ujian dengan menggunakan desktop, notebook/laptop dan iMac/macbook.  disertai fitur kamera yang berfungsi dengan baik. Penggunaan telepon genggam, tablet dan iPad tidak diperkenankan. </p>
            <p>5. Peserta tidak diperbolehkan mendokumentasikan dan menyebarluaskan soal uji kompetensi dalam bentuk apapun.</p>
            <p>6. Seluruh browser yang tidak berhubungan dengan ujian kompetensi hendaknya ditutup agar tidak mempengaruhi kecepatan internet.</p>
            <p>7. Peserta harus siap dan aktif sekurang-kurangnya 10 menit sebelum ujian dimulai.</p>
            <p>8. Peserta ujian yang terlambat lebih dari 5 menit setelah ujian dimulai tidak diperkenankan untuk mengikuti ujian dan dinyatakan tidak lulus pada ujian kompetensi.</p>
            <p>9. Selama ujian peserta diharuskan mengaktifkan kamera dan bila wajah tidak terlihat dalam frame maka peserta dianggap telah selesai ujian dan dikeluarkan dari zoom. </p>
            <p>10. Peserta dihimbau untuk tidak mengenakan perhiasan termasuk menggunakan headset</p>
            <p>11. Peserta melaksanakan uji kompetensi pada satu ruangan kosong dan tertutup. </p>
            <p>12. Latar belakang yang digunakan adalah latar belakang asli, bukan latar belakang virtual</p>
            <p>13.	Segala macam bentuk kecurangan akan menyebabkan pembatalan ujian kompetensi.</p>
            <p>14.	Peserta mengikuti instruksi pengawas untuk memulai ujian </p>
            <p>15.	Segala hal yang berkaitan dengan kendala teknis dapat memberikan instruksi kepada pengawas ujian</p>

            <p class="text-center"> Ujian akan segera dimulai Saat Countdown selesai</p>

        </div>
    </div>
</div>
    
@endsection

@section('script')

<script>
var waktu = "{!! $getDateTime !!}";

var countDownDate = new Date(waktu).getTime();
// Update the count down every 1 second

var x = setInterval(function() {
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // console.log(countDownDate);
    // console.log(now);
    // console.log(distance);
   // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="counter"11

    $("#counter").html(`${hours} : ${minutes}: ${seconds} `);
    // document.getElementById("counter").innerHTML = hours + ": " + minutes + ": " + seconds ;
    // If the count down is over, write some text 

    if (distance < 0) {
        clearInterval(x);
        $("#counter").html("EXPIRED");
        window.location.href = "{{ url('/sertifikasi/ujian/exams') }}";
        // document.getElementById("counter").innerHTML = "EXPIRED";
    }
}, 1000);


</script>
    
@endsection