<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>
<?php
$pplData = array(
    [
        'first_name' => 'Kiestis',
        'age' => 29,
        'gender' => 'male'
    ],
    [
        'first_name' => 'Vytska',
        'age' => 32,
        'gender' => 'male'
    ],
    [
        'first_name' => 'Karina',
        'age' => 25,
        'gender' => 'female'
    ]
);
class XMLFormat
{
    function __construct($pplData)
    {
        ob_end_clean();
        header_remove();
        header('Content-type: text/xml; charset=utf-8');
        header('Content-Disposition: attachment; filename="people.xml"');
        foreach ($pplData as $fields) {
            $flipped = array_flip($fields);
        }
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($flipped, array($xml, 'addChild'));
        echo $xml->asXML();
        exit();
    }
}
class CSVFormat
{
    function __construct($pplData)
    {
        ob_end_clean();
        header_remove();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=people.csv');
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys($pplData[0]));
        foreach ($pplData as $person) {
            fputcsv($fp, $person);
        }
        exit();
    }
}
class JSONFormat
{

    function __construct($pplData)
    {
        ob_end_clean();
        header_remove();
        header('Content-disposition: attachment; filename=people.json');
        header('Content-type: application/json');
        echo json_encode($pplData);
    }
}
?>