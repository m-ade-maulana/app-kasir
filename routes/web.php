<?php

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Transaksi;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Layar Kasir
Route::get('/', function () {
    return view('home', [
        'title' => 'Aplikasi Kasir'
    ]);
});

// Route Kasir
Route::get('/kasir', function () {
    $total = DB::table('keranjang')->sum('keranjang.harga_barang');
    return view('kasir', [
        'data_menu' => Barang::all(),
        'data_keranjang' => Keranjang::all(),
        'data_total_harga' => $total
    ]);
});

// Route insert barang
Route::post('/kasir/insert', function (Request $request) {
    // $harga_barang_satuan =
    $keranjang = new Keranjang;
    // Memanggil harga barang
    $harga_barang = Barang::where('kode_barang', $request->kode_barang)->value('harga_barang');
    // var_dump($harga_barang);

    $keranjang->kode_barang = $request->kode_barang;
    $keranjang->nama_barang = $request->nama_barang;
    $keranjang->jumlah_barang = $request->jumlah_barang;

    // Hitung harga barang
    $total = $harga_barang * $request->jumlah_barang;
    $keranjang->harga_barang = $total;

    $keranjang->kode_keranjang = 1;
    // echo $keranjang->harga_barang;
    $keranjang->save();

    return redirect('kasir');
});

Route::get('/kasir/bayar', function () {
    // $data = new Transaksi;
    $bayar = DB::table('keranjang')->get();
    $bayar->save();
});

Route::get('/admin', function () {
    return view('/dashboard/dashboard');
});

Route::get('/tambah_barang', function () {
    return view('/dashboard/barang');
});
