 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/logout.css">

    </head>
    <body> 

        <?php
        include 'header.php';
        session_start();

// Clear all session data
        session_unset();

// Destroy the session
        session_destroy();

// Redirect the user to the login page or another appropriate location
        ?>
        <div id="deleted-message" style="display: none;"></div>
        <h2>Your Listing</h2>
        <input type='submit' name='submit' id='submit' value='Add' onclick='navigateToAddPage()'>
        
<div class="item-container">
        <?php
         session_start();
         
         
    
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "user");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the SQL query to fetch all data from your "house" table
    $sql = "SELECT * FROM house";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there's at least one result
    if ($result->num_rows > 0) {
        // Loop through the results to display each listing
        while ($row = $result->fetch_assoc()) {
            
            echo '<div class="grid-item">';
            echo '<div class="price-info">';
            echo '<h3 style="font-size:25px">$' . $row['price'] . '</h3>';
            echo '<button type="button" class="action-button" style="margin-left:200px;" onclick="navigateToPreviewPage()">Preview</button>';
            echo '<button type="button" class="action-button" onclick="navigateToEditPage()">Edit</button>';
            echo '<button type="button" class="action-button" onclick="navigateToDeletePage()">Delete</button>';
            echo '</div>';
            echo '<div style="font-size:20px">' . $row['bedroom'] . ' | ' . $row['bathroom'] . ' | ' . $row['size'] . ' m<sup>2</sup>';
            echo '<button type="button" class="image-info" onclick="navigateToAnotherPage()">Image</button>';
            echo '</div>';
            echo '<span style="font-size:20px">' . $row['address'] . '</span>';
            echo '<button type="button" class="offers-info" style="margin-left:150px;" onclick="navigateToOfferPage()">Offers</button>';
            echo '</div>';
            
            $_SESSION['price']=$row['price'];
            $_SESSION['bedroom']=$row['bedroom'];
            $_SESSION['bathroom']=$row['bathroom'];
            $_SESSION['size']=$row['size'];
            $_SESSION['address']=$row['address'];
            
           
            
            
        }
    } else {
        echo "No data found.";
    }

    // Close the database connection
    $conn->close();
    include "logout.js";
        
    ?>
</div>

    
       


       
        

      
     
        
 

      
        
    </body>
</html>
