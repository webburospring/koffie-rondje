$(document).ready(function () {
    // Function to fetch data from the server and update the notification
    function updateNotification() {
        $.ajax({
            url: 'insertBestelling.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the notification div with the fetched data

                // console.log("Received data:", data);

                // Loop through the array of objects
                // Iterate over the received data
                data.forEach(record => {
                    // Access the properties of each object
                    let bestelling = record.bestelling;
                    let gebruiker = record.gebruiker;
                    let table = document.getElementById('tabel');



                    // Check if the data already exists in the table
                    let exists = Array.from(table.getElementsByTagName('td')).some(td => td.textContent.trim() === bestelling && td.nextElementSibling.textContent.trim() === gebruiker);

                    if (!exists) {
                        // Select the <table> element

                        // Get the number of existing rows in the table
                        let rowCount = table.rows.length;

                        // Insert a new row at the last position
                        let newRow = table.insertRow(rowCount);

                        // Insert cells into the new row
                        let cell1 = newRow.insertCell(0);
                        let cell2 = newRow.insertCell(1);

                        // Set the content of the cells
                        cell1.className = 'p-2 border tableTd';
                        cell1.textContent = bestelling;

                        cell2.className = 'p-2 border tableTd';
                        cell2.textContent = gebruiker;
                    }
                    else {
                        // Log a message if the data already exists in the table
                        // console.log("Duplicate data found: Bestelling:", bestelling, ', Gebruiker:', gebruiker);
                    }
                });
               

                // Remove 'geenBestellingen' row if it exists
                let geenBestellingen = document.getElementById('geenBestellingen');
                if (geenBestellingen) {
                    geenBestellingen.remove();
                }
                // let demo = document.getElementById('demo').innerHTML = data;
                // $('#notification').text(data.notification);
            },
            // error: function (xhr, status, error) {
            //     console.error('Error fetching notification:', error);
            // }
        });
    }

    // Call the function initially to load the notification
    updateNotification();

    // Set an interval to periodically update the notification (e.g., every 5 seconds)
    setInterval(updateNotification, 5000); // 5000 milliseconds = 5 seconds
});
