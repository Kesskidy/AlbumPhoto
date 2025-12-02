<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Album Photo</title>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>
    
    <body>
        <div class="header">
            <header>Album Photo</header>
            <nav>
                <a href="/">Accueil</a>
                <a href="/albums">Albums</a>
                <a href="/photos">Photos</a>
                <a href="/tags">Tags</a>
                <a href="/ajoutPhoto">Ajout Photo</a>
                <a href="/tag">Tag</a>
            </nav>
        </div>

        
        
        <main class="container">
            <div class="content">
                @yield("content")
            </div>
        </main>
    </body>
</html>
