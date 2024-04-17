function refreshDiv() {
    $('#refreshContent').load(location.href + ' #refreshContent > *', function() {
        console.log('Content refreshed.');
    });
}

setInterval(function () {
    $('#refreshContent').load(location.href + ' #refreshContent > *', function() {
        console.log('Content refreshed.');
    });
}, 5000);
