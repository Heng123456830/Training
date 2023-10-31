<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offer Information</title>
        <link href="css/offers.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include "header.php";
        session_start();
        ?>

        <a href="logout.php">Go to the Listing</a>

        <div class="container">
            <div class="offers">
                <?php
                if (isset($_SESSION['offerValue']) && isset($_SESSION['offerDate'])) {
                    $offerValue = $_SESSION['offerValue'];
                    $offerDate = $_SESSION['offerDate'];

                    echo "Offer Value: $offerValue<br>";
                    echo "Offer Date: $offerDate<br>";
                } else {
                    echo "Offer information not found.";
                }
                ?>
            </div>

            <div class="grid-item">
                <p>Basic Info</p>
                <h3 style="font-size:25px;">$1,196,549</h3>
                <div style="font-size:20px;">3 bds | 2 ba | 44 m<sup>2</sup></div>
                <span style="font-size:20px;">Julien Avenue 36, West Alex</span>
            </div>
        </div>
    </body>
</html>
