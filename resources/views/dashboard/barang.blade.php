@extends('dashboard.template.layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Barang</h1>
        <div class="mt-2 mb-2">
            <button class="btn btn-primary btn-md" id="modal_tambah_barang" data-bs-toggle="modal"
                data-bs-target="#modalTambahBarang">Tambah Barang</button>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Data Barang</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Gambar Barang</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="modal fade" id="modalTambahBarang" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Data</h5>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="mt-2">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                        </div>
                        <div class="mt-2">
                            <label for="nama_barang">Foto Barang</label>
                            <input type="file" class="form-control" name="foto_barang" id="foto_barang">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn-md" type="submit">Tambah Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
