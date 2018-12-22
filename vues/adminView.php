<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    echo '<div><input id="retour" type="button" value="Retourner aux news">';
    echo '<input type="button" id="disconnect" value="Déconnexion">';
    echo '<input type="button" id="parser" value="Parser"></div>';
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

    boutonParse=document.querySelector("#parser");
    boutonParse.addEventListener("click", function(){
        if(confirm("Parser ?")) {
            window.location = 'parser';
        }
    });


</script>

</body>
</html>