<!DOCTYPE html>
<html>
<body>
<style>
    table,td {
        border: 1px solid black;
        text-align: center;
        color:darkviolet;
    }
</style>
<?php
$max = 10;
$min = 1;

$num = 10;
$index = 0;

$output = "<table><tr>";
for ($i = $min;$i <= $max; $i++) {
    $output = $output . "<th>" . $i . "</th>";
}
$output = $output . "</tr>";
for ($c = 0; $c <= $num;$c++) {
    $output = $output . "<tr>";

    for ($x = $min;$x <= $max;$x++) {
        $output = $output . "<td>" . ($x * $index) . "</td>";

    }
    $index++;
    $output = $output . "</tr>";

}
echo $output;
?>

</body>
</html>