

function updateNotification() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'insertBestelling.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var data = xhr.responseText;

                // Parse the JSON response into a JavaScript object
                var response = JSON.parse(data);
                // console.log(response);
                // Loop over the objects in the response array
                response.forEach(function (item) {
                    // Access the 'gebruiker' property of each object and log it
                    // console.log('item.gebruiker: ' + item.gebruiker);

                    // Send 'gebruiker' data to verstuurGebruiker.php
                    var postData = 'gebruiker=' + encodeURIComponent(item.gebruiker);
                    var xhrSend = new XMLHttpRequest();
                    xhrSend.open('POST', 'verstuurGebruiker.php', true);
                    xhrSend.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhrSend.onreadystatechange = function () {
                        if (xhrSend.readyState === XMLHttpRequest.DONE) {
                            if (xhrSend.status === 200) {
                                // console.log('Data sent successfully.');
                                // console.log(xhrSend.responseText);
                                var gebruikers = xhrSend.responseText;
                                // console.log('(gelukt) verstuurGebruiker.php: ' + gebruikers);

                                // setInterval(function () {

                                    var verstuur = 'insertGebruiker=' + encodeURIComponent(gebruikers);
                                    var xhrVerstuur = new XMLHttpRequest();
                                    xhrVerstuur.open('POST', 'insertGebruiker.php', true);
                                    xhrVerstuur.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    xhrVerstuur.onreadystatechange = function () {
                                        if (xhrVerstuur.readyState === XMLHttpRequest.DONE) {
                                            if (xhrVerstuur.status === 200) {
                                                console.log('insertGebruiker.php: ' + xhrVerstuur.responseText);
                                                // let bool1 = false;

                                                    var verstuurGeselecteerd = 'persoonDieGaatHalen=' + encodeURIComponent(xhrVerstuur.responseText);
                                                    var xhrGeselecteer = new XMLHttpRequest();
                                                    xhrGeselecteer.open('POST', 'geselecteerdeGebruiker.php', true);
                                                    xhrGeselecteer.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                    xhrGeselecteer.onreadystatechange = function () {
                                                        if (xhrGeselecteer.readyState === XMLHttpRequest.DONE) {
                                                            if (xhrGeselecteer.status === 200) {
                                                                console.log('geselecteerdeGebruiker.php: ' + xhrGeselecteer.responseText)
                                                                console.log('Data sent successfully.');
                                                                console.log('geselecteerdeGebruiker.php: ' + xhrVerstuur.responseText);
                                                                let geselecteerdeGebruikerTr = document.getElementById('geselecteerdeGebruikerTr').innerHTML = xhrGeselecteer.responseText;
                    

                                                                 
                                                            } else {
                                                                // console.error('Error sending data to verstuurGebruiker.php. Status:', xhrGeselecteer.status);
                                                            }
                                                        }
                                                    };
                                                    xhrGeselecteer.onerror = function () {
                                                        console.error('Error sending data to verstuurGebruiker.php. Network error.');
                                                    };
                                                    xhrGeselecteer.send(verstuurGeselecteerd);

                                                // console.log('Data sent successfully.');
                                                // console.log(xhrVerstuur.responseText);

                                            } else {
                                                console.error('Error sending data to insertGebruiker.php. Status:', xhrVerstuur.status);
                                            }
                                        }
                                    };
                                    xhrVerstuur.onerror = function () {
                                        console.error('Error sending data to verstuurGebruiker.php. Network error.');
                                    };
                                    xhrVerstuur.send(verstuur);
                                // }, 100000);
                                

                            } else {
                                // console.error('Error sending data to verstuurGebruiker.php. Status:', xhrVerstuur.status);
                            }
                        }
                    };
                    xhrSend.onerror = function () {
                        // console.error('Error sending data to verstuurGebruiker.php. Network error.');
                    };
                    xhrSend.send(postData);
                });

            } else {
                // console.error('Error fetching notification. Status:', xhr.status);
            }
        }
    };
    xhr.onerror = function () {
        // console.error('Error fetching notification. Network error.');
    };
    xhr.send();
}

updateNotification();

setInterval(updateNotification, 20000);
