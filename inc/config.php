<?php

/**
* Konfiguration
*/

// Tvingar IE att använda senaste renderingsmotorn
header("X-UA-Compatible: IE=edge,chrome=1");

// Definierar akronym/namn (används i titel, rubrik och texter)
$acronym = 'anjh13';

// Definierar kurserna
$courses = array(
	'htmlphp' => array(
		'folder' => 'htmlphp/',
		'button' => 'btn-primary'
	),
	'oophp' => array(
		'folder' => 'oophp/',
		'button' => 'btn-success'
	),
	'phpmvc' => array(
		'folder' => 'phpmvc/',
		'button' => 'btn-warning'
	),
	'javascript' => array(
		'folder' => 'javascript/',
		'button' => 'btn-danger'
	)
);