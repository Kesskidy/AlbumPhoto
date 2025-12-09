@extends('template')
@section('content')
    <div class="form-container">
        <h1 class="text-center">Ajouter une photo</h1>
        
        <form method="POST" action="/traitementFormulaire" enctype="multipart/form-data" id="add-photo-form">
            @csrf

            <div class="form-group">
                <label for="titre">Titre de la photo :</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required>
            </div>

            <div class="form-group">
                <label for="photo">Fichier image :</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="note">Note de la photo (1-5) :</label>
                <input type="number" id="note" name="note" min="1" max="5" value="{{ old('note', 1) }}" required>
            </div>

            <div class="form-group">
                <label for="album_id">Album :</label>
                <select id="album_id" name="album_id" required>
                    <option value="">Sélectionnez un album</option>
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}" @selected(old('album_id') == $album->id)>{{ $album->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag_id">Tag existant (optionnel) :</label>
                <select id="tag_id" name="tag_id">
                    <option value="">Aucun</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @selected(old('tag_id') == $tag->id)>{{ $tag->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="new_tag">Ou ajouter un nouveau tag (minuscule, sans espace, sans accents ni caractères spéciaux) :</label>
                <input type="text" id="new_tag" name="new_tag" value="{{ old('new_tag') }}" placeholder="ex: vacances">
            </div>

            <div class="form-actions">
                <input type="submit" value="Ajouter la photo" class="btn btn-primary">
                <a href="/" class="btn">Annuler</a>
            </div>
        </form>
    </div>
@endsection