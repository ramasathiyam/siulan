<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class postingController extends Controller
{
    public function index()
    {
   
        return view('Posting');
    }

    

    public function posting(Request $request)
    {
        $request->validate([
            'PaketPostingan' => 'required|string|in:Basic,Medium,Premium',
            'JudulKegiatan' => 'required|string',
            'Deskripsi' => 'required|string',
            'JenisKegiatan' => 'required|string|in:Lomba,Seminar,Webinar',
            'Kategori' => 'required|string|in:Teknologi & IT,Bisnis & Kewirausahaan,Desain & Kreatif,Marketing & Komunikasi,Pengembangan Diri,Pendidikan,Kesehatan & Kebugaran,Seni & Budaya,Musik & Hiburan,Olahraga,Lingkungan,Sosial & Komunitas,Lainnya',
            'Lokasi' => 'required|string',
            'Penyelenggara' => 'required|string|max:255',
            'TautanPendaftaran' => 'required|url',
            'Harga' => 'required|integer|min:0', 
            'KontakInstagram' => 'required|string',
            'KontakWebsite' => 'nullable|string',
            'KontakYoutube' => 'nullable|string',
            'Poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            

        ], [
            'PaketPostingan.in' => 'Pilih Paket Postingan',
            'JudulKegiatan.required' => 'Judul kegiatan wajib diisi',
            'Deskripsi.required' => 'Deskripsi wajib diisi',
            'JenisKegiatan.required' => 'Jenis Kegiatan wajib dipilih.',
            'JenisKegiatan.in' => 'Pilih Jenis Kegiatan',
            'Kategori.in' => 'Kategori yang dipilih tidak valid.',
            'Penyelenggara.required' => 'Nama penyelenggara wajib diisi.',
            'Lokasi.required' => 'Pilih Lokasi',
            'TautanPendaftaran.url' => 'Tautan pendaftaran harus berupa URL yang valid.',
            'TautanPendaftaran.required' => 'Tautan pendaftaran wajib di isi.',
            'Harga.required' => 'Harga harus berupa angka',
            'KontakInstagram.required' => 'Masukkan Instagram.',
            'Poster.required' => 'Poster wajib diunggah.',
            'Poster.mimes' => 'Poster harus berupa file JPG atau PNG.',
            
            ]);


        // Simpan file poster ke storage/app/public/poster
        $posterPath = $request->file('Poster')->store('poster', 'public');

        // Posting::create($request->all());
        // Simpan ke database dengan path poster yang benar
       
       
        $namaPaket = $request->PaketPostingan;

    $idPaket = match ($namaPaket) {
        'Basic' => 1,
        'Premium' => 2,
        'Medium' => 3,
        default => 1,
    };

    // Ambil harga dari tabel paket
    $paket = Paket::find($idPaket);


    $snapToken = ''; // atau generate dari Midtrans jika sudah terhubung

   $post = Posting::create([
    'id_paket' => $idPaket,
    'user_id' =>  Auth::id(),
    'JudulKegiatan' => $request->JudulKegiatan,
    'Deskripsi' => $request->Deskripsi,
    'JenisKegiatan' => $request->JenisKegiatan,
    'Kategori' => $request->Kategori,
    'Penyelenggara' => $request->Penyelenggara,
    'TanggalKegiatan' => $request->TanggalKegiatan,   
    'Peserta' => $request->Peserta,   
    'Lokasi' => $request->Lokasi,
    'TautanPendaftaran' => $request->TautanPendaftaran,
    'LinkGrup' => $request->LinkGrup,                   
    'Harga' => $request->Harga, 
    'KontakInstagram' => $request->KontakInstagram,
    'KontakWebsite' => $request->KontakWebsite,
    'KontakYoutube' => $request->KontakYoutube,
    'Poster' => $posterPath,
    'Snap_token' => $snapToken,
]);

return redirect()->route('posting.preview', ['id' => $post->id]);

            return redirect()->route('home')->with('success', 'Postingan berhasil ditambahkan.');
        }

        public function indexdelete(Request $request, $id) {
            $request = User::find($id);
            if ($request) { 
                $request->delete();
                return redirect()->route('Home')->with('success', 'Pengguna berhasil dihapus.');
            } else {
                return redirect()->route('Home')->with('error', 'Pengguna tidak ditemukan.');
            }
        }


     public function preview($id)
    {
        $postingan = Posting::findOrFail($id);

        // Pastikan hanya pemilik postingan yang bisa lihat preview-nya
        if ($postingan->user_id != Auth::id()) {
            abort(403); // unauthorized
        }

        return view('postinganPreview', compact('postingan'));
    }   


    public function verifikasi($id)
    {
        $postingan = Posting::findOrFail($id);

        if ($postingan->user_id != Auth::id()) {
            abort(403); // Bukan miliknya
        }

        // Ubah status menjadi pending jika belum diset
        $postingan->status = 'pending';
        $postingan->save();

        return redirect()->route('riwayat')->with('success', 'Postingan telah diverifikasi dan menunggu persetujuan admin.');
    }

}



