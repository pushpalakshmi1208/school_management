<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Female Students</title>
    <link rel="stylesheet" href="./list_table.css">
    <link rel="stylesheet" href="./style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background: #F8F9FA;">
    <?php include('navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center" style="background:#2a5a3b;  color: white;">
                        <h2>Female Students List</h2>
                    </div>
                    <div class="card-body">
                    <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead style="background:#2a5a3b;  color: white;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Tamil</th>
                            <th scope="col">English</th>
                            <th scope="col">Maths</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'db-create.php';
                        $sql = "SELECT * FROM students_details WHERE  gender='Female'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . ucfirst($row['name']) . "</td>
                                                <td>" . $row['age'] . "</td>
                                               <td>" .  date('d-m-Y', strtotime($row['dob'])) . "</td>
                                                <td>" . $row['mobile'] . "</td>
                                                <td>" . $row['email'] . "</td>
                                                <td>" .  $row['blood_group'] . "</td>
                                                <td>" . ucfirst($row['gender']) . "</td>
                                                <td>" . $row['tamil'] . "</td>
                                                <td>" . $row['english'] . "</td>
                                                <td>" . $row['maths'] . "</td>
                                            </tr>";
                        } }
                         else {
                            echo "<tr><td colspan='12' class='text-center'>No records found</td></tr>";
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