<?php
//
session_start();
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>HOMEPAGE</title>
        <link rel="stylesheet" href="css/index.css">
        <style>
         .section-container {
            display: inline;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .grid-item {
            width: 23%; /* Adjust this to control the width of each item */
            margin: 0 1% 20px 0;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0px 2px 2px #888888;
        }
        </style>
    </head>
    <body>

        <?php
        include 'header.php';

        if (isset($_SESSION["successMessage"])) {
            echo '<p class="success">' . $_SESSION["successMessage"] . '</p>';
            unset($_SESSION["successMessage"]);
        }// Clear the success message to prevent displaying it againi

        $conn = new mysqli("localhost", "root", "", "user");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['filter'])) {
         
           
            $bedroom = $_POST['bedroom'];
            $bathroom = $_POST['bathroom'];
                      

            // Build SQL query based on filter criteria
            $sql = "SELECT * FROM house2 WHERE 1";

            if (!empty($bedroom)) {
                $sql .= " AND bedroom = '$bedroom'";
            }

            if (!empty($bathroom)) {
                $sql .= " AND bathroom = '$bathroom'";
            }

           
            if (  !empty($bathroom) && !empty($bedroom)) {
                $sql .= " ";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display the filtered items
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="calculation1.php" style="text-decoration:none; color:black;"><div class = "section-container">';
                    echo '<div class="grid-item">';
                    echo '<h3>$' . number_format($row["price"]) . '</h3>';
                    echo '<span class="price_smaller">$' . number_format($row["small_price"]) . 'pm</span>';
                    echo '<div>' . $row["bedroom"] . ' bds|' . $row["bathroom"] . ' ba|' . $row["size"] . ' m<sup>2</sup></div>';
                    echo '<div>' . $row["address"] . '</div>';
                    echo '</div>';
                    echo'</div>';
                    echo '</a>';
                }

                if (isset($_POST['clear'])) {
                    header("location:index.php");
                }
            }
        }
            // Close the database connection
            $conn->close();
            ?>



        <form action='' method='post'>
           

            <table class="listing">
                <tr>
                    <td>
                        <select id="bedroom" name="bedroom">
                            <option value="">Beds</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </td>
                    <td>
                        <select id="bathroom" name="bathroom">
                            <option value="">Baths</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </td>
                </tr>
            </table>

          

            <input type="submit" name="filter" value="Filter">
            <input type="submit" name="clear" value="clear">
        </form>















    </body>

</html>
