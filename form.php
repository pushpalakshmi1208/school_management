<?php
include("db-create.php");
// Inizialization
$id = 0;
$name = "";
$age = "";
$dob = "";
$mobile = "";
$email = "";
$blood_group = "";
$gender="";
$tamil = "";
$english = "";
$maths = "";
// Updation
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `students_details` WHERE id=$id";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $name = $row["name"];
            $age = $row["age"];
            $dob = $row["dob"];
            $email = $row["email"];
            $mobile = $row["mobile"];
            $blood_group = $row["blood_group"];
            $gender = $row["gender"];
            $english = $row["english"];
            $tamil = $row["tamil"];
            $maths = $row["maths"];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $updatedname = $_POST["name"];
                $updatedage = $_POST["age"];
                $updateddob = $_POST["dob"];
                $updatedemail = $_POST["email"];
                $updatedmobile = $_POST["mobile"];
                $blood = $_POST["blood_group"];
                $gender = $_POST["gender"];
                $updatedenglish = $_POST["english"];
                $updatedtamil = $_POST["tamil"];
                $updatedmaths = $_POST["maths"];
                $updatedblood = implode(",", $blood);
                $updatedgender = implode(",", $gender);
                if ($id > 0) {
                    $sql = "UPDATE `students_details` SET `name`='$updatedname',`age`='$updatedage',`dob`='$updateddob',`email`='$updatedemail',`mobile`='$updatedmobile',`blood_group`='$updatedblood',`gender`='$updatedgender',`english`='$updatedenglish',`tamil`='$updatedtamil',`maths`='$updatedmaths' WHERE id=$id";
                    if ($conn->query($sql) === TRUE) {
                        // echo "Data Successfully Updated";
                        header("location:list_students.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: ID not found";
                }
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
// Insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $blood = $_POST["blood_group"];
    $gender = $_POST["gender"];
    $tamil = $_POST["tamil"];
    $english = $_POST["english"];
    $maths = $_POST["maths"];
    $blood_group = implode(",", $blood);
    $gender = implode(",", $gender);
    if ($id == 0) {
        $add = "INSERT INTO `students_details`(`name`, `age`, `dob`, `email`, `mobile`, `blood_group`, `gender`, `english`, `tamil`, `maths`) VALUES ('$name','$age','$dob','$email','$mobile','$blood_group','$gender','$english','$tamil','$maths')";
        if ($conn->query($add) === TRUE) {
            // echo "Data Successfully Submitted";
            header("location:list_students.php");
        } else {
            echo "Error: " . $add . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student form</title>
    <link rel="stylesheet" href="php.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <!-- font awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Lexend+Deca:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php
        if ($id > 0) { ?>
            <h1><?php echo "UPDATE FORM" ?></h1><?php
        } else { ?>
            <h1><?php echo "STUDENT FORM" ?></h1><?php
        }
        ?>
        <form action="" method="POST">
            <!-- Full Name -->
            <label for="name">Name:</label>
            <input type="text" placeholder="Enter your name" value="<?php echo $name; ?>" id="name" name="name"
               required pattern="[A-Za-z\s]{2,50}" title="Name should only contain letters and spaces"><br><br>
            <!-- age and dob -->
            <div class="row">
                <div class="col-md-6"><label for="age">Age:</label>
            <input type="number" placeholder="Enter your age" value="<?php echo $age; ?>" id="age" name="age" min="5"
              max="100"  required><br><br></div>
                <div class="col-md-6"><label for="dob">Date of Birth:</label>
            <input type="date" placeholder="Enter your DOB" value="<?php echo $dob; ?>" id="dob" name="dob"
                required><br><br></div>
            </div>
           <!-- Mobile Number -->
            <!-- email -->
           <div class="row">
            <div class="col-md-6"> <label for="mobile">Mobile Number:</label>
           <input type="tel" placeholder="Enter your mobile number" value="<?php echo $mobile; ?>" id="mobile"
                    name="mobile" required pattern="[0-9]{10}" pattern="[0-9]{10}" maxlength="10"><br><br> </div>
            <div class="col-md-6"><label for="email">Email:</label>
            <input type="email" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" name="email"
                required><br><br></div>
           </div>
            <!-- blood group & gender -->
             <div class="row">
                <div class="col-md-6"><label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group[]" required>
                <option value="" disabled <?php echo empty($blood_group) ? 'selected' : ''; ?>>Select Blood Group</option>
                <option value="A+" <?php echo ($blood_group == 'A+') ? 'selected' : ''; ?>>A+</option>
                <option value="B+" <?php echo ($blood_group == 'B+') ? 'selected' : ''; ?>>B+</option>
                <option value="AB+" <?php echo ($blood_group == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                <option value="O+" <?php echo ($blood_group == 'O+') ? 'selected' : ''; ?>>O+</option>
                <option value="A-" <?php echo ($blood_group == 'A-') ? 'selected' : ''; ?>>A-</option>
                <option value="B-" <?php echo ($blood_group == 'B-') ? 'selected' : ''; ?>>B-</option>
                <option value="AB-" <?php echo ($blood_group == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                <option value="O-" <?php echo ($blood_group == 'O-') ? 'selected' : ''; ?>>O-</option>
            </select>
            <br><br></div>
                <div class="col-md-6">  <label for="gender">Gender:</label>
            <select id="gender" name="gender[]" required>
                <option value="" disabled <?php echo empty($gender) ? 'selected' : ''; ?>>Select Gender</option>
                <option value="male" <?php echo ($gender == 'male') ? 'selected' : ''; ?>>male</option>
                <option value="female" <?php echo ($gender == 'female') ? 'selected' : ''; ?>>female</option>
            </select>
            <br><br></div>
             </div>
            <div class="row">
                <div class="col-md-4"><!-- marks1 -->
            <label for="tamil">Tamil mark:</label>
            <input type="number" placeholder="Enter your marks" value="<?php echo $tamil; ?>" id="tamil" name="tamil"
                min="0" max="100" required><br><br></div>
                <div class="col-md-4">  <!--marks2 -->
            <label for="english">English mark:</label>
            <input type="number" placeholder="Enter your marks" value="<?php echo $english; ?>" id="english"
                name="english" min="0" max="100" required><br><br></div>
                <div class="col-md-4"><!-- marks3 -->
            <label for="maths">Maths mark:</label>
            <input type="number" placeholder="Enter your marks" value="<?php echo $maths; ?>" id="maths" name="maths"
                min="0" max="100" required><br></div>
            </div>
            <!-- Submit Button -->
            <div class="submithello">

                
                <?php
                if ($id > 0) { ?>
                <a href="list_students.php" class="text-decoration-none text-white bg-dark rounded-3 py-2 px-4 m-2">Back</a>

                    <a href="list_students.php"><input type="submit" value="Update"></a> <?php
                } else { ?>
                <a href="index.html" class="text-decoration-none text-white bg-dark rounded-3 py-2 px-4 m-2">Back</a>

                    <a href="list_students.php"><input type="submit" value="Submit" ></a> <?php
                }
                ?>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>