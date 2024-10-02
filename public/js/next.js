 // Get the "Class Standing" and "Exam Breakdown" links
 const classStandingLink = document.querySelector('.grading-section.active');
 const examBreakdownLink = document.querySelectorAll('.grading-section')[1];
 
 // Get the content divs
 const classStandingContent = document.getElementById('class-standing-content');
 const examBreakdownContent = document.getElementById('exam-breakdown-content');
 
 // Add event listeners to switch between sections
 classStandingLink.addEventListener('click', function(event) {
     event.preventDefault(); // Prevent default link behavior
 
     // Make "Class Standing" active and show its content
     classStandingLink.classList.add('active');
     examBreakdownLink.classList.remove('active');
     classStandingContent.classList.remove('d-none');
     examBreakdownContent.classList.add('d-none');
 });
 
 examBreakdownLink.addEventListener('click', function(event) {
     event.preventDefault(); // Prevent default link behavior
 
     // Make "Exam Breakdown" active and show its content
     examBreakdownLink.classList.add('active');
     classStandingLink.classList.remove('active');
     examBreakdownContent.classList.remove('d-none');
     classStandingContent.classList.add('d-none');
 });