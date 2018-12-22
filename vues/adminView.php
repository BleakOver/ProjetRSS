<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    echo '<div><input id="retour" type="button" value="retourner aux news">';
    echo '<input type="button" id="disconnect" value="Déconnexion"></div>';
    if(isset($tabFlux)) {
        foreach ($tabFlux as $flux) {
            echo '<p><a href="' . $flux->getUrl() . '">' . $flux->getUrl() . '</a><input class="sup" type="button" value="Supprimer"></p></br>';

        }
    }

    require ($rep.$vues['formAjout']);

?>

<script>
    tabBouton=document.querySelectorAll(".sup");
    tabBouton.forEach(function (elem) {
        elem.addEventListener("click", function(){
            if(confirm("Confirmer suppression ?")) {
                window.location = `index.php?action=delete&urlFlux=${elem.previousSibling.innerHTML}`;
            }
        });
    });

    boutonRetour=document.querySelector("#retour");
    boutonRetour.addEventListener("click", function(){
        window.location='index.php';
    });

    boutonDeco=document.querySelector("#disconnect");
    boutonDeco.addEventListener("click", function(){
       if(confirm("Confirmer déconnexion ?")) {
            window.location = 'index.php?action=disconnect';
        } 
    });


</script>

</body>
</html>