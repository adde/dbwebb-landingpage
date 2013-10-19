<?php
header("X-UA-Compatible: IE=edge,chrome=1");
require 'src/file-manager.php';

// Definierar akronym (används i titel och rubrik)
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

?>
<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title><?php echo $acronym; ?> @ dbwebb.se</title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
	     <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="container">

		<h1><?php echo $acronym; ?> @ dbwebb.se</h1>

		<?php 
		foreach ($courses as $course => $co): ?>
			<h2><?php echo $course; ?></h2>
			<?php
			$fm = new FileManager();
			$folders = $fm->folder($co['folder'])->sort()->get(FileManager::$GETFOLDERS);
			foreach ($folders as $folder): ?>
				<a type="button" class="btn <?php echo $co['button']; ?> btn-lg btn-block" href="<?php echo $co['folder'].$folder; ?>"><?php echo $folder; ?></a>
			<?php 
			endforeach; 
			if(count($folders) == 0): ?>
				<p>Här var det tomt. <?php echo $acronym; ?> har förmodligen inte börjat på den här kursen än. Kom tillbaka lite senare! ;)</p>
			<?php endif;
		endforeach; 
		?>

		<footer><small>Källkoden till den här sidan finns på github: <a href="https://github.com/adde/dbwebb-landingpage">https://github.com/adde/dbwebb-landingpage</a></small></footer>
		
	</div>
</body>
</html>