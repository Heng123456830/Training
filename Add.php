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

        <?php
          include 'header.php';
        $conn = new mysqli("localhost", "root", "", "user");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['submit'])) {
            // Retrieve data from the form
            $price = $_POST['price'];
            $bedroom = $_POST['bedroom'];
            $bathroom = $_POST['bathroom'];
            $size = $_POST['size'];
            $address = $_POST['address'];

            // Insert data into the database
            $sql = "INSERT INTO house (price, bedroom, bathroom, size, address) VALUES ('$price', $bedroom, $bathroom, '$size', '$address')";

            if ($conn->query($sql) === TRUE) {
                echo "New item added successfully.";
                header("location:logout.php");
            } else {
                echo "Error adding item: " . $conn->error;
            }
        }

// Close the database connection
        $conn->close();
        ?>
        <form action="" method="post">
            
          
            
            <label for="price">Price:</label><br>
            <input type="tex" name="price" required><br><br>

            <label for="bedroom">Bedroom:</label><br>
            <input type="number" name="bedroom" required><br><br>

            <label for="bathroom">Bathroom:</label><br>
            <input type="number" name="bathroom" required><br><br>

            <label for="size">Size:</label><br>
            <input type="text" name="size" required><br><br>

            <label for="address">Address:</label><br>
            <input type="text" name="address" required><br><br>

            <input type="submit" name="submit" value="Add">
        </form>

    </body>
</html>
