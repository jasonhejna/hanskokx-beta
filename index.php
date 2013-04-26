<?
require_once 'config.php';

$new = ORM::for_table('clients')->create();
$new->set('name', 'Bob');
$new->email = 'test@test.com';
$new->save();


$people = ORM::for_table('clients')->where('name', 'Bob')->find_many();

echo '<pre>';
foreach ($people as $person)
	{
		print_r($person->email);
		echo '<br />';
	}
echo '</pre>';
?>