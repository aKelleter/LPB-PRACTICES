<?php
// echo-print.php


// 1) echo : affiche une ou plusieurs chaînes
echo "Bonjour monde !";
echo "<br>";

// echo peut prendre plusieurs arguments (sans parenthèses)
echo "Salut ", "aux apprenants", " de première année", "<br>";

// echo avec concaténation
$prenom = "Alice";
echo "Bonjour " . $prenom . "!", "<br>";

// echo et interpolation (guillemets doubles permettent l'expansion de variables)
echo "Bonjour $prenom, bienvenue !", "<br>";

// echo avec HTML
echo "<h3>Exemple avec echo et HTML</h3>";
echo "<p>Ceci est un paragraphe généré par echo.</p>";

// echo avec parenthèses (possible si un seul argument)
echo("Avec parenthèses possible");
echo "<br>";

// 2) print : affiche une chaîne et retourne toujours 1
print "Message affiché avec print";
print "<br>";

// print ne peut pas prendre plusieurs arguments (un seul paramètre)
$valRetour = print " (print retourne 1)";
print "<br>";

// Utilisation du retour de print dans une expression/condition
if ($valRetour) {
    echo "La variable \$valRetour vaut $valRetour (donc true).", "<br>";
}

// Différences utiles à retenir :
// - echo est légèrement plus rapide et peut prendre plusieurs arguments.
// - print retourne toujours 1 (peut être utilisé dans des expressions), echo ne retourne rien.
// - sinon, pour l'affichage simple, les deux sont équivalents.

// 3) Exemples pratiques rapides
// Afficher une liste HTML
echo "<ul>";
echo "<li>Point 1</li>", "<li>Point 2</li>";
echo "</ul>";

// Afficher avec guillemets simples (pas d'interpolation)
$nom = 'Bob';
echo 'Bonjour ' . $nom . ' (guillemets simples)', "<br>";

// 4) HEREDOC, NOWDOC et caractères d'échappement

// HEREDOC : interpolation des variables (comme les guillemets doubles)
$prenom = "Alice";
$heredoc = <<<HEREDOC
Exemple HEREDOC :
Bonjour $prenom,
Les variables sont interpolées ici.
Pour afficher \$prenom littéralement, on peut échapper le signe dollar.
HEREDOC;

echo "<h3>HEREDOC</h3>";
echo '<div style="background:#fff;padding:.5rem;border:1px solid #ddd;"><pre style="margin:0;">' . htmlspecialchars($heredoc, ENT_QUOTES, 'UTF-8') . '</pre></div>';
echo "<br>";

// NOWDOC : pas d'interpolation (comme les guillemets simples)
$nowdoc = <<<'NOWDOC'
Exemple NOWDOC :
Bonjour $prenom,
Ici les variables NE SONT PAS interpolées : $prenom restera tel quel.
Les guillemets " et ' ne posent pas de problème.
NOWDOC;

echo "<h3>NOWDOC</h3>";
echo '<div style="background:#fff;padding:.5rem;border:1px solid #ddd;"><pre style="margin:0;">' . htmlspecialchars($nowdoc, ENT_QUOTES, 'UTF-8') . '</pre></div>';
echo "<br>";

// Caractères d'échappement dans les chaînes
echo "<h3>Caractères d'échappement</h3>";

// Dans les guillemets doubles : \n, \t, \", \\ et interpolation
$exampleDouble = "Ligne1\nLigne2\t(tab)\nQuote: \"double\" et backslash: \\";
echo '<div style="background:#fff;padding:.5rem;border:1px solid #ddd;"><pre style="margin:0;">' . htmlspecialchars($exampleDouble, ENT_QUOTES, 'UTF-8') . '</pre></div>';
echo "<br>";

// Dans les guillemets simples : seul l'apostrophe et le backslash doivent être échappés
$exampleSingle = 'Guillemets simples : \'c\' et backslash : \\ (pas d\'interpolation $prenom)';
echo '<div style="background:#fff;padding:.5rem;border:1px solid #ddd;"><pre style="margin:0;">' . htmlspecialchars($exampleSingle, ENT_QUOTES, 'UTF-8') . '</pre></div>';
echo "<br>";
?>