<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostingController extends Controller
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
        ]);

        $posterPath = $request->file('Poster')->store('poster', 'public');

        // Tentukan id paket berdasarkan nama
        $namaPaket = $request->PaketPostingan;
        $idPaket = match ($namaPaket) {
            'Basic' => 1,
            'Medium' => 2,
            'Premium' => 3,
            default => 1,
        };

        $paket = Paket::find($idPaket);
        $hargaAwal = $paket ? $paket->harga : 0;

        // Hitung jumlah postingan sebelumnya oleh user
        $jumlahPostingSebelumnya = Posting::where('user_id', Auth::id())->count();

        // Logika diskon
        $diskonPersen = 0;
        if (($jumlahPostingSebelumnya + 1) % 5 == 0) {
            $diskonPersen += 20; // Diskon 20% untuk postingan kelipatan 5
        }

        $today = Carbon::now();
        if ($today->format('m-d') === '08-17') {
            $diskonPersen += 15; // Tambahan diskon 15% di 17 Agustus
        }

        $hargaAkhir = $hargaAwal * (1 - ($diskonPersen / 100));

        // Tanggal aktif dan expired
        $tanggalAktif = Carbon::now();
        $tanggalExpired = match ($idPaket) {
            1 => $tanggalAktif->copy()->addDays(5), // Basic
            2, 3 => $tanggalAktif->copy()->addDays(10), // Medium & Premium
        };

        //Kondisi jika expired
       Posting::where('tanggal_expired', '<=', Carbon::now())
        ->whereNotNull('snap_token')
        ->update(['snap_token' => null]);



        // Simpan postingan
        $post = Posting::create([
            'id_paket' => $idPaket,
            'user_id' => Auth::id(),
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
            'PaketDiskon' => $hargaAkhir,
            'KontakInstagram' => $request->KontakInstagram,
            'KontakWebsite' => $request->KontakWebsite,
            'KontakYoutube' => $request->KontakYoutube,
            'Poster' => $posterPath,
            'Snap_token' => '',
            'tanggal_aktif' => $tanggalAktif,
            'tanggal_expired' => $tanggalExpired,
        ]);

        return redirect()->route('posting.preview', ['id' => $post->id]);
    }

    public function indexdelete(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) { 
            $user->delete();
            return redirect()->route('Home')->with('success', 'Pengguna berhasil dihapus.');
        } else {
            return redirect()->route('Home')->with('error', 'Pengguna tidak ditemukan.');
        }
    }

    public function preview($id)
    {
        $postingan = Posting::findOrFail($id);

      
        if ($postingan->user_id != Auth::id()) {
            abort(403);
        }

        return view('postinganPreview', compact('postingan'));
    }

    public function verifikasi($id)
    {
        $postingan = Posting::findOrFail($id);

        if ($postingan->user_id != Auth::id()) {
            abort(403);
        }


        $postingan->status = 'pending';
        $postingan->save();

        return redirect()->route('riwayat')->with('success', 'Postingan telah diverifikasi dan menunggu persetujuan admin.');
    }






}

