<?php

require_once(__DIR__.'/../config/config.php');

require_once(__DIR__ . '/AutoloadParser.php');
AutoloadParser::charger();


Model::delAllNews();

$flux=Model::getFlux();

foreach ($flux as $toParse) {
    $parser = new XmlParser($toParse->getUrl());
    $parser->parse();
}
?>
