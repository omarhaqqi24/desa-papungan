<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Tambahkan ini jika belum ada
// use GuzzleHttp\Client; // Tidak perlu jika Anda tidak menggunakan Guzzle di sini

class BelanjaController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan data dummy produk di sini untuk ditampilkan di halaman katalog
        // Atau biarkan kosong jika data produk akan diambil dari database
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Batik Pak Gembus',
                'image' => asset('/img/produk/batik-pak-gembus.jpg'),
                'price_min' => '47.000',
                'price_max' => '259.000',
                'description' => 'Kain batik tulis bermotif ikan mujaer khas Desa Papungan, dibuat secara manual oleh pengrajin lokal dengan teknik tradisional. Memiliki panjang 2 meter dan lebar 1,5 meter, kain ini menggunakan bahan katun prima yang lembut. Tersedia dalam berbagai motif dan warna yang menarik.',
                'address' => 'Dusun Krajan RT 02/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20Batik%20Pak%20Gembus',
            ],
            2 => [
                'id' => 2,
                'name' => 'Opak Gambir Krispi',
                'image' => asset('/img/produk/og-naseka.JPG'),
                'price_min' => '15.000',
                'price_max' => '50.000',
                'description' => 'Opak gambir renyah dengan berbagai varian rasa, cocok untuk camilan. Dibuat dari bahan-bahan pilihan tanpa pengawet.',
                'address' => 'Dusun Papungan Barat RT 01/RW 02, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567891?text=Halo%20saya%20tertarik%20dengan%20produk%20Opak%20Gambir%20Krispi',
            ],
            3 => [
                'id' => 3,
                'name' => 'Kerajinan Anyaman Bambu',
                'image' => asset('/img/produk/anyaman-bambu.jpg'), // Ganti dengan gambar dummy Anda
                'price_min' => '25.000',
                'price_max' => '150.000',
                'description' => 'Berbagai kerajinan tangan dari anyaman bambu, seperti tas, topi, dan hiasan dinding. Dibuat oleh pengrajin lokal dengan detail yang teliti.',
                'address' => 'Dusun Anyaman RT 03/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567892?text=Halo%20saya%20tertarik%20dengan%20produk%20Kerajinan%20Anyaman%20Bambu',
            ],
            // Tambahkan produk dummy lainnya di sini sesuai kebutuhan
        ];

        return view('belanja', compact('products')); // Teruskan data produk ke view belanja
    }

    // --- Tambahkan method show() di bawah ini ---
    public function show($id)
    {
        // Data dummy untuk produk (harus sama dengan di index agar konsisten)
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Batik Pak Gembus',
                'image' => asset('/img/produk/batik-pak-gembus.jpg'), // Sesuaikan path gambar Anda
                'price_min' => '47.000',
                'price_max' => '259.000',
                'description' => 'Kain batik tulis bermotif ikan mujaer khas Desa Papungan, dibuat secara manual oleh pengrajin lokal dengan teknik tradisional. Memiliki panjang 2 meter dan lebar 1,5 meter, kain ini menggunakan bahan katun prima yang lembut. Tersedia dalam berbagai motif dan warna yang menarik.',
                'address' => 'Dusun Krajan RT 02/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20Batik%20Pak%20Gembus',
                'maps_link' => 'https://maps.app.goo.gl/wLocyVVVz3HewuDV6',
            ],
            2 => [
                'id' => 2,
                'name' => 'Opak Gambir Krispi',
                'image' => asset('/img/produk/og-naseka.JPG'),
                'price_min' => '15.000',
                'price_max' => '50.000',
                'description' => 'Opak gambir renyah dengan berbagai varian rasa, cocok untuk camilan. Dibuat dari bahan-bahan pilihan tanpa pengawet.',
                'address' => 'Dusun Papungan Barat RT 01/RW 02, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567891?text=Halo%20saya%20tertarik%20dengan%20produk%20Opak%20Gambir%20Krispi',
                'maps_link' => 'https://maps.app.goo.gl/9axt9dVKd1JjcxtU9',
            ],
            3 => [
                'id' => 3,
                'name' => 'Kerajinan Anyaman Bambu',
                'image' => asset('/img/produk/anyaman-bambu.jpg'),
                'price_min' => '25.000',
                'price_max' => '150.000',
                'description' => 'Berbagai kerajinan tangan dari anyaman bambu, seperti tas, topi, dan hiasan dinding. Dibuat oleh pengrajin lokal dengan detail yang teliti.',
                'address' => 'Dusun Anyaman RT 03/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567892?text=Halo%20saya%20tertarik%20dengan%20produk%20Kerajinan%20Anyaman%20Bambu',
                'maps_link' => 'https://maps.app.goo.gl/9axt9dVKd1JjcxtU9', // Ganti dengan link maps yang sesuai
            ],
            4 => [
                'id' => 4,
                'name' => 'Kerajinan Tangan Kulit',
                'image' => asset('/img/produk/kerajinan-kulit.jpg'), // Ganti dengan gambar dummy Anda
                'price_min' => '30.000',
                'price_max' => '200.000',
                'description' => 'Kerajinan tangan dari kulit sapi asli, seperti dompet, ikat pinggang, dan tas. Setiap produk dibuat dengan tangan oleh pengrajin lokal yang berpengalaman.',
                'address' => 'Dusun Kulit RT 04/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567893?text=Halo%20saya%20tertarik%20dengan%20produk%20Kerajinan%20Tangan%20Kulit',
                'maps_link' => 'https://maps.app.goo.gl/9axt9dVKd1JjcxtU9', // Ganti dengan link maps yang sesuai
            ],
            5 => [
                'id' => 5,
                'name' => 'Kerajinan Tangan Keramik',
                'image' => asset('/img/produk/kerajinan-keramik.jpg'), // Ganti dengan gambar dummy Anda
                'price_min' => '20.000',
                'price_max' => '150.000',
                'description' => 'Kerajinan tangan dari keramik, seperti vas bunga, piring, dan hiasan dinding. Setiap produk dibuat dengan teknik tradisional yang diwariskan secara turun-temurun.',
                'address' => 'Dusun Keramik RT 05/RW 01, Desa Papungan Kec. Kanigoro Kab. Blitar',
                'whatsapp_link' => 'https://wa.me/6281234567894?text=Halo%20saya%20tertarik%20dengan%20produk%20Kerajinan%20Tangan%20Keramik',
                'maps_link' => 'https://maps.app.goo.gl/9axt9dVKd1JjcxtU9', // Ganti dengan link maps yang sesuai
            ],
            // Tambahkan produk dummy lainnya di sini sesuai kebutuhan
        ];

        // Cek apakah produk dengan ID yang diberikan ada
        if (!isset($products[$id])) {
            abort(404); // Tampilkan halaman 404 jika produk tidak ditemukan
        }

        $product = $products[$id];

        // Untuk "Produk Lainnya", kita ambil semua produk kecuali yang sedang ditampilkan
        $otherProducts = array_filter($products, function($item) use ($id) {
            return $item['id'] != $id;
        });
        // Ambil maksimal 3 produk lainnya untuk ditampilkan
        $otherProducts = array_slice($otherProducts, 0, 3);


        return view('detailProduk', compact('product', 'otherProducts'));
    }
}