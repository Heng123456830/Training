<script>
document.addEventListener("DOMContentLoaded", function () {
        // Get references to the input elements
        const offerInput = document.getElementById("offer");
        const offerRangeInput = document.getElementById("offer-range");
        const offerButton = document.getElementById("offer-button");
        const offerPriceDisplay = document.querySelector(".offer-price");
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
        function updateOfferPrice(offer) {
        offerPriceDisplay.textContent = `$${offer}`;
        }

function displayOfferSuccess(amount) {
// You can customize the success message as needed
const offerMessage = document.getElementById('successOffer');
        offerMessage.textContent = 'offer was made';
        offerMessage.style.display = 'block';
        offerMessage.style.border = '2px solid green';
        offerMessage.style.backgroundColor = 'lightgreen';
        }
// Get references to the input elements

});
const interestRateInput = document.getElementById("interestRate");
        const loanTermInput = document.getElementById("loanTerm");
        const offerInput = document.getElementById("offer");
        const offerRangeInput = document.getElementById("offer-range");
        const intRateSpan = document.getElementById("IntRate");
        const durationSpan = document.getElementById("Duration");
        const monthlyPaymentDisplay = document.getElementById("monthlyPayment");
        const totalPaidDisplay = document.getElementById("totalPaid");
        const principalPaidDisplay = document.getElementById("principalPaid");
        const interestPaidDisplay = document.getElementById("interestPaid");
        const offerPriceDisplay = document.querySelector(".offer-price");
        // Add event listeners to recalculate when sliders change
        interestRateInput.addEventListener('input', calculateMortgage);
        loanTermInput.addEventListener('input', calculateMortgage);
        // Add an event listener for the "offer-range" input
        offerRangeInput.addEventListener('input', function () {
        const offer = parseInt(offerRangeInput.value);
        offerInput.value = offer; // Update the offer input
        calculateMortgage(); // Recalculate the mortgage
        updateOfferPrice(offer);
        });
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
        const loanAmount = parseInt(offerInput.value);
        const interestRate = parseFloat(interestRateInput.value);
        const loanTerm = parseInt(loanTermInput.value);
        const monthlyInterestRate = interestRate / 12 / 100;
        const numberOfPayments = loanTerm * 12;
        const monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, - numberOfPayments));
        const totalPaid = monthlyPayment * numberOfPayments;
        const totalInterestPaid = totalPaid - loanAmount;
        const principalPaid = monthlyPayment - monthlyInterestRate;
        
        monthlyPaymentDisplay.textContent = `$${monthlyPayment.toFixed(2)}`;
        totalPaidDisplay.textContent = `$${totalPaid.toFixed(2)}`;
        principalPaidDisplay.textContent = `$${principalPaid.toFixed(2)}`;
        interestPaidDisplay.textContent = `$${totalInterestPaid.toFixed(2)}`;
        }

function updateOfferPrice(offer) {
        offerPriceDisplay.textContent = `$${offer}`;
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

document.getElementById("offer-button").addEventListener("click", function () {
    const offerValue = document.getElementById("offer").value;
    const offerDate = new Date().toLocaleString();

    // Store offer information in session variables
    <?php session_start(); ?>
    <?php $_SESSION['offerValue'] = "' + offerValue + '"; ?>
    <?php $_SESSION['offerDate'] = "' + offerDate + '"; ?>

   
    
});


           
</script>