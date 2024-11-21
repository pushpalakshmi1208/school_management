<?php
include("db-create.php");
// Set passing mark
$passing_mark = 35;
$sql = "SELECT * FROM students_details";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passed Students</title>
    <link rel="stylesheet" href="./list_table.css">
    <link rel="stylesheet" href="./style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background: #f8f9fa;">
    <?php include('navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center" style="background:#2a5a3b;  color: white;">
                        <h2>Passed Students List</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Tamil</th>
                                            <th>English</th>
                                            <th>Maths</th>
                                        </tr>
                                    </thead>
                                    <?php
                            if ($result->num_rows > 0) { ?>
                                    <?php

                                    while ($row = $result->fetch_assoc()) {
                                        // Check if the student has passed all subjects
                                        if ($row['tamil'] >= $passing_mark && $row['english'] >= $passing_mark && $row['maths'] >= $passing_mark) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo ucfirst($row['name']); ?></td>
                                                <td><?php echo $row["tamil"]; ?></td>
                                                <td><?php echo $row["english"]; ?></td>
                                                <td><?php echo $row["maths"]; ?></td>
                                            </tr>
                                <?php
                                        }
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
$conn->close();
?>