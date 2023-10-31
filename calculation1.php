<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mortgage Calculator</title>
    <link href="css/calculation1.css" rel="stylesheet">
   
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="image-container">
            <img src="your-image.jpg" alt="Your Image" />
        </div>

        <div class="grid-container">
            <div class="grid-item">
                <h3>$903,165</h3><span class="price_smaller">$4,052pm</span>
                <div>5 bds|2 ba|366 m<sup>2</sup></div>
                <div>Alessandra Branch 79, Christachester</div>
            </div>
            <div class="calculator">
                <p>Monthly Payment</p>
                <label for="interestRate">Annual Interest Rate <span id="IntRate">4%</span></label><br>
                <input type="range" id="interestRate" min="1" max="10" step="0.1" value="4" /><br>

                <label for="loanTerm"> Duration <span id="Duration">15 years</span></label><br>
                <input type= "range" id="loanTerm" min="5" max="30" step="1" value="15" /><br>


                <div id="results">
                    <p>Your Monthly Payment:</p>
                    <p id="monthlyPayment"></p>
                    <span>Total Amount Paid:</span><span id="totalPaid"></span><br>
                    <span>Principal Paid:<span id="principalPaid"></span> </span><br>
                    <span>Interest Paid: <span id="interestPaid"></span> </span><br>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get references to the input elements
        const interestRateInput = document.getElementById("interestRate");
        const loanTermInput = document.getElementById("loanTerm");
        const intRateSpan = document.getElementById("IntRate");
        const durationSpan = document.getElementById("Duration");

        // Add event listeners to recalculate when slider changes
        interestRateInput.addEventListener('input', function () {
            calculateMortgage();
            intRateSpan.textContent = `${interestRateInput.value}%`; // Update IntRate
        });
        loanTermInput.addEventListener('input', function () {
            calculateMortgage();
            durationSpan.textContent = `${loanTermInput.value} years`; // Update Duration
        });

        // Initial calculation
        calculateMortgage();

        function calculateMortgage() {
            const loanAmount = 900000; // You can set the initial loan amount here or get it from user input.
            const interestRate = parseFloat(interestRateInput.value);
            const loanTerm = parseInt(loanTermInput.value);

            // Calculate monthly interest rate and number of payments
            const monthlyInterestRate = interestRate / 12 / 100;
            const numberOfPayments = loanTerm * 12;

            // Calculate the monthly payment using the formula for a fixed-rate mortgage
            const monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));

            // Calculate the total amount paid over the life of the loan
            const totalPaid = monthlyPayment * numberOfPayments;

            // Calculate the total interest paid
            const totalInterestPaid = totalPaid - loanAmount;

            // Calculate the principal paid
            const principalPaid = monthlyPayment - monthlyInterestRate;

            // Update the HTML elements to display the results
            document.getElementById("monthlyPayment").textContent = ` $${monthlyPayment.toFixed(2)}`;
            document.getElementById("totalPaid").textContent = ` $${totalPaid.toFixed(2)}`;
            document.getElementById("principalPaid").textContent = ` $${principalPaid.toFixed(2)}`;
            document.getElementById("interestPaid").textContent = ` $${totalInterestPaid.toFixed(2)}`;
        }
    </script>
</body>
</html>
