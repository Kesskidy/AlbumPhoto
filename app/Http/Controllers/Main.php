<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;

class Main extends Controller
{

    public function index() {












        return view('index');
    }

    public function LesAlbums() {
        $lesAlbums = DB::SELECT("SELECT * FROM albums ORDER BY id");









        return view('albums', ['lesAlbums' => $lesAlbums]);
    }

    public function detailAlbum($id) {
        $album = DB::select("SELECT * FROM photos WHERE album_id = ?", [$id]);









        return view('album', ['album' => $album]);
    }

    public function LesPhotos() {
        $photos = DB::SELECT("SELECT * FROM photos ORDER BY id");
        $albums = DB::SELECT("SELECT * FROM albums");









        return view('photos', ['photos' => $photos, 'albums' => $albums]);
    }

    public function lesTags() {
        $tags = DB::SELECT("SELECT * FROM tags ORDER BY id");











        return view('tags', ['tags' => $tags]);
    }

    
    public function detailTag($id) {
        $tag = Tag::with('photos')->find($id);

        return view('tag', ['tag' => $tag]);
    }



    public function ajoutPhoto() {
        











        return view('ajoutPhoto');
    }
}  
?>