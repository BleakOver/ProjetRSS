<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    echo '<div><input id="flux" type="button" value="gérer les flux"></div>';
    if(isset($tabNews)) {
        foreach ($tabNews as $new) {
            echo '<div><h2>' . $new->getTitle() . '</h2><p>' . $new->getDescription() . '</p><a href="index.php">' . $new->getAddress() . '</a></div></br>';
        }
    }
?>

<script>
    boutonFlux=document.querySelector("#flux");
    boutonFlux.addEventListener("click", function(){
        window.location='index.php?action=flux';
    });
</script>

</body>
</html>