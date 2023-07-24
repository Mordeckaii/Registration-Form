// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function () {
  // Get the form element and the errors list
  var form = document.getElementById("contact-form");
  var errorsList = document.querySelector(".errors");

  // Function to validate the form on submit
  function validateForm(event) {
    // Clear any existing errors
    errorsList.innerHTML = "";

    // Get the form inputs
    var nameInput = document.getElementById("name");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var phoneNumberInput = document.getElementById("phone_number");
    var genderInput = document.querySelector('input[name="gender"]:checked');
    var languageInput = document.getElementById("language");
    var zipCodeInput = document.getElementById("zip_code");
    var messageInput = document.getElementById("message");

    // Create an array to store the errors
    var errors = [];

    // Validate each input
    if (nameInput.value.trim() === "") {
      errors.push("Name is required");
    }

    if (emailInput.value.trim() === "") {
      errors.push("Email Address is required");
    }

    if (passwordInput.value.trim() === "") {
      errors.push("Password is required");
    }

    if (phoneNumberInput.value.trim() === "") {
      errors.push("Phone Number is required");
    }

    if (!genderInput) {
      errors.push("Gender is required");
    }

    if (languageInput.value === "") {
      errors.push("Language is required");
    }

    if (zipCodeInput.value.trim() === "") {
      errors.push("Zip Code is required");
    }

    if (messageInput.value.trim() === "") {
      errors.push("About is required");
    }

    // Display the errors, if any
    if (errors.length > 0) {
      event.preventDefault(); // Prevent form submission

      // Append each error to the errors list
      errors.forEach(function (error) {
        var li = document.createElement("li");
        li.textContent = error;
        errorsList.appendChild(li);
      });
    }
  }

  // Add the form submit event listener
  form.addEventListener("submit", validateForm);
});
