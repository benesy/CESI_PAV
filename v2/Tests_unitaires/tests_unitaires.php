<?php
require_once("./Modele/Manager/MAdmin.php");
require_once("./Modele/Manager/MAgent.php");
require_once("./Modele/Manager/MPav.php");
require_once("./Modele/Manager/MTournee.php");
require_once("./Modele/Manager/MReleve.php");
require_once("./Modele/Admin.php");

ob_start();

assert_options(ASSERT_ACTIVE,   true);
assert_options(ASSERT_BAIL,     false);
assert_options(ASSERT_WARNING,  false);
assert_options(ASSERT_CALLBACK, 'assert_callback');


function assert_callback($script, $line, $message){
}

function myassert($a, $b, $function)
{
    if (assert($a == $b))
        echo '<td class="text-left">'.$function . '</td>' . ' <td class="text-center"><span style="color:green">OK</span><br></td></tr>';
    else
        echo '<td class="text-left">'.$function . '</td>' . ' <td class="text-center"> <span style="color:red">KO</span><br></td></tr>';
}

///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MAdmin.php  //
//                                                       //
///////////////////////////////////////////////////////////

// Test "retour requete" de la fonction getByLogin de MAdmin.php
echo '<tr><td class="text-left">MAdmin</td>';
$admin1 = new MAdmin();
$admin2 = new Admin();

$res = $admin1->getByLogin("admin");
if ($res) {
$admin2->set_id($res->get_id());
$admin2->set_nom("user");
$admin2->set_prenom("super");
$admin2->set_login("admin");
$admin2->set_password("admin");

}
myassert($res, $admin2, "getByLogin");



///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MAgent.php  //
//                                                       //
///////////////////////////////////////////////////////////

// Test de la methode create($agent)

echo '<tr><td class="text-left">MAgent</td>';

$agent1 = new Agent();
$agent1->set_id("");
$agent1->set_nom("michu");
$agent1->set_prenom("jocelynne");
$agent1->set_login("joce");
$agent1->set_password("jocemich");

$MAgent2 = new MAgent();
$res = $MAgent2->create($agent1);
$agent1->set_id($res->get_id());
myassert($res, $agent1, "create");

// Test de la methode getByLogin($agent)

echo '<tr><td class="text-left"></td>';
$res = $MAgent2->getByLogin("joce");
myassert($res, $agent1, "getByLogin");

// Test de la methode getById($agent)

echo '<tr><td class="text-left"></td>';
$res2 = $MAgent2->getById($res->get_id());
myassert($res, $res2, "getById");

// Test de la methode Update($agent)

echo '<tr><td class="text-left"></td>';
$res->set_prenom("denise");
$MAgent2->update($res);
$res2 = $MAgent2->getById($res->get_id());
myassert($res, $res2, "Update");

// Test de la methode delete($agent)

echo '<tr><td class="text-left"></td>';
$MAgent2->delete($res);
$res2 = $MAgent2->getById($res->get_id());
myassert($res2, false, "delete");



///////////////////////////////////////////////////////////
//                                                       //
// Test des "retours requetes" des methodes de MPav.php  //
//                                                       //
///////////////////////////////////////////////////////////

echo '<tr><td class="text-left">MPav</td>';

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
myassert($res, $pav, "create");

// Test de la methode getById($id)

echo '<tr><td class="text-left"></td>';
$res = $MPav->getById($pav->get_id());
myassert($res, $pav, "getById");

// Test de la methode Update

echo '<tr><td class="text-left"></td>';
$pav->set_ville("paris");
$MPav->update($pav);
$res = $MPav->getById($pav->get_id());
myassert($res, $pav, "Update");

// Test de la methode Delete

echo '<tr><td class="text-left"></td>';
$MPav->delete($pav);
$res = $MPav->getById($pav->get_id());
myassert(false, $res, "Delete");

////////////////////////////////////////////////////////////////
//                                                            //
// Test des "retours requetes" des methodes de MTournee.php  //
//                                                          //
/////////////////////////////////////////////////////////////



$agent = new Agent();
$MAgent = new MAgent();

$agent->set_login("gege");
$agent->set_password("geraillou");
$agent->set_nom("caillou");
$agent->set_prenom("gerard");
$agent = $MAgent->create($agent);

// Test de la methode Create

echo '<tr><td class="text-left">MTournee</td>';
$tournee = new Tournee();
$MTournee = new MTournee();

$tournee->set_date("2019-12-16");
$tournee->set_id_agent($agent->get_id());
$tournee2 = $MTournee->create($tournee);
$tournee->set_id($tournee2->get_id());
myassert($tournee2, $tournee, "create");

// Test de la methode getById

echo '<tr><td class="text-left"></td>';
$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, $tournee, "getById");


// Test de la methode Update

echo '<tr><td class="text-left"></td>';
$tournee->set_date("2019-12-15");
$MTournee->update($tournee);
$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, $tournee, "Update ");

// Test de la methode Delete

echo '<tr><td class="text-left"></td>';
$MTournee->delete($tournee);
$tournee2 = $MTournee->getById($tournee->get_id());
myassert($tournee2, false, "Delete");

// Suppression de toutes les entrées de tests dans la BDD

$MAgent->delete($agent);


////////////////////////////////////////////////////////////////
//                                                            ////
// Test des "retours requetes" des methodes de MReleve.php //
//                                                          ////
/////////////////////////////////////////////////////////////

echo '<tr><td class="text-left">MReleve</td>';

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
myassert($releve2, $releve, "create");

// Test de la methode getById

echo '<tr><td class="text-left"></td>';
$releve2 = $MReleve->getById($releve->get_id());
myassert($releve2, $releve, "getById");

// Test de la methode Delete

echo '<tr><td class="text-left"></td>';
$MReleve->delete($releve);
$releve2 = $MReleve->getById($releve->get_id());
myassert($releve2, false, "delete");

$MTournee->delete($tournee);
$MAgent->delete($agent);
$MPav->delete($pav);


$content = ob_get_contents();
ob_clean();



