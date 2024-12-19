$(document).ready(function () {
    // Form submission handler
    $("#registrationForm").on("submit", function (e) {
      // Prevent the default form submission
      e.preventDefault();
  
      // Serialize form data
      const formData = $(this).serialize();
  
      // AJAX request to send data to PHP backend
      $.ajax({
        url: "process.php",
        type: "POST",
        data: formData,
        success: function (response) {
          $("#successMessage").html(response);
          $("#registrationForm")[0].reset(); // Reset form on success
        },
        error: function () {
          $("#successMessage").html("There was an error processing the form.");
        },
      });
    });
  });
  