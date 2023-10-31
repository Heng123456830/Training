<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/new_listing.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include 'header.php';

        // Database connection
        $conn = new mysqli("localhost", "root", "", "user");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Handle form submission
        if (isset($_POST['beds']) && isset($_POST['baths']) && isset($_POST['area']) && isset($_POST['city']) && isset($_POST['postCode']) && isset($_POST['street']) && isset($_POST['streetNr']) && isset($_POST['price'])) {
            $beds = $_POST['beds'];
            $baths = $_POST['baths'];
            $area = $_POST['area'];
            $city = $_POST['city'];
            $postCode = $_POST['postCode'];
            $street = $_POST['street'];
            $streetNr = $_POST['streetNr'];
            $price = $_POST['price'];

            // Insert the new listing into the database
            $sql = "INSERT INTO listings VALUES ('$price','$baths', '$beds', '$area', '$postCode', '$street', '$streetNr', '$city' )";

            if ($conn->query($sql) === TRUE) {
                
                header("location:user_listings.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
        ?>

        <form action="" method="post" class="horizontal-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="beds">Beds:</label>
                    <input type="number" id="beds" name="beds" required>
                </div>

                <div class="form-group">
                    <label for="baths">Baths:</label>
                    <input type="number" id="baths" name="baths" required>
                </div>

                <div class="form-group">
                    <label for="area">Area:</label>
                    <input type="text" id="area" name="area" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" style="padding-left:220px;"required>
                </div>

                <div class="form-group">
                    <label for="postCode"style="margin-left:130px;">Post Code:</label>
                    <input type="text" id="postCode" name="postCode" style="margin-left:130px;"required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street"  style="padding-left:220px;" required>
                </div>

                <div class="form-group">
                    <label for="streetNr"style="margin-left:130px;">Street Nr:</label>
                    <input type="text" id="streetNr" name="streetNr" style="margin-left:130px;"required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" style="padding-left:480px;"required>
                </div>
            </div>

            <button type="submit">Create</button>
        </form>
    </body>
</html>
