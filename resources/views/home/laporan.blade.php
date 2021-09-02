@extends('layouts.home.app')
@section('title-page', 'Kontribusi - Sehat-RI')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding">
    <div class="container">
        <div class="row">
            <!-- single-well start-->
            <div class="col-12">
                <br><br>
                @include('layouts.shared.status')
                <br>
                <div class="form contact-form">
                    <br>
                    <h5>Perkumpulan Teknik Perumahsakitan Indonesia (PTPI) <br>
                        Laporan Keuangan dan Kegiatan</h5>
                        <div class="row">
                        <div class="col">
                            <form action="{{ action('HomeController@laporan') }}" method="GET">
                                <select name="kategori" class="form-control" onchange="this.form.submit()">
                                    <option value="">~Kategori Laporan~</option>
                                    <option value="keuangan" {{ $kategori == 'keuangan' ? 'selected' : null }}>Keuangan</option>
                                    <option value="kegiatan" {{ $kategori == 'kegiatan' ? 'selected' : null }}>Kegiatan</option>
                                </select>
                                <input type="hidden" name="tipe_laporan" value="{{ $tipe_laporan }}">
                                <input type="hidden" name="date" value="{{ $date }}">
                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ action('HomeController@laporan') }}" method="GET">
                                <select name="tipe_laporan" class="form-control" onchange="this.form.submit()">
                                    <option value="">~Pilih Laporan~</option>
                                    <option value="pengeluaran" {{ $tipe_laporan == 'pengeluaran' ? 'selected' : null }}>Pengeluaran</option>
                                    <option value="pemasukan" {{ $tipe_laporan == 'pemasukan' ? 'selected' : null }}>Pemasukan</option>
                                </select>
                                <input type="hidden" name="date" value="{{ $date }}">
                                <input type="hidden" name="kategori" value="{{ $kategori }}">
                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ action('HomeController@laporan') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="month" class="form-control" name="date" onchange="this.form.submit()" placeholder="Filter Waktu" value="{{ ($date ? $date->format('Y-m') : '') }}">
                                    <input type="hidden" name="tipe_laporan" value="{{ $tipe_laporan }}">
                                    <input type="hidden" name="kategori" value="{{ $kategori }}">
                                </div>
                            </form>
                        </div>
                    </div>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Details</th>
                                    <th>Nominal</th>
                                    <th>Pembayaran Via</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Tipe Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                <tr>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->details }}</td>
                                    <td>Rp. <span class="uang">{{ $item->nominal }}</span></td>
                                    <td>{{ $item->pembayaran_via }}</td>
                                    <td class="text-center">
                                    <div class="p-1 badge {{ $item->kategori == 'keuangan' ? 'bg-info' : 'bg-success' }}">{{ $item->kategori }}</div>
                                </td>
                                    <td class="text-center">
                                        <div class="p-1 badge {{ $item->tipe_laporan == 'pengeluaran' ? 'bg-danger' : 'bg-success' }}">{{ $item->tipe_laporan }}</div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-center">TOTAL PENGELUARAN </td>
                                    <td colspan="3" class="text-center">Rp. <span class="uang">{{ $laporan->pluck('nominal')->sum() }}</span></td>
                                </tr>
                                @if ($tipe_laporan == 'pengeluaran')
                                <tr>
                                    <td colspan="4" class="text-center">Dana Operasional PTPI (Update {{ date('d/m/Y') }}) </td>
                                    <td colspan="3" class="text-center">Rp. <span class="uang">{{ $saldo }}</span></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- single-well end-->
                <!-- End col-->
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $(document).ready(function(){
            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});
        })
    </script>
    @endsection
