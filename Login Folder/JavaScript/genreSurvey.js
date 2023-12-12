document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBtn').addEventListener('click', submitGenreSurvey);
  });
  
  function submitGenreSurvey() {
    submitBtn.removeEventListener('click', submitGenreSurvey); // Disable further clicks
    
    const originalText = submitBtn.innerText; // Save original button text
    submitBtn.innerText = 'Loading'; // Initial loading text
    submitBtn.style.transition = 'background-color 0.3s ease-in-out';
    submitBtn.style.backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--secondary-blue'); // Use CSS variable for button color

    const loadingAnimation = setInterval(function() {
      switch (submitBtn.innerText) {
        case 'Loading.': submitBtn.innerText = 'Loading..'; break;
        case 'Loading..': submitBtn.innerText = 'Loading...'; break;
        case 'Loading...': submitBtn.innerText = 'Loading.'; break;
        default: submitBtn.innerText = 'Loading.'; break;
      }
    }, 500); // Change text every 0.5 seconds (500 milliseconds)

    
    const form = document.getElementById('genreForm');
    const formData = new FormData(form);
    const selectedGenres = formData.getAll('genres[]');
  
    const data = {
      username: userUname,
      checkedGenres: selectedGenres
    };
  
    console.log('Data to be sent:', data); // Log the data before sending
  
    const url = 'http://127.0.0.1:5000/genreSurvey/submit';
  
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => {
      clearInterval(loadingAnimation); // Stop the loading animation
      submitBtn.innerText = originalText; // Restore original button text
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('Response:', data);
      // Handle the response here as needed
      window.location.href = 'songSelection.php';
    })
    .catch(error => {
      console.error('Error:', error);
      // Handle errors here
    })
    
  }
  