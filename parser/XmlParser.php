<?php
 
/**
 * Classe parsant un fichier xml et affichant les informations sous la forme
 * d'une hierarchie de texte
 */
class XmlParser {
    private $path;
    private $result;
    private $depth;
    private $btitle;
    private $blink;
    private $bdesc;
    private $bdate;
    private $news;
     
    public function __construct($path)
    {
        $this -> path = $path;
        $this -> depth = 0;
        $this -> btitle = false;
        $this -> blink = false;
        $this -> bdesc = false;
        $this -> bdate = false;
    }
     
    public function getResult() {
        return $this->result;
    }
     
    /**
     * Parse le fichier et met le resultat dans Result
     */
    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }
 
        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                            xml_error_string(xml_get_error_code($xml_parser)),
                            xml_get_current_line_number($xml_parser)));
            }
        }
         
        $this -> result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }
     
    private function startElement($parser, $name, $attrs)
    {
        var_dump($name);
        switch($name){
            case 'item':
                $this->news = new News();
                break;
            case 'title':
                $this->btitle = true;
                break;
            case 'link':
                $this->blink = true;
                break;
            case 'description':
                $this->bdesc = true;
                break;
            case 'pubDate':
                $this->bdate = true;
                break;
                default :
                    echo $name;

        }
    }
     
    private function displayAttribute($attribute, $text)
    {
        for ($i = 0; $i < $this -> depth; $i++) {
            echo "  ";
        }
         
        echo "A - $attribute = $text\n";
    }
 
    private function endElement($parser, $name)
    {
        switch($name){
            case 'item':
                Model::addNews($this->news);
                break;
            case 'title':
                $this->btitle = false;
                break;
            case 'link':
                $this->blink = false;
                break;
            case 'description':
                $this->bdesc = false;
                break;
            case 'pubDate':
                $this->bdate = false;
                break;

        }

    }
     
    private function characterData($parser, $data)
    {
        $data = trim($data);
         
        if (strlen($data) > 0)
        {
            if($this->btitle){
                $this->news->setTitle($data);
            }
            elseif($this->blink){
                $this->news->setAddress($data);
            }
            elseif($this->bdesc){
                $this->news->setDescription($data);
            }
            elseif($this->bdate){
                $this->news->setDate($data);
            }
        }
    }
}
?>