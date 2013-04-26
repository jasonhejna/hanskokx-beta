<?
$url = "http://beta.hanskokx.com/";

// database stuff
require_once 'idiorm.php';
ORM::configure(array(
    'connection_string' => 'pgsql:host=localhost;dbname=hanskokx',
    'username' => 'dev',
    'password' => 'top_secret'
));

?>