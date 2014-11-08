<?php
/**
 * Config-file for MASUN. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
/**
 * Define MASUN paths.
 *
 */
define('MASUN_INSTALL_PATH', __DIR__ . '/..');
define('MASUN_THEME_PATH', MASUN_INSTALL_PATH . '/theme/render.php'); 
 
/**
 * Include bootstrapping functions.
 *
 */
include(MASUN_INSTALL_PATH . '/src/bootstrap.php'); 
 
/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
 
/**
 * Create the MASUN variable.
 *
 */
$masun = array();

/**
 * Site wide settings.
 *
 */
$masun['lang']         = 'sv';
$masun['title_append'] = ' | MASUN en webbtemplate';

$masun['header'] = <<<EOD
<img class='sitelogo' src='img/M-icon.png' alt='Masun Logo'/>
<span class='sitetitle'>Masun webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$masun['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Magnus Sundström (megnus@hotmail.com) | <a href='https://github.com/Megnus?tab=repositories'>Mitt GitHub med blandad kod</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

/**
 * Theme related settings.
 *
 */
$masun['stylesheet'] = 'css/style.css';
$masun['favicon']    = 'favicon.ico';

/**
 * Settings for JavaScript.
 *
 */
$masun['modernizr'] = 'js/modernizr.js';
$masun['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery
$masun['javascript_include'] = array();
//$anax['javascript_include'] = array('js/main.js'); // To add extra javascript files

/**
 * Theme related settings.
 *
 */
//$anax['stylesheet'] = 'css/style.css';
$masun['stylesheets'] = array('css/style.css');

/**
 * Google analytics.
 *
 */
$masun['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics