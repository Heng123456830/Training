<?php
$name = $email = $password = $confirmPass = "";
$nameErr = $emailErr = $passwordErr = $confirmPassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirmPass = test_input($_POST["confirmPassword"]);

    if (empty($name)) {
        $nameErr = "Name is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        $emailErr = "Invalid email format";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    } elseif (strlen($password) < 8 || strlen($password) > 15) {
        $passwordErr = "Password must be between 8 and 15 characters";
    } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $password)) {
        $passwordErr = "Password can only contain letters, digits, and underscores";
    }

    if (empty($confirmPass)) {
        $confirmPassErr = "Confirm Password is required";
    } elseif (strlen($confirmPass) > 30) {
        $confirmPassErr = "Confirm Password cannot be more than 30 characters";
    } elseif (!preg_match("/^[a-zA-Z0-9@,'.\\/-]+$/", $confirmPass)) {
        $confirmPassErr = "Invalid characters in Confirm Password";
    } elseif ($password !== $confirmPass) {
        $confirmPassErr = "Passwords do not match";
    }

    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPassErr)) {
        // All input is valid, proceed to database insertion
        $conn = new mysqli("localhost", "root", "", "user");

        if (isset($_POST['sub'])) {
            $email = $_POST['email'];

            $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $emailErr = "Email is already taken";
                $passwordErr = "password is alredy taken";
            } else {
                $q = "INSERT INTO customer (name, email, password) VALUES ('$name', '$email', '$password')";
                if ($conn->query($q) === TRUE) {
                    // Registration successful
                    session_start(); // Start a session
                    $_SESSION["successMessage"] = "Account created ";
                    $_SESSION["email"]=$email;
                    header("Location:index.php");
                } else {
                    $dbErr = "Error: " . $q . "<br>" . $conn->error;
                }
            }
        }


       


        $conn->close();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>registration</title>
        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="form-container">
            <form action="" method="post">
                <label for="name">Your name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
                <p class="error" style="color:red;"><?php echo $nameErr; ?></p>

                <label for="e-mail" >E-mail:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>"style="  width: 100%; padding:10px; margin-bottom: 10px;border-radius:10px; height:8px;"><br>
                <p class="error"style="color:red;"><?php echo $emailErr; ?></p>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>"style="  width: 100%; padding:10px; margin-bottom: 10px;border-radius:10px; height:8px;"><br>
                <p class="error"style="color:red;"><?php echo $passwordErr; ?></p>

                <label for="confirmPassword">Confirm password:</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $confirmPass; ?>"style="  width: 100%; padding:10px; margin-bottom: 10px;border-radius:10px; height:8px;"><br><br>
                <p class="error"style="color:red;"><?php echo $confirmPassErr; ?></p>

                <input type="submit" name="sub" value="Submit"><br><br>
                <label for="gotAccount"> Already have an Account? <a href="Sign-in.php">Click here</a></label>



            </form> 
        </div>
    </body>
</html>
