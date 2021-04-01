<?php
require_once "Personne.php";
require_once "User.php";
require_once "ContactEntreprise.php";

$userJohn = new User("Amselem", "Jonathan", 28, "05859595959", "j.amselem@ics-nice.com", "pass");
var_dump($userJohn);
echo $userJohn->toString(); 

$personneCyril = new Personne();

$contact1 = new ContactEntreprise("Bono", "Isabelle", 35, "0665219515", "81361437257645345", "12 rue Monte Christo, 13005 Marseille");
echo $contact1->toString();

//attention : l'enfant peut utiliser les méthodes du parent, mais pas l'inverse !
//echo $personneCyril->getEmail(); //fatal error