<?
$myname = 'Bob';

require_once 'config.php';

$new = ORM::for_table('clients')->create();
$new->set('name', 'Bob');
$new->email = 'test@test.com';
//$new->save();


$people = ORM::for_table('clients')->where('name', $myname)->find_many();

echo '<pre>';
foreach ($people as $person)
	{
		print_r($person->name);
		echo '<br />';

		print_r($person->email);
		echo '<br />';
		echo '<br />';

	}
echo '</pre>';
?>