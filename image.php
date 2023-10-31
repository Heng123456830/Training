<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Image Upload</title>
        <link href="css/image.css" rel="stylesheet">
    </head>
    <body>

        <?php
        include "header.php";
      
        ?>

        <?php
// Initialize the $success_message variable
        $success_message = "";

// Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['my_image'])) {
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Process each uploaded image
            $uploaded_images = [];
            foreach ($_FILES['my_image']['tmp_name'] as $key => $tmp_name) {
                $img_name = $_FILES['my_image']['name'][$key];
                $img_size = $_FILES['my_image']['size'][$key];
                $img_error = $_FILES['my_image']['error'][$key];

                if ($img_error === 0) {
                    if ($img_size <= 125000) { // Adjust the file size limit as needed
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png");

                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                            $img_upload_path = 'images/' . $new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);

                            // Store the image URL in an array
                            $uploaded_images[] = $img_upload_path;
                        }
                    }
                }
            }

            // Insert image URLs into the database
            foreach ($uploaded_images as $image_url) {
                $sql = "INSERT INTO image (image_url) VALUES ('$image_url')";
                if ($conn->query($sql) === TRUE) {
                    // Image URL added to the database successfully
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }


            // Set the success message
            $success_message = "Images uploaded successfully.";
        }
        ?>

        <?php
// Display the success message under the header
        if (!empty($success_message)) {
            echo '<div style="background-color: lightgreen; color: black; border: 1px solid green; padding: 5px; margin-top: 10px;">' . $success_message . '</div>';
        }
        ?>

        <form id="image-upload-form" class="form-image" enctype="multipart/form-data" method="post" >
            <p>Upload New Images</p>
            <input type="file" name="my_image[]" accept="image/*" multiple>
            <input type="submit" name="submit" value="Upload">
            <input type="reset" id="reset-button" value="Reset">
        </form>

        <div class="uploaded-images" id="uploaded-images">
            <?php
            
            if (!empty($uploaded_images)) {
                // Display the uploaded images under the form
                foreach ($uploaded_images as $image_url) {
                    echo '<div class="uploaded-image-container">';
                    echo '<img src="' . $image_url . '" alt="Uploaded Image" /><br>';
                    echo '<button class="delete-button" data-image-url="' . $image_url . '">Delete</button>';

                    echo '</div>';
                }
            }
            ?>
        </div>

        
               


        </body>
    </html>
