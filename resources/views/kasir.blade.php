{{-- Set layout from folder template --}}
@extends('template.layout')

@section('content')
    <div class="row">
        <div class="col-sm-6">

            <div class="card" style="max-height: 500px">
                <div class="card-header">
                    <ul class="nav nav-pills nav-fill justify-content-center" id="tab-menu" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" id="menu-1-tab" data-bs-target="#menu-1"
                                role="tab" aria-controls="menu-1-tab">Menu1</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab" id="menu-2-tab"
                                data-bs-target="#menu-2" role="tab" aria-controls="menu-2-tab">Menu 2</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab" id="menu-3-tab"
                                data-bs-target="#menu-3" role="tab" aria-controls="menu-3-tab">Menu 3</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab" id="menu-4-tab"
                                data-bs-target="#menu-4" role="tab" aria-controls="menu-4-tab">Menu 4</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" data-bs-toggle="tab" id="menu-5-tab"
                                data-bs-target="#menu-5" role="tab" aria-controls="menu-5-tab">Menu 5</button>
                        </li>
                    </ul>
                </div>

                <div class="card-body overflow-auto">
                    <div class="tab-content" id="tab-menu">
                        <div class="tab-pane fade show active" id="menu-1" role="tabpanel" aria-labelledby="menu-1-tab"
                            tabindex="0">
                            @foreach ($data_menu as $dm)
                                <a href="#" id="menu-1-tombol" value="{{ $dm->nama_barang }}"
                                    data-bs-target="#modal-jumlah-barang-{{ $dm->kode_barang }}" data-bs-toggle="modal">
                                    <img src="{{ $dm->foto }}" alt="Gambar 1" srcset="" class="rounded"
                                        id="menu-1" width="150" value="{{ $dm->nama_barang }}">
                                </a>

                                <div class="modal fade" id="modal-jumlah-barang-{{ $dm->kode_barang }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Keranjang</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/kasir/insert') }}" method="post">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="">Kode Barang</label>
                                                        <input type="text" name="kode_barang" id=""
                                                            class="form-control" value="{{ $dm->kode_barang }}" readonly>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="">Nama Barang</label>
                                                        <input type="text" name="nama_barang" id=""
                                                            class="form-control" value="{{ $dm->nama_barang }}" readonly>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="">Jumlah Barang</label>
                                                        <input type="number" name="jumlah_barang" id=""
                                                            class="form-control" placeholder="1">
                                                    </div>

                                                    <button class="btn btn-primary btn-md mt-3" type="submit">Tambah Ke
                                                        keranjang</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">

                <div class="card-header">
                    <h4>Harga Total : Rp. <b>{{ number_format($data_total_harga, 0, ',' . '.') }}</b></h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5px">No</th>
                                <th style="width: 300px">Menu</th>
                                <th style="width: 5px">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="table_data">
                            <?php $i = 1; ?>
                            @foreach ($data_keranjang as $dk)
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td><input type="text" class="form-control" value="{{ $dk->nama_barang }}"
                                            readonly></td>
                                    <td><input type="number" class="form-control" value="{{ $dk->jumlah_barang }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Letakan logika disini jika data belum masuk --}}
                    <a href="{{ url('/kasir/bayar') }}" class="btn btn-primary btn-md">Bayar</a>
                </div>

            </div>
        </div>
    </div>
@endsection
