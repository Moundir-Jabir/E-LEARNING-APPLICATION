<?php
    $id = $_GET['id'] ?? "";
    require('database/models/student.php');
    $item = new Student();
    $item->deleteStudent($id);
    header("Location: students.php");
?>