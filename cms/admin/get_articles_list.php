<?php
include('../dbconfig.php');

$sql = "SELECT id, name, content, image FROM article";
$result = $conn_douwantm->query($sql);

$articles = [];
while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
}

echo json_encode($articles);  // Return the data as JSON
?>
