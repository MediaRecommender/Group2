document.addEventListener('DOMContentLoaded', function() {
    const genreSongsContainer = document.getElementById('genreSongsContainer');
  
    console.log('Data to be sent:', userUname); // Log the data before sending
    // Fetch genre songs data
    fetch('http://ec2-18-191-32-136.us-east-2.compute.amazonaws.com/playlist', {
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
      displaySongs(data.titles, data.artists);
    })
    .catch(error => {
      console.error('Error:', error);
      // Handle errors here
    });
  
    // Function to populate the page with genre songs data
function displaySongs(songTitles, songArtists) {
    const form = document.createElement('form');
    const songsList = document.createElement('form');

    songTitles.forEach((title, index) => {
      const songItem = document.createElement('div');
      const checkboxContainer = document.createElement('checkbox-label');
      checkboxContainer.className = 'checkbox-group';

      const checkbox = document.createElement('div');
      checkbox.name = 'songs[]';
      checkbox.id = 
      checkbox.value = `${title} - ${songArtists[index]}`;
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