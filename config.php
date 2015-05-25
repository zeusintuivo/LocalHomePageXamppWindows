<?php
function echoln($que) {
	echo $que."<br>\n";
}
/**
*  
*  This is just a simple config file to store your web root and a few other items
*  
*  Change "/www/sites/*" to the directory where you keep your sites. 
*  Add multiple directories like this:
*  
*  $dir = array("/www/sites1/*","/www/sites2/*");
*  
*/


/** directory name(s) */
$dir = array("/xamppp/htdocs/*");
					
/** Your local top level domain */
$tld = 'dav';

/*
*
*  Icon file names you would like to display next to the link to each site. 
*  In order of the priority they should be used.
*
*/
$icons = array( 'apple-touch-icon.png', 'favicon.ico' );

/*
*
*  Development tools you want displayed in the top navigation bar. Each item should be
*  an array containing keys 'name' and 'url'. An example is included (commented out) below.
*
*/
$devtools = array(
	array( 'name' => 'PHPInfo', 'url' => 'http://home.dav/phpinfo.php' ),
	array( 'name' => 'XAMPP Admin', 'url' => 'http://home.dav/xampp' ),
	array( 'name' => 'phpMyAdmin', 'url' => 'http://home.dav/phpmyadmin/' ),
	array( 'name' => 'Github', 'url' => 'http://github.com/you' ),
	array( 'name' => 'TIMESheets', 'url' => 'https://home.dav/timer' ),
	array( 'name' => 'Somesite', 'url' => 'http://localhost:8081/' ),
	array( 'name' => 'Somesite2', 'url' => 'http://localhost:8082/' ),

	);

/*
*
*  Options for sites being displayed. These are completely optional, if you don't set
*  anything there are default options which will take over.
*
*  If you only want to specify a display name for a site you can use the format:
*
*  'sitedir' => 'Display Name',
*
*  Otherwise, if you want to set additional options you'll use an array for the options.
*
*  'sitedir' => array( 'displayname' => 'Display Name', 'adminurl' => 'http://example.sites.dav/admin' ),
*
*/			

$siteoptions = array(
//   'dirname' => 'Display Name',
	'dirname' =>  array( 'displayname' => 'codeigniter', 
		'adminurl' => 'http://codeigniter.dav/' ),

);
/*
*
*  Directory names of sites you want to hide from the page. If you're using multiple directories
*  in $dir be aware that any directory names in the array below that show up in any of 
*  your directories will be hidden.
* 
*/
$hiddensites = array( 'home', "css", "docs", "logs", "cgi-bin", "img", "index.php", 
	"config.sample.php", "config.php", "info.php", "README.md",
	"access_log", "error_log", "phpinfo", "index.html", "restricted","forbidden",
	"apache_pb.png", "dashboard" ,"apache_pb2.png", "applications.html", "favicon.ico",
	"apache_pb.gif", "apache_pb2.gif","apache_pb2_ani.gif", "bitnami.css", 	"index_redirec.php", 
		"desktop.ini", "LocalHomePage", "xampp"
		
);
//$ignore_array = array("css", "docs", "logs", "cgi-bin", "img", "index.php", "config-sample.php", "config.php", "info.php", "README.md");
