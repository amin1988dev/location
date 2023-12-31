<!DOCTYPE html>
<html>
<head>
    <title>Geolocalizzazione e Geocoding</title>
</head>
<body>
    <p>La tua posizione e l'indirizzo verranno visualizzati qui sotto:</p>
    <p id="position"></p>
    <p id="address"></p>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(sendPositionToServer);
            } else {
                document.getElementById('position').innerHTML = "La geolocalizzazione non è supportata da questo browser.";
            }
        }

        function sendPositionToServer(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            document.getElementById('position').innerHTML = "Latitudine: " + lat + "<br>Longitudine: " + lon;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "geocode.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status == 200) {
                    document.getElementById('address').innerHTML = "Indirizzo: " + xhr.responseText;
                }
            };
            xhr.send("lat=" + lat + "&lon=" + lon);
        }

        // Chiamata iniziale per ottenere la posizione
        getLocation();
    </script>
</body>
</html>
