<?php

namespace App\Http\Controllers;
use App\Models\Posting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index(){
    //     return view('admin');
    // }

    public function index()
    {
        $data = Posting::where('status', 'pending')->get();
        return view('admin', compact('data'));
    }

    public function previewadmin($id) 
    {
    $postingan = Posting::findOrFail($id);
    return view('adminPostingPreview', ['postingan'=>$postingan]);
    }

    public function approve($id)
    {
        $post = Posting::findOrFail($id);
        $post->status = 'approved';
        $post->save();

        return back()->with('success', 'Postingan disetujui.');
    }

   public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_note' => 'required|string|max:1000'
        ]);

        $post = Posting::findOrFail($id);
        $post->status = 'rejected';
        $post->rejection_note = $request->rejection_note;
        $post->save();

        return back()->with('success', 'Postingan ditolak dengan catatan.');
    }

}