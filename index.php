<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <select name="formFormat">
            <option hidden disabled selected value> -- select an option -- </option>
            <option value="XML">XML</option>}
            <option value="JSON">JSON</option>
            <option value="CSV">CSV</option>
        </select>
        <input type="submit" name="submit" value="Download in selected format">
    </form>
</body>

</html>
<?php
// Loads classes
include 'includes/autoloader.inc.php';

// Associative array
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

// Associative array in a table
echo "<h2>Associative array</h2>";
echo "<table>";
foreach ($pplData as $key => $row) {
    echo "<tr>";
    foreach ($row as $key2 => $row2) {
        echo "<td>" . $row2 . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Add value from dropdown menu to a var
if (isset($_POST['submit'])) {
    $selectedFormat = $_POST['formFormat'];
    $errorMessage = "";
    // Check if var empty
    if (empty($selectedFormat)) {
        $errorMessage = "<li>You forgot to select a format!</li>";
    }
    // Check if there is an error with the form
    if ($errorMessage != "") {
        echo ("<p>There was an error with your form:</p>\n");
        echo ("<ul>" . $errorMessage . "</ul>\n");
    } else {
        // Switch case to convert associative array to one of the formats
        switch ($selectedFormat) {
            case "XML":
                $XMLvars = new XMLFormat($pplData);
                break;
            case "JSON":
                $JSONvars = new JSONFormat($pplData);
                break;
            case "CSV":
                $CSVvars = new CSVFormat($pplData);
                break;
            // Default output if none pass
            default:
                echo ("Error!");
                exit();
                break;
        }
    }
}
?>