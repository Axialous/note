<header>
    <div>
        <img src="../images/logo.svg" alt="logo" height="53">
        <nav>
            <input type="checkbox">
            <div id="menu-filtre">
                <h1>Filtrez votre recherche :</h1>
                <ul>
                    <li>
                        <h2>Famille</h2>
                        <input type="radio" name="famille" value="aucune" checked>
                        <div id="choix-famille">
                            <input type="radio" name="famille" value="cordes-frottees" id="famille-cordes-frottees"><label for="famille-cordes-frottees">🎻</label>
                            <input type="radio" name="famille" value="cordes-pincees" id="famille-cordes-pincees"><label for="famille-cordes-pincees">🎸</label>
                            <input type="radio" name="famille" value="cordes-frappees" id="famille-cordes-frappees"><label for="famille-cordes-frappees">🎹</label>
                            <input type="radio" name="famille" value="vents-bois" id="famille-vents-bois"><label for="famille-vents-bois">🎷</label>
                            <input type="radio" name="famille" value="vents-cuivres" id="famille-vents-cuivres"><label for="famille-vents-cuivres">🎺</label>
                            <input type="radio" name="famille" value="percussions-claviers" id="famille-percussions-claviers"><label for="famille-percussions-claviers"></label>
                            <input type="radio" name="famille" value="percussions-peaux" id="famille-percussions-peaux"><label for="famille-percussions-peaux">🥁</label>
                            <input type="radio" name="famille" value="percussions-accessoires" id="famille-percussions-accessoires"><label for="famille-percussions-accessoires">🔔</label>
                        </div>
                    </li>
                    <li>
                        <h2>Taille</h2>
                        <input type="radio" name="taille" value="aucune" checked>
                        <div id="choix-taille">
                            <input type="radio" name="taille" value="minuscule" id="taille-minuscule"><label for="taille-minuscule">🐌</label>
                            <input type="radio" name="taille" value="petit" id="taille-petit"><label for="taille-petit">🐓</label>
                            <input type="radio" name="taille" value="moyen" id="taille-moyen"><label for="taille-moyen">🐖</label>
                            <input type="radio" name="taille" value="grand" id="taille-grand"><label for="taille-grand">🐎</label>
                            <input type="radio" name="taille" value="gigantesque" id="taille-gigantesque"><label for="taille-gigantesque">🐳</label>
                        </div>
                    </li>
                    <li>
                        <h2>Formation</h2>
                        <input type="radio" name="formation" value="aucune" checked>
                        <div id="choix-formation">
                            <input type="radio" name="formation" value="fanfare" id="formation-fanfare"><label for="formation-fanfare">Fanfare</label>
                            <input type="radio" name="formation" value="big-band" id="formation-big-band"><label for="formation-big-band">Big band</label>
                            <input type="radio" name="formation" value="harmonie" id="formation-harmonie"><label for="formation-harmonie">Harmonie</label>
                            <input type="radio" name="formation" value="groupe-de-rock" id="formation-groupe-de-rock"><label for="formation-groupe-de-rock">Groupe de rock</label>
                            <input type="radio" name="formation" value="orchestre-de-chambre" id="formation-orchestre-de-chambre"><label for="formation-orchestre-de-chambre">Orchestre de chambre</label>
                            <input type="radio" name="formation" value="orchestre-symphonique" id="formation-orchestre-symphonique"><label for="formation-orchestre-symphonique">Orchestre symphonique</label>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <form>
        <label for="recherche"><img src="images/icones/loupe.svg" alt=""></label>
        <input type="text" name="recherche" id="recherche">
        <button type="submit"><img src="images/icones/suivant.svg" alt=""></button>
    </form>
</header>