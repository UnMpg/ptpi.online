@extends('layouts.certifiedUjian.app')
@section('title','ujian')

@section('content')

<div class="home">
    <div class="container">
        <div class="text-center countdown">
            <div class="counter">
                <h4 id="counter"></h4>
            </div>
        </div>
        <div class="body-ujian">
            <div class="index-soal">
                <ul class="urutan"> 
                    {{-- @for ($i = 0; $i <= count($getSoals); $i++)
                    <li class="no">{{ $getSoals[$i]->id }}</li>
                    @endfor --}}
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($getSoals as $nomor)
                        <li class="no set{{ $nomor->id }}" id="{{ $no }}" data-id="{{ $nomor->id }}" > {{ $no }}  </li>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                   
                </ul>
            </div>
            <br>
            <h5>Soal <span id="nomor-soal"></span></h5>
            <div class="soal-halaman">
                @php
                    $angka = 1;
                @endphp
                @foreach ($getSoals as $getSoal)
                <div class="pilihan noSoal{{ $angka }}" data-id="{{ $getSoal->id }}">
                    <p>{{ $getSoal->soal  }}</p>
                    
                    <div class="form-check ">
                        <input type="radio" class="opsional" id="{{ $getSoal->id }}-a" name="{{ $getSoal->id }}" value="{{ $getSoal->a }}" >
                        <label for="{{ $getSoal->a }}">{{ $getSoal->a }}</label>
                    </div>
                    <div class="form-check ">
                        <input type="radio" class="opsional" id="{{ $getSoal->id }}-b" name="{{ $getSoal->id }}" value="{{ $getSoal->b }}" >
                        <label for="{{ $getSoal->b }}">{{ $getSoal->b }}</label>
                    </div>
                    <div class="form-check ">
                        <input type="radio"  class="opsional" id="{{ $getSoal->id }}-c" name="{{ $getSoal->id }}" value="{{ $getSoal->c }}" >
                        <label for="{{ $getSoal->c }}">{{ $getSoal->c }}</label>
                    </div>
                    <div class="form-check ">
                        <input type="radio" class="opsional" id="{{ $getSoal->id }}-d" name="{{ $getSoal->id }}" value="{{ $getSoal->d }}" >
                        <label for="{{ $getSoal->d }}">{{ $getSoal->d }}</label>
                    </div>
                    {{-- <div class="form-check">
                        <input type="radio" class="opsional" id="{{ $getSoal->id }}-e" name="{{ $getSoal->id }}" value="{{ $getSoal->e }}" >
                        <label for="{{ $getSoal->e }}">{{ $getSoal->e }}</label>
                    </div> --}}
                </div>
                    @php
                        $angka++;
                    @endphp
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="text-center navigasi">
                    <a class="btn btn-primary" id="prev">Prev</a>
                    <a class="btn btn-success" id="next">Next</a>
                    <a class="btn btn-success" id="submit" href="{{ action('CertifiedUjianController@selesaiUjian') }}" style="display: none">Selesai Ujian</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')


<script>
    // location.reload(); 
    var waktu = "{!! $countdown !!}";
    const soal = {!! $getSoals !!};

    // console.log(soal);

    // let getSoals = "{!! $getSoals !!}";

    // console.log(getSoals);

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
        // window.location.href = url; 
        window.location.href = "{{ url('/sertifikasi/ujian/selesai-ujian') }}";
        // document.getElementById("counter").innerHTML = "EXPIRED";
    }
}, 1000);

let idJawaban = 1;
console.log(idJawaban);
$("#nomor-soal").html(idJawaban);
$(".soal-halaman .pilihan").each(function(e) {
        $(this).hide();
        $(`.noSoal${idJawaban}`).show();
    });


