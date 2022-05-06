filtres = {}

function definir(filtre, valeur) {
    filtres[filtre] = valeur;
    actualiser();
}

function retirer(filtre) {
    delete filtres[filtre];
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
    document.getElementById('bouton-menu-filtre').checked = false;

    // Construction de la grille de produits :
    document.getElementById('bloc-grille').innerHTML = '';
    for (let instrument of donnees) {
        // for (let clef in instrument) {
        //     alert(clef + ' : ' + instrument[clef])
        // }
        let duree = Math.floor(Math.random() * 1000);
        document.getElementById('bloc-grille').innerHTML += `<a href="page-produit?ID=${instrument.ID}">
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