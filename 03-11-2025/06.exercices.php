<?php
// Fichier : 06.exercices.php
// Exemples d'exercices simples en PHP (variables, types, constantes)
// Chaque exercice contient une courte description (commentaire) suivie du code de solution exécuté.

// Pour afficher proprement dans le navigateur :
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Exercices PHP - Variables, Types, Constantes</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; line-height: 1.5; padding: 20px; }
        pre { background:#f7f7f7; padding:10px; border:1px solid #ddd; }
        section { margin-bottom: 30px; }
        code { font-family: monospace; }
    </style>
</head>
<body>
    <h1>Exercices PHP : variables, types, constantes (solutions)</h1>

    <section>
        <h2>Exercice 1 — Variables simples</h2>
        <p>Description : Déclarez deux variables (<code>$prenom</code> et <code>$age</code>) et affichez une phrase de salutation en utilisant l'interpolation.</p>
        <pre><?php
// Solution Exercice 1
$prenom = "Alice";
$age = 30;

// Affichage attendu : Bonjour Alice, vous avez 30 ans.
echo "Code exécuté :\n";
echo "Bonjour $prenom, vous avez $age ans.\n";
?></pre>
    </section>

    <section>
        <h2>Exercice 2 — Types et inspection</h2>
        <p>Description : Créez des variables de différents types (entier, float, string, bool, tableau) et affichez leur type avec <code>gettype</code> et un <code>var_dump</code> pour un exemple.</p>
        <pre><?php
// Solution Exercice 2
$entier = 42;
$reel = 3.1415;
$chaine = "Bonjour";
$booleen = true;
$tableau = ["rouge", "vert", "bleu"];

echo "Types (gettype) :\n";
echo "\$entier => " . gettype($entier) . "\n";
echo "\$reel => " . gettype($reel) . "\n";
echo "\$chaine => " . gettype($chaine) . "\n";
echo "\$booleen => " . gettype($booleen) . "\n";
echo "\$tableau => " . gettype($tableau) . "\n\n";

echo "Exemple de var_dump(\$tableau) :\n";
var_dump($tableau);
?></pre>
    </section>

    <section>
        <h2>Exercice 3 — Constantes</h2>
        <p>Description : Déclarez une constante numérique avec <code>define</code> et une constante de chaîne avec <code>const</code>. Affichez-les.</p>
        <pre><?php
// Solution Exercice 3
define('PI', 3.1415926535);
const NOM_APPLICATION = 'MonApp';

// Utilisation des constantes
echo "PI = " . PI . "\n";
echo "NOM_APPLICATION = " . NOM_APPLICATION . "\n";

// Remarques : on ne peut pas redéfinir une constante. Exemple commenté :
// define('PI', 3.14); // provoquera un avertissement si tenté
?></pre>
    </section>

    <section>
        <h2>Exercice 4 — Conversion de type (casting)</h2>
        <p>Description : Prenez une chaîne contenant un nombre, convertissez-la en entier et faites une opération arithmétique. Montrez aussi la conversion d'un float vers un int.</p>
        <pre><?php
// Solution Exercice 4
$strNombre = "10";
$entierConverti = (int)$strNombre; // ou intval($strNombre)
$somme = $entierConverti + 5;

echo "\$strNombre = " . $strNombre . " (type: " . gettype($strNombre) . ")\n";
echo "Après (int) : \$entierConverti = " . $entierConverti . " (type: " . gettype($entierConverti) . ")\n";
echo "Somme = " . $somme . "\n";

$valeurFloat = 7.9;
$versInt = (int)$valeurFloat; // tronque la partie décimale
echo "\$valeurFloat = $valeurFloat => (int) => $versInt\n";
?></pre>
    </section>

    <section>
        <h2>Exercice 5 — Null, isset et concaténation</h2>
        <p>Description : Déclarez une variable puis mettez-la à <code>null</code>. Testez <code>isset</code>. Construisez une phrase en concaténant des variables.</p>
        <pre><?php
// Solution Exercice 5
$ville = "Paris";
$codePostal = null;

echo "\$ville existe ? " . (isset($ville) ? 'oui' : 'non') . "\n";
echo "\$codePostal existe ? " . (isset($codePostal) ? 'oui' : 'non') . "\n";

// Concaténation
$phrase = $ville . " - " . ($codePostal ?? 'N/A');
echo "Phrase : " . $phrase . "\n";

// Utilisation d'interpolation (si variable définie)
if (isset($codePostal)) {
        echo "Interpolation : $ville ($codePostal)\n";
} else {
        echo "Interpolation : $ville (code postal inconnu)\n";
}
?></pre>
    </section>

</body>
</html>
