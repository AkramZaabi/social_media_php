const toggleButton = document.querySelector('.dark-light');
const colors = document.querySelectorAll('.color');

colors.forEach(color => {
  color.addEventListener('click', (e) => {
    colors.forEach(c => c.classList.remove('selected'));
    const theme = color.getAttribute('data-color');
    document.body.setAttribute('data-theme', theme);
    color.classList.add('selected');
  });
});

toggleButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
});


// discussion.js

document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.querySelector('.add');
  const searchInput = document.querySelector('#search_etud');

  addButton.addEventListener('click', function () {
    const searchTerm = searchInput.value.trim();

    // Envoyer la requête AJAX vers le serveur PHP
    fetch(`search.php?searchTerm=${encodeURIComponent(searchTerm)}`)
      .then(response => response.json())
      .then(data => {
        // Mettez en œuvre la logique pour afficher les résultats côté client
        console.log(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  });
});
