<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    if(isset($tabNews)) {
        foreach ($tabNews as $new) {
            echo '<div><h2>' . $new->getTitle() . '</h2><p>' . $new->getDescription() . '</p><a href="index.php">' . $new->getAddress() . '</a></div></br>';
        }
    }
?>

</body>
</html>