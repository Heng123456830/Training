<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            
            $price = $_POST["price"];
            $bedroom = $_POST["bedroom"];
            $bathroom = $_POST["bathroom"];
            $size = $_POST["size"];
            $address = $_POST["address"];

            // Connect to the database (similar to your existing code)
            $conn = new mysqli("localhost", "root", "", "user");

            // Check if the connection was successful
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Perform the deletion
            $sql = "DELETE FROM house WHERE  price='$price' AND bedroom='$bedroom' AND bathroom='$bathroom' AND size='$size' AND address='$address'";
            if ($conn->query($sql) === TRUE) {
                echo "Item deleted successfully";
            } else {
                echo "Error: " . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
        ?>

        <h2>Delete House Details</h2>
        <form action="" method="post">
            
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value=""><br><br>

            <label for="bedroom">Bedroom:</label><br>
            <input type="number" id="bedroom" name="bedroom" value=""><br><br>

            <label for="bathroom">Bathroom:</label><br>
            <input type="number" id="bathroom" name="bathroom" value=""><br><br>

            <label for="size">Size:</label><br>
            <input type="text" id="size" name="size" value=""><br><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value=""><br><br>

            <input type="submit" name="submit" value="Delete"><br>
        </form>


    </body>
</html>
