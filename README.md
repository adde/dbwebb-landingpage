dbwebb-landingpage
==================

Samlingssida för kurserna på dbwebb.se.

Installation
------------

Ändra rad 11 i inc/config.php till din egna akronym:

	// Definierar akronym (används i titel och rubrik)
	$acronym = 'din-egna-akronym';

Kopiera in filerna i roten på din www-mapp på studentserver. Klart!

Hur det fungerar
----------------

Skannar kursmapparna (htmlphp, oophp, phpmvc, javascript) och skriver ut en länk för varje kursmoment. Om mappen inte finns eller är tom skrivs en liten text ut istället.