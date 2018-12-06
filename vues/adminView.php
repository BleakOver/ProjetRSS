<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    if(isset($tabFlux)) {
        foreach ($tabFlux as $flux) {
            echo '<p><a href="index.php">' . $flux->getUrl() . '</a><input class="sup" type="button" value="Supprimer"></p></br>';

        }
    }

    echo '<p><input id="ajout" type="button" value="Ajouter"></p>';

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

    boutonAjout=document.querySelector("#ajout");
    boutonAjout.addEventListener("click", function(){
        window.location = 'index.php?action=ajout'
    });


</script>

</body>
</html>