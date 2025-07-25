<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukDesaController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('umkm')->latest();

        if ($q = $request->input('qProduk')) {
            $query->where('nama_produk', 'like', "%{$q}%");
        }

        if (($jenis = $request->input('jenisFilter')) && $jenis !== 'Semua Jenis Produk') {
            $query->where('jenis_produk', $jenis);
        }

        if (($toko = $request->input('tokoFilter')) && $toko !== 'Semua Toko') {
            $query->whereHas('umkm', fn ($q) => $q->where('nama', $toko));
        }

        return view('adminProdukDesa', [
            'items'    => $query->paginate(10)->withQueryString(),
            'tokos'    => Umkm::select('id', 'nama')->orderBy('nama')->get(),
            'jenises'  => Produk::select('jenis_produk')->distinct()->pluck('jenis_produk')->toArray(),
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
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama_produk'  => $request->nama_produk,
            'harga'        => $request->harga,
            'no_pirt'      => $request->filled('no_pirt') ? $request->no_pirt : '-',
            'no_halal'     => $request->filled('no_halal') ? $request->no_halal : '-',
            'jenis_produk' => $request->jenis_produk,
            'umkm_id'      => $request->umkm_id,
            'image'        => '-', // default jika tidak ada gambar
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('produk', 'public');
            $data['image'] = basename($path);
        }

        Produk::create($data);

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
            // Hapus gambar lama jika ada
            if ($produk->image && $produk->image !== '-') {
                $oldPath = 'produk/' . $produk->image;
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Upload gambar baru
            $path = $request->file('image')->store('produk', 'public');
            $data['image'] = basename($path);
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->image && $produk->image !== '-') {
            $path = 'produk/' . $produk->image;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}