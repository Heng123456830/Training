<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <html>
        <head>
            <title>Sign In</title>
            
            <link href="css/sign-in.css" rel="stylesheet"/>
            
        </head>
        
        <body>
            <?php include 'header.php' ?>
            <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $password = $_POST["password"];

                $conn = new mysqli("localhost", "root", "", "user");
                $sql = "SELECT*FROM customer WHERE email='$email' AND password='$password'";

                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $_SESSION['password']=$password;
                    // Authentication successful, redirect the user to the dashboard or another page
                    header("Location: index.php");
                    exit();
                } else {
                    // Authentication failed, display an error message
                    echo "Invalid email or password. Please try again.";
                }
            }
            ?>
            <div class="form-container">


                <form action="" method="post">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                  <input type="submit" name="sub" value="Submit">
                </form>
            </div>
        </body>
    </html>


</body>
</html>
