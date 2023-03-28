<?php

if ( isset($_GET["id"])) {
    $id = $_GET["id"];

    include('conn.php');

    $sql = "DELETE FROM leerlingen WHERE id=$id";
    $conn->query($sql);

}

header("location: read.php");
exit;

?>