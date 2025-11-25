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

    public function LesPhotos() {
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
    public function traitementFormulaire(Request $request){
        // 1. Validation des données, y compris l'image
        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'required|url',
            'note' => 'required|integer|min:1|max:5',
            'album_id' => 'required|integer|exists:albums,id',
            // 'image' est validé comme un fichier image, maximum 2048 KB (2 MB)
            'image' => 'required|image|max:2048', 
        ]);

        // 2. Traitement du fichier image
    
        // Récupère l'objet UploadedFile pour le champ 'image'
        $imageFile = $request->file('image');

        // Stocke le fichier dans le dossier 'photos' sur le disque 'public' 
        // et retourne le chemin relatif du fichier stocké (ex: 'photos/nom_unique.jpg').
        // Assurez-vous d'avoir lancé 'php artisan storage:link'
        $imagePath = $imageFile->store('photos', 'public');

        // 3. Insertion dans la base de données (MySQL)

        DB::table('photos')->insert([
            'titre' => $request->input('titre'),
            'url' => $request->input('url'),
            'note' => $request->input('note'),
            'album_id' => $request->input('album_id'),
        
            // CORRECTION MAJEURE: On insère le chemin d'accès ('imagePath'), pas l'objet Request
            'image' => $imagePath, 
        
            // Optionnel : ajouter le nom original du fichier
            // 'nom_original' => $imageFile->getClientOriginalName(), 
        
            // Laravel gère souvent les timestamps :
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        return redirect('/photos')->with('success', 'Photo ajoutée avec succès !');
    }
}  
?>