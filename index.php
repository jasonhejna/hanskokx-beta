<?
require_once 'config.php';

$new = ORM::for_table('clients')->create();
$new->set('name', 'Bob');
$new->email = 'test@test.com';
$new->save();


$person = ORM::for_table('clients')->where('name', 'Bob')->find_many();

echo '<pre>';
print_r($person->email);
echo '</pre>';
?>