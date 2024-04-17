// Get all buttons with class starting with "bestelling"
let bestellingButtons = document.querySelectorAll("[class^='bestelling']");

// Loop through all elements with class starting with "bestelling"
bestellingButtons.forEach(function(button) {
    // Add click event listener to each button
    button.addEventListener('click', function(event) {
 


        // Prevent default form submission
        event.preventDefault();
        bestellingButtons.forEach(function(btn) {
            btn.disabled = true;
        });
        let imgGrijs = document.getElementsByClassName('imgGrijs');
        for (let i = 0; i < imgGrijs.length; i++) {
            imgGrijs[i].style.filter = "grayscale(100%)";
        }
        // Get the value of the clicked button
        var buttonValue = button.value;

        // Create AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insertBestelling.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let response = xhr.responseText;
                // console.log(response);
                
            }
        };
        
        // Send the button value as the data
        xhr.send('buttonValue=' + encodeURIComponent(buttonValue));
  
    });
});

 