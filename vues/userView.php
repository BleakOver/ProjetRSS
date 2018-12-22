<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    if(ModelAdmin::isAdmin()) {
        echo '<div><input id="flux" type="button" value="Gérer les flux">';
        echo '<input type="button" id="disconnect" value="Déconnexion"></div>';
    }
    else{
        echo '<div><input id="flux" type="button" value="Connexion"></div>';
    }
    echo '<div> <a href="index.php?page=1"><-</a> <a href="index.php?page=' . ($page-1) . '"><</a> <a>' . $page . '</a> <a href="index.php?page=' . ($page+1) . '">></a> <a href="index.php?page=' . ModelNews::getNbPagesNews() . '">-></a> </div>';
    if(isset($tabNews)) {
        foreach ($tabNews as $new) {
            echo '<div><h2>' . $new->getTitle() . '</h2><p>' . $new->getDate() . '</p><p>' . $new->getDescription() . '</p><a href="'.$new->getAddress().'">La suite ici !</a></div></br>';
        }
    }
    echo '<div> <a href="index.php?page=1"><-</a> <a href="index.php?page=' . ($page-1) . '"><</a> <a>' . $page . '</a> <a href="index.php?page=' . ($page+1) . '">></a> <a href="index.php?page=' . ModelNews::getNbPagesNews() . '">-></a> </div>';
?>



<script>
    boutonFlux=document.querySelector("#flux");
    boutonFlux.addEventListener("click", function(){
        window.location='index.php?action=flux';
    });

    <?php
        if(ModelAdmin::isAdmin()){
            echo 'boutonDeco=document.querySelector("#disconnect");
            boutonDeco.addEventListener("click", function(){
                if(confirm("Confirmer déconnexion ?")) {
                    window.location = "index.php?action=disconnect";
                }
            });';
        }
    ?>
</script>



</body>
</html>