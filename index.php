<!DOCTYPE html>

<?php require('config.php'); ?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Local</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<div class="canvas">

		<header>
			<h1>Local</h1>
			<h6>( DOTS ... In folders inside htdocs or www break the system. Use _ instead of dots )</h6>

			<nav>
				<ul>
<?php

foreach ( $devtools as $tool ) {
	// printf ( '<li><a href="%1$s">%2$s</a></li>', $tool ['url'], );
	echo '<li><a href="' . $tool ['url'] . '">' . $tool ['name'] . '</a></li>';
}
?>
			        </ul>
			</nav>

		</header>

		<content class="cf">
<?php

foreach ( $dir as $d ) {
	$dirsplit = explode ( '/', $d );
	$dirname = $dirsplit [count ( $dirsplit ) - 1];
	// DEBUG echoln ( "Checking:$d / $dirname" );
	// printf ( '<ul class="sites %1$s">', $dirname );
	echo '<ul class="sites ' . $dirname . '">';
	
	// DEBUG foreach ( glob ( "$dirname" ) as $filename ) {
	// echoln ( $filename . "size " . filesize ( $filename ) );
	// }
	foreach ( glob ( "$dirname" ) as $file ) {
		
		// echoln("Checking:$file<br>");
		
		$project = basename ( $file );
		
		// Ignore line
		if (in_array ( $project, $hiddensites ))
			continue;
		
		echo '<li>';
		
		// $siteroot = sprintf( 'http://%1$s.%2$s.%3$s', $project, $dirname, $tld );
		// $siteroot = sprintf ( 'http://%1$s.%2$s', $project, $tld );
		$siteroot = 'http://' . $project . '.' . $tld;
		
		// Display an icon for the site
		$icon_output = '<span class="no-img"></span>';
		foreach ( $icons as $icon ) {
			
			if (file_exists ( $file . '/' . $icon )) {
				// $icon_output = sprintf ( '<img src="%1$s/%2$s">', $siteroot, $icon );
				$icon_output = '<img src="' . $siteroot . '/' . $icon . '">';
				break;
			} // if ( file_exists( $file . '/' . $icon ) )
		} // foreach( $icons as $icon )
		echo $icon_output;
		
		// Display a link to the site
		$displayname = $project;
		if (array_key_exists ( $project, $siteoptions )) {
			if (is_array ( $siteoptions [$project] ))
				$displayname = array_key_exists ( 'displayname', $siteoptions [$project] ) ? $siteoptions [$project] ['displayname'] : $project;
			else
				$displayname = $siteoptions [$project];
		}
		// printf ( '<a class="sites" href="%1$s">%2$s</a>', $siteroot, $displayname );
		echo ('<a class="sites" href="' . $siteroot . '">' . $displayname . '</a>');
		
		// Display an icon with a link to the admin area
		$adminurl = '';
		// We'll start by checking if the site looks like it's a WordPress site
		// DEBUG echoln ( "Checking:$file<br>" );
		if (is_dir ( $file . '/wp-admin' )) {
			// $adminurl = sprintf ( 'http://%1$s/wp-admin', $siteroot );
			$adminurl = 'http://' . $siteroot . '/wp-admin';
		}
		// We'll start by checking if the site looks like it's a HTML Style Folder site
		// DEBUG echoln ( "Checking:$file<br>" );
		if (is_dir ( $file . '/html' )) {
			// $adminurl = sprintf ( 'http://%1$s/', $siteroot );
			$adminurl = 'http://' . $siteroot;
		}
		//
		// If the user has defined an adminurl for the project we'll use that instead
		if (isset ( $siteoptions ['displayname'] ) && is_array ( $siteoptions [$project] ) && array_key_exists ( 'adminurl', $siteoptions [$project] ))
			$adminurl = $siteoptions [$project] ['adminurl'];
			
			// If there's an admin url then we'll show it - the icon will depend on whether it looks like WP or not
		if (! empty ( $adminurl )) {
			$is_dire = is_dir ( $file . '/wp-admin' ) ? 'wp' : 'admin';
			printf ( '<a class="%2$s icon" href="%1$s">Admin</a>', $adminurl, $is_dire );
			// echo '<a class="' . $adminurl . ' icon" href="' . $is_dire . '">Admin</a>';
		}
		
		echo '</li>';
	} // foreach( glob( $d ) as $file )
	
	echo '</ul>';
} // foreach ( $dir as $d )
?>
			</content>



		<footer class="cf">
			<p></p>
		</footer>

	</div>
</body>
</html>
