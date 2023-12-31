<?php
$db_username = '';
$db_password = '';
$dbname = '';
$conn = new PDO('mysql:host=localhost;dbname='.$dbname, $db_username, $db_password);
if (!$conn) {
    die("Fatal Error: Connection Failed!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $bingMapsKey = 'LA_TUA_CHIAVE_API'; 

    $url = "http://dev.virtualearth.net/REST/v1/Locations/$lat,$lon?o=json&key=$bingMapsKey";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    if (isset($data['resourceSets'][0]['resources'][0]['address']['formattedAddress'])) {
        $address = $data['resourceSets'][0]['resources'][0]['address']['formattedAddress'];

        // Preparazione della query SQL
        $stmt = $conn->prepare("INSERT INTO geolocations (latitude, longitude, address) VALUES (:lat, :lon, :address)");

        // Associa i valori ai parametri
        $stmt->bindValue(':lat', $lat);
        $stmt->bindValue(':lon', $lon);
        $stmt->bindValue(':address', $address);

        // Esecuzione della query
        $stmt->execute();

        echo "Indirizzo trovato e salvato: " . $address;
    } else {
        echo "Indirizzo non trovato.";
    }
} else {
    echo "Metodo non supportato.";
}

// Chiusura esplicita della connessione (opzionale)
$conn = null;
