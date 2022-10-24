<style>
    table {
        border: solid;
    }
    table td {
        border: solid;
    }
</style>
<?php
$output = "<table><tr><th>Contenido de \$var</th><th>isset(\$var)</th><th>empty(\$var)</th><th>bool(\$var)</th></tr>";
$var = [null, 0, true, false, "0", "", "foo"];
for ($i = 0; $i < count($var); $i++) {

    $output = $output . "<tr><td>\$var =" . $var[$i] . "</td>" . "<td>" . isset($var[$i]) . "</td>" . "<td>" . empty($var[$i]) . "</td>" . "<td>" . boolval($var[$i]) . "</td></tr>";


}

echo($output);
?>