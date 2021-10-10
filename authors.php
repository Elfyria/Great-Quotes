<?php
require_once "csv_util.php";// gets utils.
$arr = fileFetcher("assets/csv/authors.csv");// calls to make array.
for ($i = 0; $i < count($arr); $i++) {

    echo "<h2>" . $arr[$i][0] . ' ' . $arr[$i][1] . "\n</h2>";
}//prints authors.