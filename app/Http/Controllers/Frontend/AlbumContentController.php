<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlbumChapter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumContentController extends Controller
{
    function createChapterModal(string $id): String
    {
        return view('frontend.artist-dashboard.album.partials.album-chapter-modal', compact('id'))->render();
    }

    function storeChapter(Request $request, string $album_id): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $chapter = new AlbumChapter();
        $chapter->title = $request->title;
        $chapter->album_id = $album_id;
        $chapter->artist_id = Auth::user()->id;
        $chapter->order = AlbumChapter::where('album_id', $album_id)->count() + 1;
        $chapter->save();

        return redirect()->back();
    }
}
