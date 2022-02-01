<?php
    $id = $_GET['id'] ?? "";
    include ('data/library.php');
    delete_student($id);
?>