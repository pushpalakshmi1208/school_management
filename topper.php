<?php
include("db-create.php");

// Sql query to get top 5 students
$sql = "SELECT id, name, tamil, english, maths,(tamil + english + maths) AS total FROM students_details ORDER BY total DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Table</title>
    <link rel="stylesheet" href="./list_table.css">
    <link rel="stylesheet" href="./style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background: #f8f9fa;">
    
<?php include('navbar.php'); ?>

    <div class="container-fluid mt-5">
       
        <div class="card">
            <div class="card-header text-center" style="background:#2a5a3b;  color: white;">
                <h2 class="text-center">Student Marks</h2>
            </div>
            <div class="table-container">
            <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Tamil</th>
                    <th>English</th>
                    <th>Maths</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>
                              <td>{$row['id']}</td>
                              <td>" . ucfirst($row['name']) . "</td>
                                <td>{$row['tamil']}</td>
                                <td>{$row['english']}</td>
                                <td>{$row['maths']}</td>
                                <td>{$row['total']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
            </div>
        </div>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>


</html>