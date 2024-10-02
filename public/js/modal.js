// Function to open the modal and set the input values
document.getElementById('classStandingModal').addEventListener('show.bs.modal', function () {
  const classStandingHeader = document.querySelector('.table thead th:nth-child(3)').innerText;
  
  // Split the header to get the class standing and percentage
  const [classStanding, percentage] = classStandingHeader.split(': ').map(item => item.replace('%', '').trim());

  // Pre-fill modal input fields with current values
  document.getElementById('class_standing').value = classStanding;
  document.getElementById('percentage').value = percentage;
});

// Handle form submission
document.querySelector('form').addEventListener('submit', function(event) {
  // Prevent default form submission
  event.preventDefault();

  const classStanding = document.getElementById('class_standing').value.trim();
  const percentage = document.getElementById('percentage').value.trim();
  const assessmentType = document.getElementById('assessment_type').value.trim();
  const assessmentPercentage = document.getElementById('assessment_percentage').value.trim();

  // Basic validation
  if (!classStanding || !percentage || !assessmentType || !assessmentPercentage) {
    alert('Please fill out all fields.');
    return;
  }

  // Update the Class Standing header with the '%' symbol correctly included
  const classStandingHeader = document.querySelector('.table thead th:nth-child(3)');
  classStandingHeader.innerHTML = `${classStanding}: ${percentage}%`;

  // Submit the form
  this.submit(); // Submits the form after validation
});
