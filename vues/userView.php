<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>

<?php
    if (isset($tabNews)) {
        foreach ($tabNews as $rowTabNews){
            echo "<p>".$rowTabNews->getTitle()."</p>";
        }
    }
?>

</body>
</html>