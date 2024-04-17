$(document).ready(function() {
    function updateNotification() {
        $.ajax({
            url: 'geselecteerdeGebruikerAjax.php',
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                // console.log(data);
                // let demo = document.getElementById('demo').innerHTML = data;
                // $('#geselecteerdeGebruikerTr').text(data);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching notification:', error);
            }
        });
    }

    updateNotification();
    
    setInterval(updateNotification, 5000); 
});
