<?php
            $servname = "localhost"; $dbname = "note"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sth = $dbco->prepare("
                SELECT ID,Categorie,Photo
                FROM categories
                
                ");
                $sth-> execute();
                $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
               
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>

<div class="contener-categorie">
                <?php
                foreach($categories as $categorie){
                    ?>
                <div class="<?php echo utf8_encode ($categorie['Categorie']) ?> instru">
                <a href="page-categorie.php?ID=<?php echo $categorie['ID']?>" title="<?php echo utf8_encode ($categorie['Categorie']) ?>"> <?php echo utf8_encode ($categorie['Categorie'])?></a>
                        <img src="picture/<?php echo $categorie['Photo'];?>" alt="Image <?php echo utf8_encode ($categorie['Categorie']) ?>">

                           
                </div>
                <?php
                }
                ?>
</div> 
    <!-- <div class="corde-frotté instru">
    <p>Corde frottées</p>
    <img src="picture/instruments-cordes-frottees.jpg" alt="instruments-cordes-frottees">
    </div>
    <div class="corde-pincé instru">
    <p>Corde pincées</p>
    <img src="picture/instruments-cordes-pincees.jpg" alt="instruments-cordes-pincees">
    </div>
    <div class="corde-frappé instru">
    <p>Corde frappées</p>
    <img src="picture\instruments-cordes-frappées.jpg" alt="instruments-cordes-frappees">
    </div>
    <div class="bois instru">
    <p>Bois</p>
    <img src="picture\instruments-bois.jpg" alt="bois"> 
    </div>
    <div class="cuivre instru">
    <p>Cuivre</p>
    <img src="picture\instruments-cuivre.jpg" alt="cuivre">
    </div>
    <div class="percussion-clavier instru">
    <p>Percussion clavier</p>
    <img src="picture\instruments-percussion-clavier.jpg" alt="percussion-clavier">
    </div>
    <div class="percussion-peau instru">
    <p>Percussion peau</p>
    <img src="picture\instruments-percussion-peau.jpg" alt="percussion-peau">
    </div>
    <div class="percussion-accessoire instru">
        <p>Accessoire</p>
    <img src="picture\instruments-percussion-accessoire.jpg" alt="percussion-accessoire">
    </div>
</div> -->