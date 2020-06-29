<?php
class XMLFormat
{
    public function __construct($pplData)
    {
        ob_end_clean(); // Cleans up code that is before
        header('Content-type: text/xml; charset=utf-8');
        header('Content-Disposition: attachment; filename="people.xml"');
        foreach ($pplData as $fields) {
            $flipped = array_flip($fields); // Exchanges all keys with their associated values in an array
        }
        $xml = new SimpleXMLElement('<root/>'); // Represents an element in an XML document
        array_walk_recursive($flipped, array($xml, 'addChild')); // Apply a user function recursively to every member of an array
        echo $xml->asXML();
    }
}
