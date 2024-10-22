<?php
include "config.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id ";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        header("Location: index.php?msg=Date Updated successfully");
    }else {
        echo "failed";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/add.css">
    <title>PHP CRUD</title>
</head>
<body>
    <nav class="navbar">
        PHP Cemplete CRUD Application
    </nav>
    <div class="container">
    </div>
    <div class="container">
        <div class="text">
            <h3>Edit User Iformation</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="form">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $row ['first_name'] ?>">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Last_Name:</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $row ['last_name'] ?>">
                    </div>
                </div>
                <div>
                <label for="" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row ['email'] ?>">
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="radio" id="male" name="gender" class="chorm-check-input" value="male" <?php echo ($row['gender'] == 'male')? "checked": "" ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" id="female" name="gender" class="chorm-check-input" value="female" <?php echo ($row['gender'] == 'female')? "checked": "" ?> >
                    <label for="female" class="form-input-label">female</label>
                </div>
                <div>
                    <button type="submit" class="btn" name="submit">Update</button>
                    <a href="index.php" class="cancel"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>