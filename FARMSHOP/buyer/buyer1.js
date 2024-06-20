
function addToCart(buyer_id, product_id) {

  fetch('addtocart.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `buyer_id=${encodeURIComponent(buyer_id)}&product_id=${encodeURIComponent(product_id)}`,
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(data => {
      console.log(data); // Log the response from addToCart.php
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}

var dd_main = document.querySelector(".dd_main");

dd_main.addEventListener("click", function() {
  this.classList.toggle("active");
});



function showDropdown() {
  var dropdownContent = document.getElementById("dropdown-content");
  dropdownContent.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}




// Function to show a specific section and hide others
function showSection(sectionId) {
  // Hide all sections
  const sections = document.querySelectorAll('section');
  sections.forEach(section => {
    section.classList.add('hidden');
  });

  // Show the selected section
  const selectedSection = document.getElementById(sectionId);
  if (selectedSection) {
    selectedSection.classList.remove('hidden');
  }
}

function search() {
  var input = document.getElementById("searchInput").value.toLowerCase();
  var cards = document.querySelectorAll('.card');

  cards.forEach(card => {
    var productName = card.querySelector('h3').textContent.toLowerCase();

    if (productName.includes(input)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}
