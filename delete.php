<?php
include("db-create.php");
$id = $_GET['id'];
$sql = "DELETE FROM students_details WHERE id = $id";
if ($conn->query($sql)) {
    header("Location: list_students.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}