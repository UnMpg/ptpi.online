@extends('layouts.dashboard.app')
@section('title-page', 'Data Center')
@section('title-header', 'Data Center')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-tags"></i>
                            Data Kontribusi Sehat RI
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Ringkasan Laporan Pemasukan dan Pengeluaran Dana SEHAT-RI</p>
                        {{-- <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>JUMLAH DANA TERKUMPUL HINGGA TANGGAL {{ today()->format('d M Y') }}</td>
                                    <td>RP. 50 000 0000</td>
                                </tr>
                            </tbody>
                        </table> --}}

                        <h5>Jumlah Dana Terkumpul Hingga Tanggal {{ today()->format('d M Y') }} : <i>Rp. 50 000 0000</i></h5>

                        <hr>

                        <div>
                            <div>
                                Daftar Nama Kontributor SEHAT-RI Minggu ke XX, tahun 2020. (Kami tidak menampilkan jumlah dana dari para kontributor, untuk mengormati privasi para kontributor. Meskipun demikian, setiap kontributor akan memperoleh bukti kontribusi melalui email dan aplikasi mobile SEHAT-RI)
                                @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                <a href="{{ action('UserController@createKontributorSehatRI') }}"
                                        class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fas fa-plus-circle"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal Kontribusi Masuk dalam rekening SEHAT-RI</th>
                                    <th>Nama Kontributor</th>
                                    @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                    <th class="text-center">Aksi</th>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontributor as $item)
                                    <tr>
                                        <td>{{ $item->tgl_kontribusi }}</td>
                                        <td>{{ $item->nama }}</td>
                                        @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                        <td class="text-center">
                                            <form action="{{ action('UserController@destroyKontributorSehatRI', $item->id) }}" onsubmit="return confirm('Do you really want to delete the data?');" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>

                        <div>
                            <div>Detail Pengeluaran Dana SEHAT-RI
                                @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                <a href="{{ action('UserController@createKontribusiSehatRI') }}"
                                        class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fas fa-plus-circle"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Jumlah Pengeluaran</th>
                                    <th>Untuk Keperluan</th>
                                    @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                    <th class="text-center">Aksi</th>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontribusi as $item)
                                    <tr>
                                        <td>{{ $item->tgl_pengeluaran }}</td>
                                        <td>{{ $item->jumlah_pengeluaran }}</td>
                                        <td>{{ $item->keperluan }}</td>
                                        @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                        <td class="text-center">
                                            <form action="{{ action('UserController@destroyKontribusiSehatRI', $item->id) }}" onsubmit="return confirm('Do you really want to delete the data?');" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
