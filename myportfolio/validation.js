function validateForm() {
  
  // Validate name
  const nameInput = document.getElementById('name').value;
  const nameRegex = /^[a-zA-Z\s]+$/; // Ensures only letters and spaces are allowed
  if (nameInput.trim() === "" || !nameRegex.test(nameInput)) {
    alert("Please enter a valid name without numbers.");
    return false;
  }

  // Validate email
  const emailInput = document.getElementById('email').value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput)) {
    alert("Please enter a valid email address.");
    return false;
  }

  // Validate phone
  const phoneInput = document.getElementById('phone').value;
  const numericPhone = phoneInput.replace(/\D/g, '');
  if (numericPhone.length !== 11) {
    alert("Please enter a valid 11-digit phone number.");
    return false;
  }

  return true; // If all validations pass, the form will be submitted.
}
