<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>House Details</title>
        <style>
            tabel,th,td{
                border: 1px solid;
                padding:10px;
            }
            table {
                border-collapse: collapse;
            }

        </style>
    </head>
    <body>
        <?php
//        include 'header.php';
//        session_start();
//        
//        $conn = new mysqli("localhost", "root", "", "user");
//        $id = $price = $bathroom = $bedroom = $size = $address = "";
//
//        $db = new mysqli("localhost", "root", "", "user");
//
//        // Check if the form is submitted
//        if (isset($_POST["submit"])) {
//            $id = $_POST["id"];
//            $price = $_POST["price"];
//            $bedroom = $_POST["bedroom"];
//            $bathroom = $_POST["bathroom"];
//            $size = $_POST["size"];
//            $address = $_POST["address"];
//
//            $sql = "UPDATE house SET price='$price', bedroom='$bedroom', bathroom='$bathroom', size='$size', address='$address' WHERE house_id='$id'";
//            if ($db->query($sql) === TRUE) {
//                echo "Record updated successfully.";
//                $updatedData = json_encode($_POST);
//                $_SESSION['updatedData'] = $updatedData;
//            } else {
//                echo "Error updating record: " . $db->error;
//            }
//        }
//
//        $updatedData = array(
//            'price' => $price,
//            'bedroom' => $bedroom,
//            'bathroom' => $bathroom,
//            'size' => $size,
//            'address' => $address
//        );
//
//        if (isset($_SESSION['updatedData'])) {
//            // Display the updated data if available
//            $updatedData = $_SESSION['updatedData'];
//            $data = json_decode($updatedData, true);
//
//            $updatedId = $data['id'];
//            $updatedPrice = $data['price'];
//            $updatedBedroom = $data['bedroom'];
//            $updatedBathroom = $data['bathroom'];
//            $updatedSize = $data['size'];
//            $updatedAddress = $data['address'];
//            
//        } else {
//            echo "no data";
//        }
//

        
        ?>

        <h2>Edit House Details</h2>
        <form action="" method="post">
            <label for="id">id:</label><br>
            <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br>

            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>

            <label for="beds">Bedroom:</label><br>
            <input type="number" id="bedroom" name="bedroom" value="<?php echo $bedroom; ?>"><br>

            <label for="ba">Bathroom:</label><br>
            <input type="number" id="bathroom" name="bathroom" value="<?php echo $bathroom; ?>"><br>

            <label for="size">Size:</label><br>
            <input type="text" id="size" name="size" value="<?php echo $size; ?>"><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br>

            <input type="submit" name="submit" value="Update"><br>
        </form>
    </body>
</html>
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>House Details</title>
        <style>
            table, th, td {
                border: 1px solid;
                padding: 10px;
            }
            table {
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        session_start();
        
        $conn = new mysqli("localhost", "root", "", "user");
        $id = $price = $bathroom = $bedroom = $size = $address = "";

        $db = new mysqli("localhost", "root", "", "user");

        // Check if the form is submitted
        if (isset($_POST["submit"])) {
                        $price = $_POST["price"];
            $bedroom = $_POST["bedroom"];
            $bathroom = $_POST["bathroom"];
            $size = $_POST["size"];
            $address = $_POST["address"];

            $sql = "UPDATE house SET bedroom='$bedroom', bathroom='$bathroom', size='$size', address='$address' WHERE  price='$price'";
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully.";
                $updatedData = json_encode($_POST);
                $_SESSION['updatedData'] = $updatedData;
                header("location:logout.php");
            } else {
                echo "Error updating record: " . $db->error;
            }
        }

        if (isset($_SESSION['updatedData'])) {
            // Display the updated data if available
            $updatedData = $_SESSION['updatedData'];
            $data = json_decode($updatedData, true);

          
            $price = $data['price'];
            $bedroom = $data['bedroom'];
            $bathroom = $data['bathroom'];
            $size = $data['size'];
            $address = $data['address'];
        } 
        ?>

        <h2>Edit House Details</h2>
        <form action="" method="post">
           
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>

            <label for="bedroom">Bedroom:</label><br>
            <input type="number" id="bedroom" name="bedroom" value="<?php echo $bedroom; ?>"><br>

            <label for="bathroom">Bathroom:</label><br>
            <input type="number" id="bathroom" name="bathroom" value="<?php echo $bathroom; ?>"><br>

            <label for="size">Size:</label><br>
            <input type="text" id="size" name="size" value="<?php echo $size; ?>"><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br>

            <input type="submit" name="submit" value="Update"><br>
        </form>
    </body>
</html>
