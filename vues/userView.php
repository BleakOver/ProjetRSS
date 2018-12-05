<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
</head>
<body>

<?php
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/modeles/News.php'); 
	require_once()
	if(isset($dVueErreur)&&count($dVueErreur)>0){
		echo '<h1> ERREUR CHARGEMENT DES NEWS </h1>'
		foreach($dVueErreur as $value){
			echo $value;
		}
	}
	foreach($tabNews as $new){
		echo '<a href ="index.php ?action=clickNews". '$new->getAddress()'.'$new->getTitle()'></a> </br>'
	}
?>

</body>
</html>