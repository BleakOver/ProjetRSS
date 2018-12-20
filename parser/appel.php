<?php
 
include ('XmlParser.php');
         
$parser = new XmlParser("https://www.lemonde.fr/disparitions/rss_full.xml");
$parser ->parse();
 
?>
