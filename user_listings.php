<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .grid-item{
                border:2px solid;
                border-style:ridge;
                padding:10px;
                margin-left:10px;
                margin-right:30px;
                width:50%;
            }
            
           
            
        </style>
    </head>
    <body>
        <?php
        include"header.php";
        
        $conn = new mysqli("localhost", "root", "", "user");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Define the SQL query to fetch all data from your "house" table
        $sql = "SELECT * FROM listings";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there's at least one result
        if ($result->num_rows > 0) {
            // Loop through the results to display each listing
            echo '<h2>Your listing</h2>';
            while ($row = $result->fetch_assoc()) {
                
                echo '<div class="grid-item">';
                echo '<div class="price-info">';
                echo '<h3 style="font-size:25px">$' . $row['price'] . '</h3>';
                echo '</div>';
                echo '<div style="font-size:20px">' . $row['bedroom'] .'beds'. ' | ' . $row['bathroom'].'ba';
                echo '</div>';
                echo '<span style="font-size:20px">' . $row['street'] . '  ' . $row['streetNr'] . ' '. $row['postCode'].',' . $row['area'] . ' '. $row['city'].'</span>';
                echo '</div><br>';
            }
        } else {
            echo "No data found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </body>
</html>
