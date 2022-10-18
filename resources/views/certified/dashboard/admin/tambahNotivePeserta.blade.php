@extends('layouts.certifiedDashboard.app')
@section('title-page', 'Add Notive Perserta')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="mb-4">List Peserta Sertifikasi </h2>
                    
                        {{-- <select name="status" id="status" class="custom-select jenis_notive" id="inputGroupSelect02">
                            <option selected value="">Choose...</option>
                            <option value="1">Register</option>
                            <option value="2">Melengkapi Data</option>                            
                            <option value="3">Upload FIle</option>
                            <option value="4">Hasil Verifikasi</option>
                            <option value="5">Upload Bukti</option>
                            <option value="6">Memilih Jadwal Ujian</option>
                            <option value="7">Jadwal Ujian Terkonfirmasi</option>
                            <option value="8">Ujian Tulis</option>
                            <option value="10">Verifikasi Ujian Tulis</option>
                            <option value="11">Memilih Jadwal Wawancara</option>
                            <option value="12">Jadwal Wawancara Terkonfirmasi</option>
                            <option value="13">Wawancara</option>
                            <option value="14">Hasil Wawancara Terinput</option>
                            <option value="15">Hasil Sertifikasi</option>

                        </select> --}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>status peserta</th>
                                <th>notive</th>
                                <th class="text-center">Tambah Notive</th>
                            </tr>
                        </thead>
                        <tbody id="data-list">
                            @foreach ($datacertified as $datacertifi)
                            <tr id="aa">
                                <td>{{ $datacertifi->nama }}</td>
                                <td>{{ $datacertifi->email }}</td>
                                <td>{{ $datacertifi->telp }}</td>
                                <td class="status" data-id="{{ $datacertifi->certified_status }}" ></td>
                                <td>
                                    @php
                                        $angka = 1;
                                    @endphp
                                    @foreach ($notive as $item)
                                        @if ($item->certified_member_id == $datacertifi->id)

                                            {{ $angka }}.  {{ $item->title }} 
                                            @php
                                                $angka++;
                                            @endphp
                                            <br>   
                                        @endif    
                                        
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary tambah-notive" data-id="{{ $datacertifi->id }}" data-status="{{ $datacertifi->certified_status }}" data-toggle="modal" data-target=".bd-example-modal-lg"> Tambah Notive</button>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                 
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Notive</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ action('CertifiedMemberController@insertNotive') }}" method="POST" id="notive">
                    @csrf
                    
                    <input type="text" name="id" id="idUser"  hidden/>
                    <input type="text" name="status" id="status" hidden/>
                    <div class="form-group row">
                        <label for="Notif" class="col-sm-3 col-form-label">Jenis Notifikasi</label>
                        <div class="col-sm-9">
                            <select name="kategori" class="custom-select add_notive" id="inputGroupSelect02">
                                                                
                                
                            </select>
                        </div>
                    </div>
                    <div class="add-form">
                        
                    </div>
                    <div class="form-group row">
                        <label for="Title" class="col-sm-3 col-form-label">Judul Notif</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control title_notive" id="title" placeholder="Title">
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input class="btn btn-primary btn-sm"  id="generate" value="Aksi" style="cursor: pointer" />
                        </div>
                    </div>
                        {{-- Text Editor Notive --}}
                        <div id="editor" style="min-height: 8rem">
                        
                        </div>
                        <textarea name="body" id="inputbody" cols="30" rows="10" style="display: none"></textarea>
    
                    <div class="form-grup row mt-4">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-3 text-end">
                            <input class="btn btn-primary btn-sm" type="submit" value="Tambah" />
                        </div>    
                    </div> 
                        
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    let id;
    let status;
    function indexStatus(noStatus){
        var index;
        if (noStatus == 1) {
            index ="Register";
        }else if(noStatus == 2){
            index ="Melengkapi Data";
        }else if(noStatus == 3){
            index ="Upload FIle";
        }else if(noStatus == 4){
            index ="Hasil Verifikasi";
        }else if(noStatus == 5){
            index ="Upload Bukti";
        }
        else if(noStatus == 6){
            index ="Memilih Jadwal Ujian";
        }
        else if(noStatus == 7){
            index ="Jadwal Ujian Terkonfirmasi";
        }
        else if(noStatus == 8){
            index ="Ujian Tulis";
        }
        else if(noStatus == 9){
            index ="Verifikasi Ujian Tulis";
        }
        else if(noStatus == 10){
            index ="Memilih Jadwal Wawancara";
        }
        else if(noStatus == 11){
            index ="Jadwal Wawancara Terkonfirmasi";
        }
        else if(noStatus == 12){
            index ="Wawancara";
        }
        else if(noStatus == 13){
            index ="Hasil Wawancara Terinput";
        }else if(noStatus == 14){
            index ="Hasil Sertifikasi";
        }else{
            index = "tidak ada";
        }
                                  
        return index;        
    }
    $(document).ready(function(){
    
        $(".status").each(function(){
            // console.log($(this).attr("data-id"));
            $(this).html(indexStatus($(this).attr("data-id")))
        });
    });

    $(".tambah-notive").click(function(){
        id = $(this).attr("data-id");
        status = $(this).attr("data-status");
        $(".add-form").empty();
        $("input[name='id']").val(id);
        $("input[name='status']").val(status);
        $('.title_notive').attr('value','');
        $(".ql-editor").html("");

        if(status >= 10 && status <12){
            $("#inputGroupSelect02").empty();
            var select = `
                <option selected value="">Choose...</option>                
                <option value="lulus_ujian">Pengumuman Lulus Ujian Tulis</option>
                <option value="tidak_lulus_ujian">Pengumuman Tidak Lulus Ujian Tulis</option> 
                <option value="jadwal_wawancara">Pilihan Jadwal Wawancara</option>                                                  
            `;
            $("#inputGroupSelect02").append(select);
        }else if(status >= 9){
            $("#inputGroupSelect02").empty();
            var select = `
                <option selected value="">Choose...</option>                
                <option value="lulus_ujian">Pengumuman Lulus Ujian Tulis</option>
                <option value="tidak_lulus_ujian">Pengumuman Tidak Lulus Ujian Tulis</option>                                                    
            `;
            $("#inputGroupSelect02").append(select);
        }else if(status >= 5){
            $("#inputGroupSelect02").empty();
            var select = `
                <option selected value="">Choose...</option>
                <option value="lulus_verifikasi">Pemberitahuan Lulus Verifikasi Dokumen</option>
                <option value="tidak_lulus_verifikasi">Pemberitahuan Tidak Lulus Verifikasi Dokumen</option> 
                <option value="konfirmasi_ujian">Pilihan Jadwal Ujian Tulis</option>                                                 
            `;
            $("#inputGroupSelect02").append(select);
        }else if(status >= 4) {
            $("#inputGroupSelect02").empty();
            var select = `
                <option selected value="">Choose...</option>
                <option value="lulus_verifikasi">Pemberitahuan Lulus Verifikasi Dokumen</option>
                <option value="tidak_lulus_verifikasi">Pemberitahuan Tidak Lulus Verifikasi Dokumen</option>                                                    
            `;
            $("#inputGroupSelect02").append(select);
        }else{
            $("#inputGroupSelect02").empty();
            console.log("tidak ada");
        }
        
    })
    

    
    $('#status').change(function(){
        var statuses = $(this).find(":selected").val();
        // console.log(status);
        $.ajax({
            data : {
                "_token" : `{{ csrf_token() }}`,
                "status" :statuses
            },
            type: "POST",
            url: `{{ url('/sertifikasi/get-status-peserta-notive') }}`,
            async: false,
            success: function (response) {
                // console.log(response);
                $('#data-list').empty();
                response.forEach(element => {
                    id = element.id;
                    // console.log(id);
                    var status_ = indexStatus(element.certified_status);
                    var list = `
                    <tr>
                        <td>${element.nama}</td>
                        <td>${element.email}</td>
                        <td>${element.telp}</td>
                        <td>${status_}</td>
                        <td>aaa</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-id="${element.id}" data-status="${element.certified_status}" data-toggle="modal" data-target=".bd-example-modal-lg"> Tambah Notive</button>
                            
                        </td>
                    </tr>
                    `;
                    $('#data-list').append(list);
                });
            // You will get response from your PHP page (what you echo or print)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        }).responseText;
       
        
    })

    let options=[
        ["bold","italic","underline","strike"],
        [{header:[1,2,3,4,5,6,false]}],
        [{list:"ordered"},{list:"bullet"}],
        [{script:"sub"},{script:"super"}],
        [{indent:"+1"},{indent:"-1"}],
        [{align:[]}],
        [{size:["small","large","huge",false]}],
        ["image","link","video",'formula'],
    ]
    console.log("nama saya");
    var quill = new Quill('#editor', {
        modules:{
            toolbar : options,
        },
        theme: 'snow'
    });

    // console.log($("#editor").children().html());

    $("#notive").on("submit",function(){
        $("#inputbody").val($("#editor .ql-editor").html());
    })
    let data = {!! $datacertified !!};
    console.log(data);
    let jenisNotifikasi = "";
    let pilihanTanggal1 ;
    let pilihanTanggal2 ;
    let pilihanTanggal3 ;
    let jenis;
    let hasil_data;
    let lulus_verifikasi;
    let tidak_lulus_verifikasi;
    let konfirmasi_ujian;
    let lulus_ujian;
    let tidak_lulus_ujian;
    
    $('.add_notive').change(function(){
        console.log($(this).val());
        jenis = $(this).val(); 
        data.forEach(element => {
        if (element.id == id) {
            hasil_data = element.nama;
                console.log(hasil_data);
            }
        });
        lulus_verifikasi = `<p>Kepada Yth, <strong> ${hasil_data}</strong></p><p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Selamat anda dinyatakan <strong><em>LULUS</em></strong> tahapan verifikasi dengan potensi level teknik pelayanan kesehatan <strong><em>MUDA</em></strong>.</p><p>Selanjutnya dimohon mengunduh invoice pembayaran pada link berikut : <a href="Invoice Pembayaran" target="_blank">Invoice Pembayaran</a></p><p>Informasi lebih lanjut dapat menghubungi kami di Siti 081295994863 </p><p>Sekian, terimakasih.</p>`;
        tidak_lulus_verifikasi =`<p>Kepada Yth, <strong> ${hasil_data}</strong></p><p>Berdasarkan hasil verifikasi dokumen/berkas yang diajukan, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        konfirmasi_ujian = `<p>Kepada Yth,  <strong> ${hasil_data}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><ol><li id="pil1" class="pil1">${pilihanTanggal1}<br></li><li>${pilihanTanggal2}<br></li><li>${pilihanTanggal3}<br></li></ol><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        lulus_ujian = `<p>Kepada Yth, <strong> ${hasil_data}</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis. Selamat anda dinyatakan <strong><em>Lulus</em></strong> ke tahap selanjutnya yaitu <strong><em>Wawancara</em></strong>, Detail hasil uji tulis sebagai berikut:</p><p>		Media uji tulis	: Online/offline</p><p>		Nilai Uji tulis		: Nilai</p><p>Selanjutnya dimohon melakukan kofirmasi jadwal uji wawancara pada link berikut: <a href="https://www.iahe.or.id/" target="_blank"><strong><em>Jadwal Wawancara</em></strong></a></p><p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p><p>Sekian, terimakasih.</p>`;
        tidak_lulus_ujian = `<p>Kepada Yth, <strong> ${hasil_data}</strong></p><p>Berdasarkan hasil uji kompetensi yaitu uji tulis, Mohon maaf anda dinyatakan <strong><em>BELUM LULUS</em></strong> untuk memenuhi kriteria untuk ke tahapan selanjutnya. </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti : 081295994863 </p><p>Sekian, terimakasih.</p>`;
    
        if (jenis == 'lulus_verifikasi') {
            $('.title_notive').attr('value','LULUS Verifikasi');
            $(".isi-form").remove();
            jenisNotifikasi = lulus_verifikasi;
            // $(".ql-editor").html(lulus_verifikasi);
        }else if (jenis == 'tidak_lulus_verifikasi') {
            $('.title_notive').attr('value','Tidak LULUS Verifikasi');
            $(".isi-form").remove();
            jenisNotifikasi = tidak_lulus_verifikasi;
            // $(".ql-editor").html(tidak_lulus_verifikasi);
        }else if (jenis == 'konfirmasi_ujian') {
            // jenisNotifikasi = konfirmasi_ujian;
            var add_konfirmasi = `
                <div class="isi-form">
                <div class="form-group row">
                    <label for="tanggal 1" class="col-sm-3 col-form-label">Pilihan Tanggal 1</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal1" class="form-control title_notive" id="PilihanTanggal1" placeholder="PilihanTanggal1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu1" class="form-control title_notive" id="pilihanTanggal1_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu2" class="form-control title_notive" id="pilihanTanggal1_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Pilihan Tanggal 2</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal2" class="form-control title_notive" id="PilihanTanggal2" placeholder="PilihanTanggal2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu1" class="form-control title_notive" id="pilihanTanggal2_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu2" class="form-control title_notive" id="pilihanTanggal2_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pilihan Tanggal" class="col-sm-3 col-form-label">Pilihan Tanggal 3</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal3" class="form-control title_notive" id="PilihanTanggal3" placeholder="PilihanTanggal3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu1" class="form-control title_notive" id="pilihanTanggal3_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu2" class="form-control title_notive" id="pilihanTanggal3_waktu2" placeholder="Jam">
                    </div>
                </div>
                </div>`;
            $('.title_notive').attr('value','Konfirmasi Ujian');

            $(".add-form").append(add_konfirmasi);

            // $(".ql-editor").html(konfirmasi_ujian);
        }else if (jenis == 'lulus_ujian') {
            $('.title_notive').attr('value','LULUS Ujian');
            jenisNotifikasi = lulus_ujian;
            $(".isi-form").remove();
            // $(".ql-editor").html(lulus_ujian);
        }else if (jenis == 'tidak_lulus_ujian') {
            $('.title_notive').attr('value','Tidak LULUS Ujian');
            jenisNotifikasi = tidak_lulus_ujian;
            $(".isi-form").remove();
            // $(".ql-editor").html(tidak_lulus_ujian);
        }
        else if (jenis == 'jadwal_wawancara') {
            var add_wawancara = `
                <div class="isi-form">
                <div class="form-group row">
                    <label for="tanggal 1" class="col-sm-3 col-form-label">Pilihan Tanggal 1</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal1" class="form-control title_notive" id="PilihanTanggal1" placeholder="PilihanTanggal1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu1" class="form-control title_notive" id="pilihanTanggal1_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal1_waktu2" class="form-control title_notive" id="pilihanTanggal1_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Pilihan Tanggal 2</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal2" class="form-control title_notive" id="PilihanTanggal2" placeholder="PilihanTanggal2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu1" class="form-control title_notive" id="pilihanTanggal2_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal2_waktu2" class="form-control title_notive" id="pilihanTanggal2_waktu2" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pilihan Tanggal" class="col-sm-3 col-form-label">Pilihan Tanggal 3</label>
                    <div class="col-sm-9">
                        <input type="date" name="pilihanTanggal3" class="form-control title_notive" id="PilihanTanggal3" placeholder="PilihanTanggal3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 1</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu1" class="form-control title_notive" id="pilihanTanggal3_waktu1" placeholder="Jam">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-sm-3 col-form-label">Sesi 2</label>
                    <div class="col-sm-9">
                        <input type="time" name="pilihanTanggal3_waktu2" class="form-control title_notive" id="pilihanTanggal3_waktu2" placeholder="Jam">
                    </div>
                </div>
                </div>`;
            $('.title_notive').attr('value','Jadwal Wawancara');

            $(".add-form").append(add_wawancara);

        } else {
            console.log("tidak ada kontent");
        }
    });

    // $(".isi-form").on("change","#PilihanTanggal2",function(){
    //     console.log($("#PilihanTanggal2").val());
    // })
        

    $("#generate").click(function(){

        if (jenis == 'konfirmasi_ujian') {
            pilihanTanggal1 = $("#PilihanTanggal1").val().split("-").reverse().join("-");
            pilihanTanggal1_waktu1 = $("#pilihanTanggal1_waktu1").val();
            pilihanTanggal1_waktu2 = $("#pilihanTanggal1_waktu2").val();
            pilihanTanggal2 = $("#PilihanTanggal2").val().split("-").reverse().join("-");
            pilihanTanggal2_waktu1 = $("#pilihanTanggal2_waktu1").val();
            pilihanTanggal2_waktu2 = $("#pilihanTanggal2_waktu2").val();
            pilihanTanggal3 = $("#PilihanTanggal3").val().split("-").reverse().join("-");
            pilihanTanggal3_waktu1 = $("#pilihanTanggal3_waktu1").val();
            pilihanTanggal3_waktu2 = $("#pilihanTanggal3_waktu2").val();
            console.log("ada deh");
            jenisNotifikasi = `<p>Kepada Yth,  <strong> ${hasil_data}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><p>
                1. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu1}<br>
                2. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu2}<br>
                3. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu1}<br>
                4. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu2}<br>
                5. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu1}<br>
                6. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu2}<br>
            </p><p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        }else if(jenis == 'jadwal_wawancara'){
            pilihanTanggal1 = $("#PilihanTanggal1").val().split("-").reverse().join("-");
            pilihanTanggal1_waktu1 = $("#pilihanTanggal1_waktu1").val();
            pilihanTanggal1_waktu2 = $("#pilihanTanggal1_waktu2").val();
            pilihanTanggal2 = $("#PilihanTanggal2").val().split("-").reverse().join("-");
            pilihanTanggal2_waktu1 = $("#pilihanTanggal2_waktu1").val();
            pilihanTanggal2_waktu2 = $("#pilihanTanggal2_waktu2").val();
            pilihanTanggal3 = $("#PilihanTanggal3").val().split("-").reverse().join("-");
            pilihanTanggal3_waktu1 = $("#pilihanTanggal3_waktu1").val();
            pilihanTanggal3_waktu2 = $("#pilihanTanggal3_waktu2").val();

            console.log(pilihanTanggal3_waktu2);
            console.log(pilihanTanggal3);

            jenisNotifikasi = `<p>Kepada Yth,  <strong> ${hasil_data}</strong></p><p>Untuk Konfirmasi jadwal Ujian silahkan memilih beberapa jadwal yang kami sediakan di bawah ini</p><p>
                1. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu1}<br>
                2. ${pilihanTanggal1} Jam ${pilihanTanggal1_waktu2}<br>
                3. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu1}<br>
                4. ${pilihanTanggal2} Jam ${pilihanTanggal2_waktu2}<br>
                5. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu1}<br>
                6. ${pilihanTanggal3} Jam ${pilihanTanggal3_waktu2}<br>
            </p>
            <p>Berikut ini link untuk Memilih Jadwal Wawancara : <a href="{{ action('CertifiedMemberController@jadwalWawancara') }}" target="_blank">Link Jadwal Wawancara</a></p>
            <p>Informasi lebih lanjut dapat menghubungi kami di Siti :081295994863 </p><p>Sekian, terimakasih.</p>`;
        }
        
        else{
            console.log("tidak");
        }
        // console.log(pilihanTanggal1);
        $(".ql-editor").html(jenisNotifikasi);
    });
</script>

@endsection