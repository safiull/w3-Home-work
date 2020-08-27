<?php

	require_once 'db.php';

	if (!isset($_GET['deleteId']) || $_GET['deleteId'] == NULL) {
        header("location: index.php");
    } else {
        $id = $_GET['deleteId'];
        $id = base64_decode($id);
        $result = $obj->Delete("first_table", "id='$id'");
        header("location: index.php");
    }



?>