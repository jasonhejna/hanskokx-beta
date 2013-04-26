<?
require_once 'config.php';

$new = ORM::for_table('clients')->find_one(5);

$new->set('name', 'Bob');
$new->email = 'test@test.com';

$new->save();


?>