<h1>Descrizione</h1>
Questo progetto è un semplice esempio di applicazione web che utilizza la geolocalizzazione del browser per ottenere le coordinate dell'utente (latitudine e longitudine) e le invia a un server backend. Il server, utilizzando Bing Maps Geocoding API, converte queste coordinate in un indirizzo postale e lo salva in un database MySQL.
<h1>Funzionalità</h1>
Rilevamento della posizione geografica dell'utente.
Conversione delle coordinate geografiche in un indirizzo postale tramite Bing Maps Geocoding API.
Salvataggio delle informazioni di geolocalizzazione in un database MySQL.
<h1>Tecnologie Utilizzate</h1>
HTML e JavaScript per il frontend.
PHP e PDO per il backend.
MySQL per il database.
Bing Maps Geocoding API.
<h1>Prerequisiti</h1>
Per eseguire questo progetto, avrai bisogno di:

Un server web con supporto PHP (come Apache o Nginx).
Un database MySQL.
Una chiave API per Bing Maps Geocoding API.
<h1>Configurazione</h1>
<h1></h1>Configurazione del Database</h1>
<ul>
    <li>Crea un database MySQL.</li>
<li>All'interno del database, crea una tabella denominata geolocations con la seguente struttura:</li>
</ul>
```
CREATE TABLE geolocations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    address VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
<h1>Configurazione del Backend</h1>
Modifica il file geocode.php inserendo le tue credenziali di accesso al database MySQL nelle variabili $db_username, $db_password e $dbname.
<h1>Configurazione API Key</h1>
Sostituisci LA_TUA_CHIAVE_API con la tua chiave API di Bing Maps nel file geocode.php.
<h1>Utilizzo</h1>
Per utilizzare l'applicazione, apri index.php in un browser web. Dovresti vedere la tua posizione (latitudine e longitudine) e l'indirizzo corrispondente visualizzati sulla pagina.

<h1>Note</h1>
Assicurati che il tuo server web supporti PHP e che il tuo server MySQL sia operativo.
Questa applicazione richiede l'accesso a Internet per utilizzare Bing Maps Geocoding API.
