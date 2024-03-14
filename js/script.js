function searchProducts(event) {
    event.preventDefault();
    var searchBox = document.getElementById('search_box').value.trim();
    if (searchBox !== '') {
        window.location.href = 'search.php?search=' + searchBox;
    }
}

// Function to confirm before printing receipt
function printReceiptConfirmation() {
    // Display a confirmation dialog
    var confirmation = confirm("Are you sure you want to print the receipt?");
    
    // If user confirms, proceed to print
    if (confirmation) {
        // Get the link element for printing receipt
        var printReceiptLink = document.querySelector('.print-receipt-link');
        
        // Open the link in a new tab for printing
        window.open(printReceiptLink.href, '_blank');
    }
}

// Attach the printReceiptConfirmation function to the print receipt links
var printReceiptLinks = document.querySelectorAll('.print-receipt-link');
printReceiptLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
        // Prevent the default action (following the link)
        event.preventDefault();
        
        // Call the confirmation function
        printReceiptConfirmation();
    });
});