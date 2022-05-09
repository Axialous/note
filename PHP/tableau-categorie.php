<?php
            $servname = "localhost"; $dbname = "note"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare("SELECT ID_Categorie, Titre, Photo
                                       FROM categories");
                $sth-> execute();
                $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
               
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>

<section id="tableau-categories">
    <div>

    <?php
    foreach($categories as $categorie){
    ?>
        <a href="page-categorie.php?ID=<?= $categorie['ID_Categorie'] ?>">
            <figure style="background-image: url(picture/<?= $categorie['Photo']?>);">
                <figcaption><p><?= ($categorie['Titre']) ?></p></figcaption>
            </figure>
        </a>
    <?php
    }
    ?>

    </div>
</section> 