function random() {
    let table = document.getElementById('tabel');
    let cells = table.querySelectorAll('.gebruiker'); 
    
    let dataArray = []; 
    let randomElement;
    cells.forEach(function(cell) {
        dataArray.push(cell.textContent);
        randomElement = Math.floor(Math.random() * dataArray.length);
    });
    let geselecteerdeGebruiker = document.getElementById('geselecteerdeGebruiker');
    geselecteerdeGebruiker.innerHTML = dataArray[randomElement] + " " + "gaat drinken halen.";
    console.log('Random: ' + randomElement, dataArray[randomElement]);
    console.log(dataArray); 

    if (Notification.permission === 'granted') {
        // If the browser supports notifications and permission is granted
        showNotification();
    } else if (Notification.permission !== 'denied') {
        // If the browser supports notifications but permission is not yet granted
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                showNotification();
            }
        });
    }
    
    function showNotification() {
        const notification = new Notification('Desktop Notification', {
            body: dataArray[randomElement] + " " + "gaat drinken halen.",
            title: "test",
            icon: '../melding/icon.png' // You can provide an icon URL here
        });
    
        // Optional: handle notification click event
        notification.onclick = function(event) {
            // Handle notification click behavior here
            console.log('Notification clicked');
        };
    }
}

document.getElementById('triggerButton').addEventListener('click', function () {
    let test = document.getElementById("test").value;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("epic");
        }
    }
    xhr.open("POST", "../test.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("test=" + encodeURIComponent(test));
});