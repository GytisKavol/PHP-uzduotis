<?php
class CSVFormat
{
    public function __construct($pplData)
    {
        ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=people.csv');
        $fp = fopen('php://output', 'w'); // Opens file or URL
        fputcsv($fp, array_keys($pplData[0])); // Format line as CSV and write to file pointer
        foreach ($pplData as $person) {
            fputcsv($fp, $person);
        }
    }
}
