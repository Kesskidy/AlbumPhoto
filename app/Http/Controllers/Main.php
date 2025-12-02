<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
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
        $lesAlbums = Album::all();








        return view('albums', ['lesAlbums' => $lesAlbums]);
    }

    public function detailAlbum($id) {
        $album = Album::findOrFail($id);








        return view('album', ['album' => $album]);
    }

    public function lesPhotos() {
        $photos = Photo::all();




        return view('photos', ['photos' => $photos]);
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
    public function traitementFormulaire(Request $request) {
    // --- 1. Validation des données ---
    $request->validate([
        'titre'    => 'required|string|max:255',
        'url'      => 'required|url', // On garde la validation pour 'url'
        'note'     => 'required|integer|min:1|max:5',
        'album_id' => 'required|integer|exists:albums,id',
        'image'    => 'required|image|max:2048', // Validation pour le fichier uploadé
    ]);

    // --- 2. Traitement du fichier image ---
    
    $imageFile = $request->file('image');

    // a. Définition du chemin de destination
    // public_path('photos') pointe vers C:\laravel\AlbumPhoto\public\photos
    $destinationPath = public_path('photos');
    
    // b. Génération d'un nom de fichier unique pour éviter les conflits
    $imageFileName = time() . '_' . $imageFile->getClientOriginalName();
    
    // c. Déplacement du fichier uploadé vers le dossier public/photos
    // C'est l'équivalent de l'action 'store' mais en direct dans le dossier public.
    $imageFile->move($destinationPath, $imageFileName);

    // d. Définition du chemin d'accès à enregistrer dans la BDD (relatif au dossier public)
    // Utiliser '/photos/' pour accéder directement au dossier public/photos
    $imagePath = '/photos/' . $imageFileName; 
    
    // --- 3. Insertion dans la base de données (MySQL) ---
    
    DB::table('photos')->insert([
        'titre'    => $request->input('titre'),
        'url'      => $imagePath, 
        'note'     => $request->input('note'),
        'album_id' => $request->input('album_id'),
    ]);

    return redirect('/photos')->with('success', 'Photo ajoutée avec succès !');
    }

    public function monCompte()
    {
        return view('compte');
    }
}
?>