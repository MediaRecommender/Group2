document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBtn').addEventListener('click', submitGenreSurvey);
  });

document.addEventListener('DOMContentLoaded', function() {
    const genreSongsContainer = document.getElementById('genreSongsContainer');
  
    console.log('Data to be sent:', userUname); // Log the data before sending
    // Fetch genre songs data
    fetch('http://ec2-18-191-32-136.us-east-2.compute.amazonaws.com/genreSongs', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ username: userUname })
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      // Process the received JSON data and populate the page
      console.log('Response:', data)
      displayGenreSongs(data.titles, data.artists);
    })
    .catch(error => {
      console.error('Error:', error);
      // Handle errors here
    });
  
    // Function to populate the page with genre songs data
function displayGenreSongs(songTitles, songArtists) {
    const form = document.createElement('form');
    const songsList = document.createElement('form');

    songTitles.forEach((title, index) => {
      const songItem = document.createElement('div');
      const checkboxContainer = document.createElement('checkbox-label');
      checkboxContainer.className = 'checkbox-group';

      const checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.name = 'songs[]';
      checkbox.id = 
      checkbox.value = `${title} - ${songArtists[index]}`;
      checkbox.className = 'toggle-switch';

      const sliderRound = document.createElement('span');
      sliderRound.className = 'slider-round';

      const labelText = document.createElement('span');
      labelText.className = 'label-text';
      labelText.textContent = `${title} - ${songArtists[index]}`;

      const label = document.createElement('label');
      label.className = 'checkbox-label';

      
      label.appendChild(checkbox);
      label.appendChild(labelText);
      genreSongsContainer.appendChild(label);
    });

    genreSongsContainer.appendChild(songsList);
  }
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

    
    const form = document.getElementById('genreSongsContainer');
    const formData = new FormData(form);
    const selectedGenres = formData.getAll('songs[]');
  
    const data = {
      username: userUname,
      checkedGenreSongs: selectedGenres
    };
  
    console.log('Data to be sent:', data); // Log the data before sending
  
    const url = 'http://ec2-18-191-32-136.us-east-2.compute.amazonaws.com/genreSongs/submit';
  
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
      window.location.href = 'musicRecommendation.php';
    })
    .catch(error => {
      console.error('Error:', error);
      // Handle errors here
    })
    
  }
  