<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>
<?php
    if(isset($tabNews)) {
        foreach ($tabNews as $new) {
            echo '<p><a href="index.php">' . $new->getAddress() . '</a>' . $new->getTitle() . '</p></br>';
        }
    }
?>

</body>
</html>