$("#next").click(function(){
    idJawaban = idJawaban + 1;
    if (idJawaban < soal.length) {
        
        console.log(idJawaban);
        $(".pilihan").each(function(e) {
            $(this).hide();
            if ($(`#${idJawaban}`).hasClass("terisi")) {
                console.log();
            }else{
                $(`#${idJawaban}`).addClass("belum");
            }
            $(`.noSoal${idJawaban}`).show();
            $("#nomor-soal").html(idJawaban);
        });
    }else{
        $("#submit").show();
        // $(this).html("Selesai Ujian");
        // $(this).attr("href","{{ url('/sertifikasi/ujian/selesai-ujian') }}");
        console.log("tidak lebih");
    }
    
});

$("#prev").click(function(){
    // idJawaban = idJawaban - 1;
    // console.log(idJawaban);
    if (idJawaban <= 1) {
        console.log("terlebih");
    }else{
        idJawaban = idJawaban - 1;
    }
    $(".pilihan").each(function(e) {
        $(this).hide();
        $(`.noSoal${idJawaban}`).show();
        $("#nomor-soal").html(idJawaban);
    });
});

$(".no").click(function(){
    console.log($(this).attr("id"));
    idJawaban = parseInt($(this).attr("id"));
    $(".pilihan").each(function(e) {
        $(this).hide();
        $(`.noSoal${idJawaban}`).show();
        $("#nomor-soal").html(idJawaban);
    });
})



// $(document).ready(function (){
//     $(".soal-halaman .pilihan").each(function(e) {
//         if (e != 0)
//             $(this).hide();
//             // console.log($(this).attr("data-id"));
//     });

//     $("#next").click(function(){
        
//         if ($(".soal-halaman .pilihan:visible").next().length != 0){
//             $(".soal-halaman .pilihan:visible").next().show().prev().hide();
//             var id_in = $(".soal-halaman .pilihan:visible").attr("data-id");
//             // console.log(id_in);
//             $(`#${id_in}`).addClass("belum");
//         }else {
//             $(".soal-halaman .pilihan:visible").hide();
//             $(".soal-halaman .pilihan:first").show();
//             // $(".soal-halaman .pilihan:visible").attr("id").addClass("belum");
//             console.log("next 2");
//         }
//         return false;
//     });

//     $("#prev").click(function(){
//         if ($(".soal-halaman .pilihan:visible").prev().length != 0){
//             $(".soal-halaman .pilihan:visible").prev().show().next().hide();
//         }else {
//             $(".soal-halaman .pilihan:visible").hide();
//             $(".soal-halaman .pilihan:last").show();
//         }
//         return false;
//     });

// });


$(".opsional").click(function(){
    const soal_id = $(this).attr("name");
    const jawaban = $(this).val();
    $(`#${idJawaban}`).removeClass("belum");
    $(`#${idJawaban}`).addClass("terisi");
    // console.log(soal_id,jawaban,key);
    $.ajax({
        url : "{{ url('/sertifikasi/ujian/simpan-jawaban') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "soal_id" : soal_id,
            "jawaban" : jawaban
             },
        type : 'POST',
        dataType : 'json',
        success : function(result){

            console.log("===== " + result + " =====");

        }
    });
});

const SudahDiJawab = {!! $jawaban !!};

// console.log(SudahDiJawab);

if(SudahDiJawab.length == 0){
    console.log("kosong");
}else{
    if(soal.length == SudahDiJawab.length){
        $("#submit").show();
    }
    SudahDiJawab.forEach(element => {
        console.log(element.soal_id);
        // console.log($(`#${element.soal_id}-a`).val());
        if($(`#${element.soal_id}-a`).val() == element.jawaban){
            $(`#${element.soal_id}-a`).attr('checked', true);
            // console.log("a");
        }else if($(`#${element.soal_id}-b`).val() == element.jawaban){
            $(`#${element.soal_id}-b`).attr('checked', true);
            // console.log("b");
        }else if($(`#${element.soal_id}-c`).val() == element.jawaban){
            $(`#${element.soal_id}-c`).attr('checked', true);
            // console.log("c");
        }else if($(`#${element.soal_id}-d`).val() == element.jawaban){
            $(`#${element.soal_id}-d`).attr('checked', true);
            // console.log("d");
        }else{
            console.log("tidak ada");
        }

        $(`.set${element.soal_id}`).addClass("terisi")
    });
}

</script>
    
@endsection