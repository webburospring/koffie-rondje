
let interval = setInterval(function () {
    let table = document.getElementById('tabel');
    let rows = table.rows.length;
    console.log(rows);
    // let tabelGeselecteerd = document.getElementById('tabelGeselecteerd');
    let rowsGeselecteerdeGebruiker;
    let geenBestellingenElement = document.getElementById('geenBestellingen');
    // console.log(gebruiker);
    if (geenBestellingenElement) {
        let geenBestellingen = geenBestellingenElement.innerHTML;
    } else {
        if (rows === 3) {
            if (Notification.permission === 'granted') {
                // If the browser supports notifications and permission is granted
                showNotification();
                clearInterval(interval);
            } else if (Notification.permission !== 'denied') {
                // If the browser supports notifications but permission is not yet granted
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        showNotification();
                        clearInterval(interval);
                    }
                });
            }

            function showNotification() {
                const notification = new Notification('Desktop Notification', {
                    body: "Er heeft iemand drinken besteld.",
                    title: "test",
                    icon: '../melding/icon.png'
                });

                // notification.onclick = function(event) {
                //     console.log('Notification clicked');
                // };
            }
        }
        // console.log("Element with ID 'geenBestellingen' not found");
    }
}, 5000);


let interval1 = setInterval(function () {
    let rowsGeselecteerdeGebruiker = document.getElementById('tabelGeselecteerd').rows.length;
    let geenbruiker = document.getElementById('geselecteerdeGebruikerTr')
    //verwijder spaties
    geenbruiker.innerHTML = geenbruiker.innerHTML.replace(/\s/g, '');

    console.log('aantal rows' + rowsGeselecteerdeGebruiker);
    console.log();

    if (geenbruiker.innerHTML === 'geengebruiker') {
        console.log('leeg');
    } else {
        if (rowsGeselecteerdeGebruiker === 2) {

            if (Notification.permission === 'granted') {
                // If the browser supports notifications and permission is granted
                showNotificationGebruiker();
                clearInterval(interval1);
            } else if (Notification.permission !== 'denied') {
                // If the browser supports notifications but permission is not yet granted
                Notification.requestPermission().then(function (permission) {
                    if (permission === 'granted') {
                        showNotificationGebruiker();
                        clearInterval(interval1);
                    }
                });
            }

            function showNotificationGebruiker() {
                let gebruiker1 = document.getElementById('geselecteerdeGebruikerTr').innerHTML;
                console.log('' + gebruiker1);

                const gebruikerValue = gebruiker1 ? gebruiker1 : "";

                console.log('test ' + gebruikerValue);
                const notification = new Notification('Desktop Notification', {
                    body: gebruikerValue + " is geselecteerd om drinken te gaan halen",
                    title: "test",
                    icon: '../melding/icon.png'
                });

                // notification.onclick = function(event) {
                //     console.log('Notification clicked');
                // };
            }
        }
    }
}, 5000);