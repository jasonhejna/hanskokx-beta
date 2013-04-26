<?
$myname = 'Bob';

require_once 'config.php';

$new = ORM::for_table('clients')->create();
$new->set('name', 'Bob');
$new->email = 'test@test.com';
//$new->save();



echo '====== Grab "Jim" ======' ;
$person = ORM::for_table('clients')->where('name', 'Jim')->find_one();
echo($person->name);
echo($person->email);

echo '<br /><br />';

echo '====== Grab all the "Bobs" ======';
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