<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::orderByDesc('event_date')->get();
        return view('gallery', compact('albums'));
    }

    public function show(GalleryAlbum $album)
    {
        $album->load('items');
        return view('gallery-show', compact('album'));
    }
}
