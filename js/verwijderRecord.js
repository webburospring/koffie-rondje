// Get all buttons with class starting with "bestelling"
let bestellingButtons = document.querySelectorAll("[class^='bestelling']");
let fotos = document.querySelectorAll("[class^='foto']");



// Loop through all elements with class starting with "bestelling"
bestellingButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();

        fotos.forEach(function(foto) {
            let className = foto.getAttribute('class');
            console.log(className);
          });

        var buttonValue = button.value;
        let fotoValue = button.className.split(' ').find(className => className.startsWith('foto-'));
        // console.log(className);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', './upload_handler.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log('Response received');
                console.log(xhr.responseText);
            }
        };

        // Send the button value and foto value as data
        xhr.send('buttonValue=' + encodeURIComponent(buttonValue) + '&fotoValue=' + encodeURIComponent(fotos));
    });
});
