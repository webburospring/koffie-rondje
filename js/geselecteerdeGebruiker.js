// // Parse the JSON-encoded array directly in JavaScript
// // var gebruikers = <?php echo $gebruikers_json; ?>;

// var tests = [];
// // Loop through each element in the gebruikers array
// for (var i = 0; i < gebruikers.length; i++) {
//     var variableName = 'test' + (i + 1);
//     window[variableName] = gebruikers[i];
//     tests.push(variableName);
// }

// // Console log each variable
// tests.forEach(function (test) {
//     console.log(test + ": ", window[test]);
// });

// // Log one random element from the array
// var randomIndex = Math.floor(Math.random() * gebruikers.length);
// var randomElement = gebruikers[randomIndex];
// console.log("Random element: ", randomElement);

// // XHR

// var xhr = new XMLHttpRequest();
// xhr.open('GET', 'geselecteerdeGebruiker.php', true);
// xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

// xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//         console.log('aangekomen');
//         console.log(xhr.responseText);
//     }
// };
// //  echo $gebruikersarray[$random_key]; ?>
// // Send the randomly selected element to the PHP page
// xhr.send('geselecteerdeGebruiker=' + encodeURIComponent(randomElement));
// setTimeout(function () {
//     let elements = document.getElementsByClassName("geselecteerdeGebruiker");

//     for (let i = 0; i < elements.length; i++) {
//         elements[i].classList.add("border");
//     }
//     document.getElementById("delayed-content").value = randomElement;
// }, 10000); // 10 seconds delay
