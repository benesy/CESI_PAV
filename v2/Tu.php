<?php
require_once("./Modele/Manager/MAdmin.php");
require_once("./Modele/Manager/BDD.php");
require_once("./Modele/Manager/BDDparam.php");
require_once("./Modele/Admin.php");

assert_options(ASSERT_ACTIVE,   true);
assert_options(ASSERT_BAIL,     false);
assert_options(ASSERT_WARNING,  false);
assert_options(ASSERT_CALLBACK, 'assert_callback');
// $a = 1;

function assert_callback($script, $line, $message){
}

function myassert($a, $b, $function)
{
    if (assert($a == $b))
        echo $function . ' <span style="color:green">OK</span><br>';
    else
        echo $function . ' <span style="color:red">KO</span><br>';
}

// Test "retour requete" de la fonction getByLogin 
$admin1 = new MAdmin();
$admin2 = new Admin();

$res = $admin1->getByLogin("greg");

$admin2->set_id("1");
$admin2->set_nom("prevot");
$admin2->set_prenom("gregoire");
$admin2->set_login("greg");
$admin2->set_password("gregprevot");

myassert($res, $admin2, "test fonction getByLogin");
var_dump($res);
var_dump($admin2);
/*
class   foo{
    public $test;
    public $test2;
}
$a = new foo();
$a->test = "toto";
$a->test2 = 1;
$b = new foo();
$b->test = "tota";
$b->test2 = 2;
$c = new foo();
$c->test = "toto";
$c->test2 = 2;
/// test admin
myassert($a, $c, "test1");
myassert($a, $b, "test2");
echo "end";
*/
