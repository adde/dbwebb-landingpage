<?php
header("X-UA-Compatible: IE=edge,chrome=1");
require 'src/file-manager.php';

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
	<title>anjh13 - dbwebb kurspaket</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
	     <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="container">

		<h1 class="text-primary">anjh13 @ dbwebb.se</h1>

		<?php 
		foreach ($courses as $course => $co): ?>
			<h2><?php echo $course; ?></h2>
			<?php
			$fm = new FileManager();
			$folders = $fm->folder($co['folder'])->sort()->get(FileManager::$GETFOLDERS);
			foreach ($folders as $folder): ?>
				<a type="button" class="btn <?php echo $co['button']; ?> btn-lg btn-block" href="<?php echo $folder; ?>"><?php echo $folder; ?></a>
			<?php 
			endforeach; 
			if(count($folders) == 0): ?>
				<p>Här var det tomt. Andreas har förmodligen inte börjat på den här kursen än.</p>
			<?php endif;
		endforeach; 
		?>
		
	</div>
</body>
</html>