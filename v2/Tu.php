<?php
require_once("./Modele/Manager/MAdmin.php");
require_once("./Modele/Manager/MAgent.php");
require_once("./Modele/Manager/MPav.php");
require_once("./Modele/Manager/MTournee.php");
require_once("./Modele/Manager/MReleve.php");
require_once("./Modele/Admin.php");

assert_options(ASSERT_ACTIVE,   true);
assert_options(ASSERT_BAIL,     false);
assert_options(ASSERT_WARNING,  false);
assert_options(ASSERT_CALLBACK, 'assert_callback');


function assert_callback($script, $line, $message){
}

function myassert($a, $b, $function)
{
    if (assert($a == $b))
        echo $function . ' <span style="color:green">OK</span><br>';
    else
        echo $function . ' <span style="color:red">KO</span><br>';
}

///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MAdmin.php  //
//                                                       //
///////////////////////////////////////////////////////////


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


///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MAgent.php  //
//                                                       //
///////////////////////////////////////////////////////////

// Test de la methode create($agent)

echo "<h2>MAgent</h2>";

$agent1 = new Agent();
$agent1->set_id("");
$agent1->set_nom("michu");
$agent1->set_prenom("jocelynne");
$agent1->set_login("joce");
$agent1->set_password("jocemich");

$MAgent2 = new MAgent();
$res = $MAgent2->create($agent1);
$agent1->set_id($res->get_id());
myassert($res, $agent1, "f : create -> ");

// Test de la methode getByLogin($agent)

$res = $MAgent2->getByLogin("joce");
myassert($res, $agent1, "f : getByLogin -> ");

// Test de la methode getById($agent)

$res2 = $MAgent2->getById($res->get_id());
myassert($res, $res2, "f : getById -> ");

// Test de la methode Update($agent)

$res->set_prenom("denise");
$MAgent2->update($res);
$res2 = $MAgent2->getById($res->get_id());
myassert($res, $res2, "f : Update -> ");

// Test de la methode delete($agent)

$MAgent2->delete($res);
$res2 = $MAgent2->getById($res->get_id());
myassert($res2, false, "f : delete -> ");



///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MPav.php  //
//                                                       //
///////////////////////////////////////////////////////////

echo "<h2>MPav</h2>";

// Test de la methode create($pav)

$pav = new Pav();
$pav->set_id("");
$pav->set_numero("1");
$pav->set_adresse("rue de la pompe");
$pav->set_code_postal("33140");
$pav->set_ville("bordeaux");

$MPav = new MPav();
$res = $MPav->create($pav);
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

////////////////////////////////////////////////////////////////
//                                                            //
// Test des "retours requetes" des methodes de MTournee.php  //
//                                                          //
/////////////////////////////////////////////////////////////

echo "<h2>MTournee</h2>";

$agent = new Agent();
$MAgent = new MAgent();

$agent->set_login("gege");
$agent->set_password("geraillou");
$agent->set_nom("caillou");
$agent->set_prenom("gerard");
$agent = $MAgent->create($agent);

// Test de la methode Create

$tournee = new Tournee();
$MTournee = new MTournee();

$tournee->set_date("2019-12-16");
$tournee->set_id_agent($agent->get_id());
$tournee2 = $MTournee->create($tournee);
$tournee->set_id($tournee2->get_id());
myassert($tournee2, $tournee, "f : create -> ");

// Test de la methode getById

$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, $tournee, "f : getById -> ");


// Test de la methode Update

$tournee->set_date("2019-12-15");
$MTournee->update($tournee);
$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, $tournee, "f : Update -> ");

// Test de la methode Delete

$MTournee->delete($tournee);
$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, false, "f : Delete -> ");

// Suppression de toutes les entrées de tests dans la BDD

$MAgent->delete($agent);


////////////////////////////////////////////////////////////////
//                                                            ////
// Test des "retours requetes" des methodes de MReleve.php //
//                                                          ////
/////////////////////////////////////////////////////////////

echo "<h2>MReleve</h2>";

$pav = new Pav();
$MPav = new MPav();
$agent = new Agent();
$MAgent = new MAgent();
$tournee = new Tournee();
$MTournee = new MTournee();

$pav->set_numero("1");
$pav->set_adresse("rue de la pompe");
$pav->set_code_postal("33000");
$pav->set_ville("bordeaux");
$pav = $MPav->create($pav);

$agent->set_nom("boulard");
$agent->set_prenom("rene");
$agent->set_login("renard");
$agent->set_password("boulet");
$agent = $MAgent->create($agent);

$tournee->set_date("2019-12-16");
$tournee->set_id_agent($agent->get_id());
$tournee = $MTournee->create($tournee);

// Test de la methode Create

$releve = new Releve();
$MReleve = new MReleve();

$releve->set_date("2019-12-16");
$releve->set_status("0");
$releve->set_niveau("3");
$releve->set_commentaire("blablabla");
$releve->set_id_tournee($tournee->get_id());
$releve->set_id_pav($pav->get_id());

$releve2 = $MReleve->create($releve);
$releve->set_id($releve2->get_id());
myassert($releve2, $releve, "f : create -> ");

// Test de la methode getById

$releve2 = $MReleve->getById($releve->get_id());
myassert($releve2, $releve, "f : getById -> ");

// Test de la methode Delete

$MReleve->delete($releve);
$releve2 = $MReleve->getById($releve->get_id());
myassert($releve2, false, "f : delete -> ");

$MTournee->delete($tournee);
$MAgent->delete($agent);
$MPav->delete($pav);








