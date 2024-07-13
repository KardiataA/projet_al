<?php
require_once('lib/nusoap/nusoap.php');

// Chemin vers le fichier WSDL du service web SOAP
$wsdl = "http://localhost/Architecture/services/soap_service.php?wsdl";

// Créer un client SOAP
$client = new nusoap_client($wsdl, true);

// Vérifier s'il y a eu une erreur lors de la création du client
$error = $client->getError();
if ($error) {
    echo "<h2>Erreur de création du client:</h2><pre>" . $error . "</pre>";
    exit();
}

// Définir les paramètres de la méthode à appeler
$params = array('name' => 'John');

// Appeler la méthode du service web SOAP
$response = $client->call('hello', $params);

// Vérifier s'il y a eu une erreur lors de l'appel de la méthode
if ($client->fault) {
    echo "<h2>Erreur lors de l'appel:</h2><pre>";
    print_r($response);
    echo "</pre>";
} else {
    // Vérifier les erreurs de réponse
    $error = $client->getError();
    if ($error) {
        echo "<h2>Erreur de réponse:</h2><pre>" . $error . "</pre>";
    } else {
        // Afficher la réponse
        echo "<h2>Réponse:</h2><pre>";
        print_r($response);
        echo "</pre>";
    }
}
?>
