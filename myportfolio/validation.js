function validateForm() {
  // Validate name
  const nameInput = document.getElementById('name').value;
  if (nameInput.trim() === "") {
    alert("Please enter your name.");
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

  // Other validations can be added based on your requirements.

  return true; // If all validations pass, the form will be submitted.
}