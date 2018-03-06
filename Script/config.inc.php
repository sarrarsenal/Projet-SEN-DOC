<?php
// Paramètres de connexion
define('DB_HOST', 'localhost'); // serveur de la base de données (localhost en général)
define('DB_USER', 'root'); // nom d'utilisateur de la base de données
define('DB_PASSWORD', ''); // mot de passe
define('DB_NAME', 'sendoc'); // nom de la base de données
$db_table = 'compteur'; // nom de la table qui sera créée à l'installation

// Paramètres du compteur
$keep = 48;	// durée de conservation (en heures) des IPs en base (défaut : 48h)
$interval = 5;	// intervalle de temps (en minutes) pour compter le nombre de connectés des X dernières minutes (défaut : 5 minutes)
$unique = 24;	// durée (en heures) pendant laquelle une IP est comptée comme unique (défaut : 24h)
$initial = 1;	// nombre initial de visiteurs au compteur
$exclude = array();	// liste des IPs (partielles ou complètes) à ne pas comptabiliser. Ex : array('127.0.0.1', '168.254.')
?>
