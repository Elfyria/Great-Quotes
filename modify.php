<?php
require_once "csv_util.php";
$id =$_POST["id"];
$line =$_POST["line"];
$mod = $_POST["mod"];
modifyLine($id,$line,$mod);
echo '<p>This is the new quote "'.$mod.'"<br><br>';
echo '<a class="btn btn-dark" href="index.php">Return Home</a>';


