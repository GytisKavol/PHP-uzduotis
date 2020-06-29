<?php

class JSONFormat
{
    public  function __construct($pplData)
    {
        ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
        header('Content-disposition: attachment; filename=people.json');
        header('Content-type: application/json');
        echo json_encode($pplData); // Convert array to JSON

    }
}
