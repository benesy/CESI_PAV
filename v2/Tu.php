<?php
require_once("./Modele/Manager/MAdmin.php");
require_once("./Modele/Manager/MAgent.php");
require_once("./Modele/Manager/MPav.php");
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

// Test "retour requete" de la fonction getByLogin de MAdmin.php
$admin1 = new MAdmin();
$admin2 = new Admin();

$res = $admin1->getByLogin("greg");

$admin2->set_id("1");
$admin2->set_nom("prevot");
$admin2->set_prenom("gregoire");
$admin2->set_login("greg");
$admin2->set_password("gregprevot");
echo "<h2>MAdmin</h2>";
myassert($res, $admin2, "f : getByLogin -> ");

// Test des "retours requetes" des methodes de MAgent.php
// Test de la methode create($agent)

$agent1 = new Agent();
$agent1->set_id("");
$agent1->set_nom("michu");
$agent1->set_prenom("jocelynne");
$agent1->set_login("joce");
$agent1->set_password("jocemich");

$MAgent2 = new MAgent();
$MAgent2->create($agent1);

$resu = $MAgent2->getByLogin("joce");
$agent1->set_id($resu->get_id());
echo "<h2>MAgent</h2>";
myassert($resu, $agent1, "f : create & getByLogin -> ");

// Test de la methode getById($agent)

$resu2 = $MAgent2->getById($resu->get_id());
myassert($resu, $resu2, "f : getById -> ");

// Test de la methode Update($agent)

$resu2->set_prenom("denise");
$MAgent2->update($resu2);
$resu3 = $MAgent2->getById($resu->get_id());
myassert($resu3, $resu2, "f : Update -> ");

// Test de la methode delete($agent)

$MAgent2->delete($resu3);
$res2 = $MAgent2->getById($resu3->get_id());
myassert($res2, false, "f : delete -> ");

echo "<h2>MPav</h2>";
// Test des "retours requetes" des methodes de MPav.php
// Test de la methode create($pav)

$pav = new Pav();
$pav->set_id("");
$pav->set_numero("1");
$pav->set_adresse("rue de la pompe");
$pav->set_code_postal("33140");
$pav->set_ville("bordeaux");

$MPav = new MPav();
$MPav->create($pav);

$res = $MPav->getAll();
$res = $res[0];
$pav->set_id($res->get_id());
myassert($res, $pav, "f : create -> ");

// Test de la methode getById($id)

$res = $MPav->getById($pav->get_id());
myassert($res, $pav, "f : getById -> ");

// Test de la methode Update

$pav->set_ville("paris");
$MPav->update($pav);
$res = $MPav->getById($pav->get_id());
myassert($res, $pav, "f : Update -> ");

// Test de la methode Delete

$MPav->delete($pav);
$res = $MPav->getById($pav->get_id());
myassert(false, $res, "f : Delete -> ");