
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>header</title>
        <link rel="stylesheet" href="css/header.css">
    </head>
    <body>
        <div class="header">
            <h2><a href="index.php"style="text-decoration: none; color: black; ">Listings</a></h2>
            <h2 class="purple-header">LaraZillow</h2>
            <nav>
                <?php
               
               
                
                if (isset($_SESSION["email"])) {
                    // User is logged in, display the "Logout" button
                    echo  '<a href="user_listings.php">test user</a>';
                    echo '<a href="new_listing.php">New Posting</a>';
                    echo '<a href="logout.php">Logout</a>';
                    
                } else {
                    // User is not logged in, display the "Register" and "Sign-in" buttons
                    echo '<a href="register.php">Register</a>';
                    echo '<a href="Sign-in.php">Sign-in</a>';
                }
                ?>
            </nav>
        </div>

        <hr class="new1"><!-- Line -->
        <?php
        // put your code here
        ?>
    </body>
</html>
