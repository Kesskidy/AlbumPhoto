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
        











        return view('albums');
    }

    public function detailAlbum($id) {
        











        return view('album');
    }

    public function LesPhotos() {
        











        return view('photos');
    }

    public function lesTags() {
        $tags = DB::SELECT("SELECT * FROM tags ORDER BY id");











        return view('tags', ['tags' => $tags]);
    }

    public function detailTag($id) {
    // On récupère le tag avec ses photos liées
    $tag = Tag::with('photos')->find($id);
    
    return view('tag', ['tag' => $tag]);
    }


    public function ajoutPhoto() {
        











        return view('ajoutPhoto');
    }
}  
?>