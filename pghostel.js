$(document).ready(function() {
    $('#search-button').click(function() {
        var selectedArea = $('#dropdown2').val();
        console.log("Selected area:", selectedArea); 

        if (selectedArea && selectedArea !== 'Select') {
            $.ajax({
                url: 'pghostel.php',
                type: 'POST',
                data: { area: selectedArea },
                success: function(response) {
                    $('#hostel-results').html(response);
                },
                error: function() {
                    $('#hostel-results').html('<p>An error occurred while fetching data.</p>');
                }
            });
        } else {
            $('#hostel-results').html('<p>Please select an area.</p>');
        }
    });
});
