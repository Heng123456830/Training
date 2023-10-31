<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mortgage Calculator</title>
        <link href="css/preview.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="container">
            <div class="image-container">
                <img src="images/house1.jpg" alt="" />
            </div>

            <div class="grid-container">
                <?php
                session_start();
                if (isset($_SESSION['price'])) {
                    echo '<div class="grid-container">
                <div class="grid-item">
                    <h3>$' . $_SESSION['price'] . '</h3>
                    <div>' . $_SESSION['bedroom'] . ' bds|' . $_SESSION['bathroom'] . ' ba|' . $_SESSION['size'] . ' m<sup>2</sup></div>
                    <div>' . $_SESSION['address'] . '</div>
                </div>';
                } else {
                    echo "No data in session";
                }
                session_destroy();
                ?>

                <div class="calculator">
                    <p>Monthly Payment</p>
                    <label for="interestRate">Annual Interest Rate <span id="IntRate">4%</span></label><br>
                    <input type="range" id="interestRate" min="1" max="10" step="0.1" value="4" /><br>

                    <label for="loanTerm"> Duration <span id="Duration">15 years</span></label><br>
                    <input type="range" id="loanTerm" min="5" max="30" step="1" value="15" /><br>

                    <div id="results">
                        <p>Your Monthly Payment:</p>
                        <p id="monthlyPayment"></p>
                        <span>Total Amount Paid:</span><span id="totalPaid"></span><br>
                        <span>Principal Paid:<span id="principalPaid"></span> </span><br>
                        <span>Interest Paid: <span id="interestPaid"></span> </span><br>
                    </div>
                </div>
                <div class="offers">
                    <p>Make an Offer</p>
                    <input type="number" id="offer" value="903165" min="1" /><br>
                    <input type="range" id="offer-range" max="1000000" min="1" value="903165" /><br>
                    <button id="offer-button">Make an offer</button><br>
                    <p class="offer-price">$903165</p>
                    <p><span id="offer-date"></span></p>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get references to the input elements
                const offerInput = document.getElementById("offer");
                const offerRangeInput = document.getElementById("offer-range");
                const offerButton = document.getElementById("offer-button");
                const offerPriceDisplay = document.querySelector(".offer-price");
                const intRateSpan = document.getElementById("IntRate");
                const durationSpan = document.getElementById("Duration");
                const monthlyPaymentDisplay = document.getElementById("monthlyPayment");
                const totalPaidDisplay = document.getElementById("totalPaid");
                const principalPaidDisplay = document.getElementById("principalPaid");
                const interestPaidDisplay = document.getElementById("interestPaid");
                // Add event listeners to recalculate when sliders change
                offerRangeInput.addEventListener('input', function () {
                    const offer = parseInt(offerRangeInput.value);
                    offerInput.value = offer;
                    updateOfferPrice(offer);
                });
                // Add an event listener for the "Make an offer" button
                offerButton.addEventListener('click', function () {
                    const offerAmount = parseFloat(offerInput.value);
                    displayOfferSuccess(offerAmount);


                });
                // Initial calculation
                calculateMortgage();
            });

            function updateOfferPrice(offer) {
                const offerPriceDisplay = document.querySelector(".offer-price");
                offerPriceDisplay.textContent = `$${offer}`;
            }

            function displayOfferSuccess(amount) {
                // You can customize the success message as needed
                console.log('displayOfferSuccess called');
                const offerMessage = document.getElementById('successOffer');
                offerMessage.textContent = 'Offer was made';
                offerMessage.style.display = 'block';
                offerMessage.style.border = '2px solid green';
                offerMessage.style.backgroundColor = 'lightgreen';
            }


            const interestRateInput = document.getElementById("interestRate");
            const loanTermInput = document.getElementById("loanTerm");

            // Add event listeners to recalculate when sliders change
            interestRateInput.addEventListener('input', calculateMortgage);
            loanTermInput.addEventListener('input', calculateMortgage);

            // Add an event listener for the "offer-range" input
            const offerInput = document.getElementById("offer");
            const offerRangeInput = document.getElementById("offer-range");

            offerRangeInput.addEventListener('input', function () {
                const offer = parseInt(offerRangeInput.value);
                offerInput.value = offer; // Update the offer input
                calculateMortgage(); // Recalculate the mortgage
                updateOfferPrice(offer);
            });

            interestRateInput.addEventListener('input', function () {
                calculateMortgage();
                const intRateSpan = document.getElementById("IntRate");
                intRateSpan.textContent = `${interestRateInput.value}%`; // Update IntRate
            });

            loanTermInput.addEventListener('input', function () {
                calculateMortgage();
                const durationSpan = document.getElementById("Duration");
                durationSpan.textContent = `${loanTermInput.value} years`; // Update Duration
            });

            // Initial calculation
            calculateMortgage();

            function calculateMortgage() {
                const loanAmount = parseInt(offerInput.value);
                const interestRate = parseFloat(interestRateInput.value);
                const loanTerm = parseInt(loanTermInput.value);
                const monthlyInterestRate = interestRate / 12 / 100;
                const numberOfPayments = loanTerm * 12;
                const monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
                const totalPaid = monthlyPayment * numberOfPayments;
                const totalInterestPaid = totalPaid - loanAmount;
                const principalPaid = monthlyPayment - monthlyInterestRate;

                const monthlyPaymentDisplay = document.getElementById("monthlyPayment");
                const totalPaidDisplay = document.getElementById("totalPaid");
                const principalPaidDisplay = document.getElementById("principalPaid");
                const interestPaidDisplay = document.getElementById("interestPaid");

                monthlyPaymentDisplay.textContent = `$${monthlyPayment.toFixed(2)}`;
                totalPaidDisplay.textContent = `$${totalPaid.toFixed(2)}`;
                principalPaidDisplay.textContent = `$${principalPaid.toFixed(2)}`;
                interestPaidDisplay.textContent = `$${totalInterestPaid.toFixed(2)}`;
            }

            document.getElementById("offer-button").addEventListener("click", function () {
                const offerValue = document.getElementById("offer").value;

                // Capture the current date and time
                const currentDate = new Date();
                const offerDateElement = document.getElementById("offer-date");

                const year = currentDate.getFullYear();
                const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based, so add 1
                const day = currentDate.getDate().toString().padStart(2, '0');

                const offerDate = `${year}-${month}-${day}`;

                // Update the offer date display
                offerDateElement.textContent = offerDate;
            });
        </script>
    </body>
</html>
