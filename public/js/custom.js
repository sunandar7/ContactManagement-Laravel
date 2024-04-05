$(document).ready(function() {

    // Show modal box when the fa-eye button in the contact lists table is clicked to display contact info
    $(document).on('click', '.view-btn', function() {
        $('#contact_detail_modal').load($(this).data('href'), function() {
            $(this).modal('show');

        });
    });

    // Show flash message using toast
    $('.toast').toast('show');

    // Hide the toast message after 5 seconds
    setTimeout(function() {
        $('.toast').toast('hide');
    }, 5000); 

    // Implement the search function to filter the search results
    $('#search').on('keyup', function(){
        let searchValue = $(this).val().toLowerCase();
        // console.log(searchValue);
        $('#contact_table tbody tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
        });

        if($('#contact_table tbody tr:visible').length == 0) {
            // Remove existing "No contacts found" message if present
            $('#no-results').remove();
            // Append "No contacts found" message to table body
            $('#contact_table tbody').append('<tr id="no-results"><td colspan="4" class="text-danger text-center">No contacts found!</td></tr>');
        } else {
            // Remove the "No contacts found" message if there are matching records
            $('#no-results').remove();
        }
    });
});