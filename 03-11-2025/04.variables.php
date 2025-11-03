<?php
// 04.variables.php

// 1) Variables scalaires : string, int, float, bool
$nom = "Alice";                   // chaîne de caractères
$age = 19;                        // entier
$moyenne = 14.75;                 // nombre à virgule
$inscrit = true;                  // booléen

// Affichage simple
echo "Nom : " . $nom . "<br>";    // concaténation avec .
echo "Age : $age ans<br>";        // interpolation dans les guillemets
echo "Moyenne : " . $moyenne . "<br>";
echo "Inscrit ? " . ($inscrit ? "oui" : "non") . "<br><br>";

// 2) Constantes (valeur fixe)
define('ECOLE', 'Université Exemple');
const ANNEE = 2025;
echo "École : " . ECOLE . " — Année : " . ANNEE . "<br><br>";

// 3) Opérations arithmétiques et affectations
$a = 10;
$b = 3;
$sum = $a + $b;
$product = $a * $b;
$a += 5; // équivalent à $a = $a + 5;
echo "Somme : $sum — Produit : $product — a maintenant = $a<br><br>";

// 4) Tableaux indexés et parcours
$fruits = ["pomme", "banane", "orange"];
echo "Premier fruit : " . $fruits[0] . "<br>";
echo "Tous les fruits :<br>";
foreach ($fruits as $f) {
    echo "- $f<br>";
}
echo "<br>";

// 5) Tableaux associatifs
$etudiant = [
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 20
];
echo "Étudiant : " . $etudiant['prenom'] . " " . $etudiant['nom'] . " (" . $etudiant['age'] . " ans)<br><br>";

// 6) Parcourir un tableau associatif
echo "Détails étudiant :<br>";
foreach ($etudiant as $cle => $valeur) {
    echo "$cle : $valeur<br>";
}
echo "<br>";

// 7) Fonctions et portée des variables
$message = "Bonjour";
function saluer($nom) {
    // $message n'est pas accessible ici sans global ou paramètre
    return "Salut, $nom !";
}
echo saluer($etudiant['prenom']) . "<br><br>";

// 8) Vérifier existence et supprimer variable
$varTest = 123;
if (isset($varTest)) {
    echo "varTest existe et vaut $varTest<br>";
}
unset($varTest);
echo "Après unset, isset(varTest) = " . (isset($varTest) ? "true" : "false") . "<br><br>";

// 9) Var_dump et print_r pour debug
echo "<pre>Debug \$etudiant:\n";
var_dump($etudiant);
echo "</pre>";

// 10) Récupérer une valeur depuis l'URL (ex: ?pseudo=Marie)
// Utiliser htmlspecialchars pour éviter les problèmes XSS
$pseudo = isset($_GET['pseudo']) ? htmlspecialchars($_GET['pseudo']) : 'invité';
echo "Pseudo depuis l'URL : $pseudo<br>";

// 11) Conversion de type (casting)
$chaineNombre = "42";
$nombreEntier = (int)$chaineNombre;
$nombreFloat = (float)"3.14";
echo "Type de \$nombreEntier : " . gettype($nombreEntier) . " — valeur : $nombreEntier<br>";
echo "Type de \$nombreFloat : " . gettype($nombreFloat) . " — valeur : $nombreFloat<br>";

// 12) Variables variables (exemple avancé à utiliser avec précaution)
$couleur = "bleu";
$$couleur = "ciel"; // crée une variable $bleu
echo "Variable dynamique \$bleu = " . $bleu . "<br>";

?>