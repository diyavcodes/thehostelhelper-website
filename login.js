$(document).ready(function(){
    $('#myform').on('submit', function(e){
        e.preventDefault(); // Prevent the default form submission

        var username = $('#username').val().trim();
        var email_id = $('#email_id').val().trim();

        var isValid = true;

        // Clear previous error messages
        $('#username_err').text('');
        $('#email_err').text('');

        // Basic validation
        if (username === '') {
            $('#username_err').text('Please enter your username.');
            isValid = false;
        }

        if (email_id === '') {
            $('#email_err').text('Please enter your email.');
            isValid = false;
        }

        if (isValid) {
            $.ajax({
                type: 'POST',
                url: 'login.php', // Ensure this path is correct relative to your HTML file
                data: {
                    username: username,
                    email_id: email_id
                },
                success: function(result) {
                    result = result.trim(); // Remove any extra whitespace

                    if (result === 'success') {
                        alert('Login successful!');
                        // window.location.href = 'welcome.php'; // Redirect to a welcome page or dashboard
                    } else {
                        alert('Login failed');
                    }
                },
                error: function() {
                    alert('An error occurred while submitting the form.');
                }
            });
        }
    });
});
