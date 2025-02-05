$(document).ready(function(){
    $('#myform').on('submit', function(e){
        e.preventDefault(); // Prevent the default form submission

        var username = $('#username').val();
        var email_id = $('#email_id').val();
        var college_name = $('#college_name').val();


        // Clear previous errors
        $('#username_err').text('');
        $('#college_err').text('');

        var isValid = true;

        if (username === '') {
            $('#username_err').text('Username is required');
            isValid = false;
        }

        if (email_id === '') {
            $('#email_err').text('Email ID is required');
            isValid = false;
        }
        
        if (college_name === '') {
            $('#college_err').text('College Name is required');
            isValid = false;
        }

        if (isValid) {
            $.ajax({
                type: 'POST',
                url: 'signup.php', // Ensure this path is correct relative to your HTML file
                data: {
                    username: username,
                    email_id: email_id,
                    college_name: college_name
                },
                success: function(response) {
                    alert('Form submitted successfully!');
                    console.log(response);
                    $('#myform')[0].reset(); // Reset form fields
                },
                error: function() {
                    alert('An error occurred while submitting the form.');
                }
            });
        }
    });
});
