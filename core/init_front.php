<?php
ob_start();
session_start();

$GLOBALS['config'] = array(
	'mysql'		=> array(
		'host'		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '',
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
	require_once '../../classes/'.$class.'.php';
});