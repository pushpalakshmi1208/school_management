<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="./list_table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: #f8f9fa;">
    
    <?php include('navbar.php'); ?>
    
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header text-center" style="background:#2a5a3b;  color: white;">
                <h2 class="text-center">Student List</h2>
            </div>
            
            <div class="btn-container">
                <button class="btn btn-success">
                    <a href="form.php" class="text-white text-decoration-none">Add New Student</a>
                </button>
            </div>

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>DOB</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                            <th>Tamil</th>
                            <th>English</th>
                            <th>Maths</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db-create.php';
                        $sql = "SELECT * FROM students_details ORDER BY name ASC";
                        $result = $conn->query($sql);

                        if (!$result || $result->num_rows == 0) {
                            echo "<tr><td colspan='12' class='text-center'>No records found</td></tr>";
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . ucfirst($row['name']) . "</td>
                                        <td>" . $row['age'] . "</td>
                                        <td>" . date('d-m-Y', strtotime($row['dob'])) . "</td>
                                        <td>" . $row['mobile'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $row['blood_group'] . "</td>
                                        <td>" . ucfirst($row['gender']) . "</td>
                                        <td>" . $row['tamil'] . "</td>
                                        <td>" . $row['english'] . "</td>
                                        <td>" . $row['maths'] . "</td>
                                        <td class='action-buttons'>
                                            <a href=\"form.php?id=" . $row['id'] . "\" class='btn btn-primary btn-sm'>Edit</a>
                                            <a href=\"delete.php?id=" . $row['id'] . "\" class='btn btn-danger btn-sm'>Delete</a>
                                        </td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>