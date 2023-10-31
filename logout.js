


<script>
           // Function to show the deleted message
           function showDeletedMessage() {
        const deletedMessage = document.getElementById('deleted-message');
        deletedMessage.textContent = 'Item deleted successfully';
        deletedMessage.style.display = 'block';
        deletedMessage.style.border = '2px solid green';
        deletedMessage.style.backgroundColor = 'lightgreen';
        // Optionally, you can hide the message after a few seconds
        setTimeout(function () {
        deletedMessage.style.display = 'none';
        }, 3000); // Hides the message after 3 seconds (adjust as needed)
           }

           // Function to handle the "Delete" button click
           function confirmDelete(itemContainer) {
        // Perform soft delete logic for the specific item (e.g., make an AJAX request to your server)
        // Once the item is deleted, display the deleted message
        showDeletedMessage();
        // Hide the specific item
           }

           // Add an event listener to the global delete checkbox
           function navigateToAnotherPage() {
        // Define the URL of the page you want to navigate to
        const imageUrl = "image.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = imageUrl;
           }

           // Add an event listener to the global delete checkbox
           function navigateToOfferPage() {
        // Define the URL of the page you want to navigate to
        const offerUrl = "offers.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = offerUrl;
           }
           
           function navigateToPreviewPage() {
        // Define the URL of the page you want to navigate to
        const previewUrl = "preview.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = previewUrl;
           }
           function navigateToEditPage() {
        // Define the URL of the page you want to navigate to
        const editUrl = "edit.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = editUrl;
           }
           function navigateToDeletePage() {
        // Define the URL of the page you want to navigate to
        const deleteUrl = "delete.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = deleteUrl;
           }
           
              function navigateToAddPage() {
        // Define the URL of the page you want to navigate to
        const addUrl = "Add.php"; // Replace with the actual URL

        // Use window.location.href to navigate to the specified URL
        window.location.href = addUrl;
           }
</script>



