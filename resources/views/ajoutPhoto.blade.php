@extends('template')
@section('content')
<form method="POST" action="/traitementFormulaire" enctype="multipart/form-data">
    @csrf

    <label for="titre">Titre de la photo :</label><br>
    <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required><br />


    <label for="photo">Fichier image :</label><br>
    <input type="file" id="photo" name="photo" accept="image/*" required><br />



    <label for="note">Note de la photo (1-5) :</label><br>
    <input type="number" id="note" name="note" min="1" max="5" value="{{ old('note', 1) }}" required><br />



    <label for="album_id">Album :</label><br>
    <select id="album_id" name="album_id" required>
        <option value="">Sélectionnez un album</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}" @selected(old('album_id') == $album->id)>{{ $album->titre }}</option>
        @endforeach
    </select>



    <label for="tag_id">Tag existant (optionnel) :</label><br>
    <select id="tag_id" name="tag_id">
        <option value="">Aucun</option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" @selected(old('tag_id') == $tag->id)>{{ $tag->nom }}</option>
        @endforeach
    </select>



    <label for="new_tag">Ou ajouter un nouveau tag (minuscule, sans espace, sans accents ni caractères spéciaux) :</label><br>
    <input type="text" id="new_tag" name="new_tag" value="{{ old('new_tag') }}" placeholder="ex: vacances" />



    <input type="submit" value="Ajouter la photo">
</form>
@endsection