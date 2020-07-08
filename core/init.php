<?php
session_start();

$GLOBALS['config'] = array(
	'mysql'		=> array(
		'host'		=> '127.0.0.1',
		'username'	=> 'gent',
		'password'	=> 'f0rfr33d0m',
		'db'		=> 'fatjeta',
	),
	'remember'	=> array(
		'cookieName'	=> 'hash',
		'cookieExpiry'	=> 604800,	//1 Week
	),
	'session'	=> array(
		'sessionName'	=> 'user',
		'tokenName'		=> 'token'
	)
);

spl_autoload_register(function($class) {
	require_once 'classes/'.$class.'.php';
});

require_once 'functions/sanitize.func.php';