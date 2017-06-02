<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

try {

	$id = $_GET['id'];

	$statement = $db->prepare('DELETE FROM articles WHERE id=:id');
	$statement->execute([
		'id' => $id
	]);

	flash('article_flash', 'Article has been deleted', 'success');
	echo json_encode(['status' => true]);

} catch(Exception $e) {
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	echo json_decode(['status' => false]);
}
