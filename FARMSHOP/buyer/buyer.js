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

