
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Document</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style\font.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/presentation.css">
        <link rel="stylesheet" href="style/tableau-categorie.css">
        <link rel="stylesheet" href="style/footer.css">
        <script src='java\filtre.js' async></script>
        <script src='java\presentation.js' async></script>
        <script src="https://kit.fontawesome.com/29ac4cabe1.js"></script>
    </head>
    <body>

        <?php
        include 'PHP/header.php';
        ?>
            <main>
                <section id="presentation">
                <?php
                include 'PHP/presentation.php'
                ?>   
                </section>
              
                <section id="grille">
                <?php
                include 'PHP/tableau-categorie.php'
                ?>   
                </section>
            </main>
        <footer>
         <?php
         include 'PHP/footer.php'
         ?>
        </footer>
    </body>
</html>