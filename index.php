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
        <input type="submit" name="submit" value="Get selected format">
    </form>
</body>

</html>
<?php require "classes/Formats.php"; ?>
<?php

if (isset($_POST['submit'])) {
    $selectedFormat = $_POST['formFormat'];
    $errorMessage = "";

    if (empty($selectedFormat)) {
        $errorMessage = "<li>You forgot to select a format!</li>";
    }
    if ($errorMessage != "") {
        echo ("<p>There was an error with your form:</p>\n");
        echo ("<ul>" . $errorMessage . "</ul>\n");
    } else {
        function my_autoloader($class)
        {
            include 'classes/' . $class . '.Formats.php';
        }
        spl_autoload_register('my_autoloader');
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
            default:
                echo ("Error!");
                exit();
                break;
        }
    }
}
?>