<?php
            $servername = 'localhost';
            $username = 'root';
            $password = "";
            $dbname = 'note';
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Document</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style\font.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style\header.css">
        <link rel="stylesheet" href="../style\footer.css">
        <link rel="stylesheet" href="../page-categorie.css">
        <script src='java\presentation.js' async></script>
        <script src="https://kit.fontawesome.com/29ac4cabe1.js"></script>
    </head>
    <body>
    <?php
        include 'PHP/header.php';
        ?>
        <main class="contenair-categorie">
        <!-- <?php
                foreach($produits as $produit){
                    ?>
                <article class="instru">
                        <figure>
                            <img title= <?php echo $produit['Nom'] ?> src="./img/<?php echo $produit['Image']?>" alt="Image <?php echo $produit['Nom'] ?>">
                            <figcaption><?php echo utf8_encode ($produit['Description'])?> </figcaption>
                        </figure>
                    </article>
                    <?php  
                }
                ?> -->
                
                <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article> 
                    <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article>
                    <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article>
                    <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article>
                    <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article>
                    <article class="instru">
                        <figure>
                            <img title= "" src="" alt="Image">
                            <figcaption>description</figcaption>
                        </figure>
                    </article>
        </main>
    <footer>
         <?php
         include 'PHP/footer.php'
         ?>
        </footer>
    </body>
    </html>