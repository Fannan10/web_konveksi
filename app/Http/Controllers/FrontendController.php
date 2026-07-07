<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Organization;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Mengambil data untuk katalog dan berita
        $galleries = Gallery::latest()->get();
        $posts = Post::where('is_published', true)->latest()->take(3)->get();
        $team = Organization::orderBy('order')->get();

        return view('welcome', compact('galleries', 'posts', 'team'));
    }
	public function show($id)
    {
        // Cari berita berdasarkan ID, jika tidak ketemu akan memunculkan error 404
        $post = Post::findOrFail($id);
        
        return view('berita-detail', compact('post'));
    }
}