<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukDesaController extends Controller
{
    // Method index, update, dan destroy tidak perlu diubah...
    public function index(Request $request)
    {
        $query = Produk::with('umkm')->latest();

        $q     = $request->input('qProduk');
        $jenis = $request->input('jenisFilter');
        $toko  = $request->input('tokoFilter');

        if ($q) {
            $query->where('nama_produk', 'like', "%{$q}%");
        }

        if ($jenis && $jenis !== 'Semua Jenis Produk') {
            $query->where('jenis_produk', $jenis);
        }

        if ($toko && $toko !== 'Semua Toko') {
            $query->whereHas('umkm', function ($q) use ($toko) {
                $q->where('nama', $toko);
            });
        }

        $items = $query->paginate(10)->withQueryString();
        $tokos = Umkm::select('id', 'nama')->orderBy('nama')->get();
        $jenises = Produk::select('jenis_produk')->distinct()->pluck('jenis_produk')->toArray();

        return view('adminProdukDesa', [
            'items'   => $items,
            'tokos'   => $tokos,
            'jenises' => $jenises,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|string|max:255',
            'no_pirt'      => 'nullable|string|max:255',
            'no_halal'     => 'nullable|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'umkm_id'      => 'required|exists:umkms,id',
            // [FIX] Mengubah validasi gambar menjadi opsional (nullable)
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // [FIX] Logika untuk menangani jika gambar tidak diunggah
        $imagePath = '-'; // Nilai default jika tidak ada gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk', 'public/storage/image');
        }

        Produk::create([
            'nama_produk'  => $request->nama_produk,
            'harga'        => $request->harga,
            'no_pirt'      => $request->filled('no_pirt') ? $request->no_pirt : '-',
            'no_halal'     => $request->filled('no_halal') ? $request->no_halal : '-',
            'jenis_produk' => $request->jenis_produk,
            'image'        => $imagePath, // Simpan path atau tanda '-'
            'umkm_id'      => $request->umkm_id,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|string|max:255',
            'no_pirt'      => 'nullable|string|max:255',
            'no_halal'     => 'nullable|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'umkm_id'      => 'required|exists:umkms,id',
        ]);

        $produk = Produk::findOrFail($id);

        $data = [
            'nama_produk'  => $request->nama_produk,
            'harga'        => $request->harga,
            'no_pirt'      => $request->filled('no_pirt') ? $request->no_pirt : '-',
            'no_halal'     => $request->filled('no_halal') ? $request->no_halal : '-',
            'jenis_produk' => $request->jenis_produk,
            'umkm_id'      => $request->umkm_id,
        ];

        if ($request->hasFile('image')) {
            if ($produk->image && $produk->image !== '-' && Storage::disk('public')->exists($produk->image)) {
                Storage::disk('public/storage/image/')->delete($produk->image);
            }
            $data['image'] = $request->file('image')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->image && $produk->image !== '-' && Storage::disk('public')->exists($produk->image)) {
            Storage::disk('public/storage/image/')->delete($produk->image);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
