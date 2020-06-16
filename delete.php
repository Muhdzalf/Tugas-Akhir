<?php
include("config.php");

$ID = $_GET['ID'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_mahasiswa where ID=$ID");

header("Location:index.php");

?>