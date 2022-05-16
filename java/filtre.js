var filtres = {}

function definir(filtre, valeur) {
    filtres[filtre] = valeur;
    document.getElementById('bouton-menu-filtre').checked = false;
    actualiser();
}

function retirer(filtre) {
    delete filtres[filtre];
    document.getElementById('bouton-menu-filtre').checked = false;
    actualiser();
}

function filtrer_recherche() {
    recherche = document.getElementById('recherche');
    switch (recherche.value) {
        case 'Cordes frottées':
            filtres.famille = 'cordes-frottees';
            break;
        case 'Cordes pincées':
            filtres.famille = 'cordes-pincees';
            break;
        case 'Cordes frappées':
            filtres.famille = 'cordes-frappees';
            break;
        case 'Bois':
            filtres.famille = 'vents-bois';
            break;
        case 'Cuivres':
            filtres.famille = 'vents-cuivres';
            break;
        case 'Percussions à claviers':
            filtres.famille = 'percussions-claviers';
            break;
        case 'Percussions à peaux':
            filtres.famille = 'percussions-peaux';
            break;
        case 'Accessoires':
            filtres.famille = 'percussions-accessoires';
            break;
        case 'Fanfare':
            filtres.formation = 'fanfare';
            break;
        case 'Big band':
            filtres.formation = 'big-band';
            break;
        case 'Harmonie':
            filtres.formation = 'harmonie';
            break;
        case 'Groupe de rock':
            filtres.formation = 'groupe-de-rock';
            break;
        case 'Orchestre de chambre':
            filtres.formation = 'orchestre-de-chambre';
            break;
        case 'Orchestre symphonique':
            filtres.formation = 'orchestre-symphonique';
            break;
    }
    recherche.value = "";
    actualiser();
}

async function actualiser() {
    let reponse = await fetch('PHP/filtres.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(filtres)
    });

    if (reponse.ok) {
        let resultat = await reponse.json();
        afficher(resultat)
    } else {
        alert("HTTP-Error : " + reponse.status);
    }
}

function afficher(donnees) {
    // Construction de la grille de produits :
    document.getElementById('bloc-grille').innerHTML = '';
    for (let instrument of donnees) {
        let duree = Math.floor(Math.random() * 1000);
        document.getElementById('bloc-grille').innerHTML += `<a href="page-produit.php?ID=${instrument.ID}">
                                                                 <figure style="background-image: url(picture/${instrument.Image}); animation: attente ${duree}ms, fondue 3000ms ${duree}ms;">
                                                                     <figcaption><p>${instrument.Nom}</p></figcaption>
                                                                 </figure>
                                                             </a>`
    }

    // Remplacement des catégories par les produits :
    document.getElementById('grille').style.transform = 'translateX(0)';
    document.getElementById('grille').style.position = 'static';
    document.getElementById('tableau-categories').style.transform = 'translateX(-100%)';
    document.getElementById('tableau-categories').style.position = 'absolute';
}