console.log('Script chargé');

document.addEventListener('DOMContentLoaded', () => {
    const previewImages = document.querySelectorAll('.preview');
    const overlay = document.getElementById('zoomOverlay');
    const overImage = document.getElementById('overImage');
    const overCaption = document.getElementById('overCaption');
    const closeBtn = document.querySelector('.close-btn');

    // 2. Fonction pour ouvrir l'Overlay
    const openOverlay = (event) => {
        // La cible est l'image survolée
        const image = event.currentTarget; 
        
        // Récupérer les données spécifiques à cette image
        const fullSrc = image.getAttribute('data-full-src');

        // Mettre à jour le contenu de l'Overlay
        overImage.src = fullSrc;

        // Afficher l'Overlay
        overlay.classList.add('active');
    };

    // 3. Fonction pour fermer l'Overlay
    const closeOverlay = () => {
        overlay.classList.remove('active');
    };

    // 4. Attacher les événements

    // Événement d'ouverture au survol (mouseover)
    previewImages.forEach(img => {
        img.addEventListener('click', openOverlay);
        
        // IMPORTANT : Empêcher la fermeture si la souris quitte l'image 
        // MAIS reste dans l'overlay, car l'overlay est le nouveau parent visuel.
        // On attache plutôt la fermeture au clic sur le bouton ou au clic sur le fond.
    });

    // Événement de fermeture au clic sur le bouton
    closeBtn.addEventListener('click', closeOverlay);

    // Événement de fermeture au clic sur le fond de l'Overlay
    overlay.addEventListener('click', (event) => {
        // Fermer seulement si le clic est directement sur l'Overlay (pas sur l'image interne)
        if (event.target === overlay) {
            closeOverlay();
        }
    });
});