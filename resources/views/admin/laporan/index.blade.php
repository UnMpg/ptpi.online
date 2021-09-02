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
                            Laporan Keuangan dan Kegiatan:
                            <a href="{{ action('LaporanController@create') }}"
                            class="btn btn-sm btn-outline-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ action('LaporanController@index') }}" method="GET">
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
                            <form action="{{ action('LaporanController@index') }}" method="GET">
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
                            <form action="{{ action('LaporanController@index') }}" method="GET">
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
                                <th class="text-center">Tipe Laporan</th>
                                <th class="text-center">Kategori</th>
                                @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                <th class="text-center">Aksi</th>
                                @endif
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
                                @if (optional(auth('admin')->user())->email == "admin@mail.com")
                                <td class="text-center">
                                    <form action="{{ action('LaporanController@destroy', $item->id) }}" onsubmit="return confirm('Do you really want to delete the data?');" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center">TOTAL PENGELUARAN </td>
                                <td colspan="4" class="text-center">Rp. <span class="uang">{{ $laporan->pluck('nominal')->sum() }}</span></td>
                            </tr>
                            @if ($tipe_laporan == 'pengeluaran')
                            <tr>
                                <td colspan="4" class="text-center">Dana Operasional PTPI (Update {{ date('d/m/Y') }}) </td>
                                <td colspan="3" class="text-center">Rp. <span class="uang">{{ $saldo }}</span></td>
                                <td colspan="1" class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ action('LaporanController@updateSaldo') }}" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Saldo</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="saldo">Saldo</label>
                                            <input type="number" name="saldo" id="saldo" class="form-control" value="{{ $saldo }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
@section('script_custom')
<script>
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('000.000.000', {reverse: true});
    })
</script>
@endsection
