@extends("template")

@section('content')
    <section>
        <h1>Bienvenue sur Album Photo</h1>

        <p>Organisez et partagez vos photos par album. Simple, rapide et intuitif.</p>

        <div style="margin:20px 0; display:flex; gap:12px; flex-wrap:wrap;">
            <a href="/albums" style="padding:10px 14px; background:#eee; border-radius:6px; text-decoration:none;">Voir les albums</a>
            <a href="/photos" style="padding:10px 14px; background:#eee; border-radius:6px; text-decoration:none;">Voir toutes les photos</a>
            <a href="/tags" style="padding:10px 14px; background:#eee; border-radius:6px; text-decoration:none;">Parcourir les tags</a>
        </div>

        @auth
            <div style="margin-top:16px;">
                <p>Connecté en tant que <strong>{{ auth()->user()->name }}</strong>.</p>
                <div style="display:flex; gap:12px;">
                    <a href="/creerAlbum" style="padding:8px 12px; background:#cfe; border-radius:6px; text-decoration:none;">Créer un album</a>
                    <a href="/ajoutPhoto" style="padding:8px 12px; background:#cfe; border-radius:6px; text-decoration:none;">Ajouter une photo</a>
                </div>
            </div>
        @else
            <div style="margin-top:16px;">
                <p>Pour ajouter des photos ou créer des albums, <a href="{{ route('register') }}">inscrivez-vous</a> ou <a href="{{ route('login') }}">connectez-vous</a>.</p>
            </div>
        @endauth

        <hr style="margin:24px 0;" />

        <section>
            <h2>Comment ça marche</h2>
            <ol>
                <li>Créez un album.</li>
                <li>Ajoutez une photo dans un album existant (upload local).</li>
                <li>Ajoutez ou choisissez un tag pour organiser vos images.</li>
            </ol>
        </section>
    </section>
@endsection