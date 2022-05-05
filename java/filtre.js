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
        alert("Texte : " + resultat)
    } else {
        alert("HTTP-Error : " + reponse.status);
    }
}

function indiquer() {
    for(let clef in filtres) {
        alert(`Dans "filtres", "${clef}" contient "${filtres[clef]}".`);
    }
}