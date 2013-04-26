<?
require_once 'config.php';

$new = ORM::for_table('clients')->create();

$new->set('name', 'Bob');
$new->email = 'test@test.com';

$new->save();


?>