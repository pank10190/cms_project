<?php
// Include the database connection
include('../dbconfig.php');

// Check if article ID is set
if (isset($_POST['id'])) {
    $article_id = $_POST['id'];

    // SQL query to delete the article
    $sql_delete = "DELETE FROM article WHERE id = '$article_id'";

    if ($conn_douwantm->query($sql_delete) === TRUE) {
        echo "success"; // Article deleted successfully
    } else {
        echo "fail"; // Something went wrong
    }
}
?>
