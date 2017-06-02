<?php

define('RESTRICTED',1);

//Ensure that a session exists (just in case)
if( !session_id() ) {
    session_start();
}

require('config/app.php');
require('config/database.php');
require('libraries/FlashMessage.php');

// here our routes
$page = (! empty($_GET['page'])) ? $_GET['page'] : null ;
$action = (! empty($_GET['action'])) ? $_GET['action'] : null;

switch ($page) {
	case 'articles':
		if ($action == 'create') {
			require('articles/create.php');
		} elseif($action == 'store') {
			require('articles/store.php');
		} elseif($action == 'createMultiple') {
			require('articles/createMultiple.php');
		} elseif($action == 'storemultiple') {
			require('articles/storeMultiple.php');
		} elseif ($action == 'edit') {
			require('articles/edit.php');
		} elseif ($action == 'update') {
			require('articles/update.php');
		} elseif ($action == 'delete') {
			require('articles/delete.php');
		} elseif ($action == 'detail') {
			require('articles/detail.php');
		} else {
			require('articles/index.php');	
		}
		break;
	
	default:
		require('home.php');
		break;
}
