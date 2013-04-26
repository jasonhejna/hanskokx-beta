<?
$myname = 'Bob';

require_once 'config.php';

$new = ORM::for_table('clients')->create();
$new->set('name', 'Bob');
$new->email = 'test@test.com';
//$new->save();



echo '====== Grab "Jim" ======' ;
echo '<br />';
$person = ORM::for_table('clients')->where('name', 'Jim')->find_one();
print_r($person->name);
print_r($person->email);

echo '<br /><br />';

echo '====== Grab all the "Bobs" ======';
echo '<br />';
$people = ORM::for_table('clients')->where('name', $myname)->find_many();
foreach ($people as $person)
	{
		print_r($person->name);
		echo '<br />';

		print_r($person->email);
		echo '<br />';
		echo '<br />';

	}
?>