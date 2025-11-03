<?php
// Fichier : 05.types-variables.php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Types de variables en PHP — Exemple</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.5; }
        pre { background:#f4f4f4; padding:10px; border-radius:4px; }
        section { margin-bottom: 24px; }
        h2 { margin-bottom:6px; }
        small { color:#666; }
    </style>
</head>
<body>
    <h1>Exemples des types de variables en PHP</h1>
    <p>Chaque bloc montre la déclaration d'une variable, une explication courte et l'affichage du résultat.</p>

    <section>
        <h2>1) Types scalaires</h2>
        <?php
        // Entier (int)
        $entier = 42;
        // Nombre à virgule flottante (float / double)
        $flottant = 3.14;
        // Chaîne de caractères (string)
        $texte = "Bonjour \"étudiants\"";
        // Booléen (bool)
        $booleen = true;

        echo "<h3>Entier, flottant, chaîne, booléen</h3>";
        echo "<pre>";
        echo "\$entier = "; var_export($entier); echo PHP_EOL;
        echo "\$flottant = "; var_export($flottant); echo PHP_EOL;
        echo "\$texte = "; var_export($texte); echo PHP_EOL;
        echo "\$booleen = "; var_export($booleen); echo PHP_EOL;
        echo "</pre>";
        ?>
        <small>Utilisez var_export/var_dump pour inspecter le type et la valeur.</small>
    </section>

    <section>
        <h2>2) Conversion (casting) et vérification de type</h2>
        <?php
        $s = "123";
        $i = (int) $s;        // cast en entier
        $f = (float) "4.5";   // cast en flottant

        echo "<pre>";
        echo "'123' (string) cast en int donne: "; var_export($i); echo " (".gettype($i).")".PHP_EOL;
        echo "'4.5' (string) cast en float donne: "; var_export($f); echo " (".gettype($f).")".PHP_EOL;
        echo "is_int(\$i): "; var_export(is_int($i)); echo PHP_EOL;
        echo "is_string(\$s): "; var_export(is_string($s)); echo PHP_EOL;
        echo "</pre>";
        ?>
    </section>

    <section>
        <h2>3) Tableau indexé et associatif</h2>
        <?php
        // Tableau indexé
        $jours = ["Lundi", "Mardi", "Mercredi"];

        // Tableau associatif
        $personne = [
            "nom" => "Dupont",
            "age" => 21,
            "etudie" => true
        ];

        echo "<pre>";
        echo "\$jours (indexé): "; print_r($jours);
        echo "\$personne (associatif): "; print_r($personne);
        echo "</pre>";
        ?>
        <small>Les tableaux peuvent mélanger clés numériques et chaînes.</small>
    </section>

    <section>
        <h2>4) Objet simple (stdClass)</h2>
        <?php
        $objet = new stdClass();
        $objet->nom = "Alice";
        $objet->cours = ["PHP", "HTML"];

        echo "<pre>";
        echo "\$objet: "; print_r($objet);
        echo "Type: " . gettype($objet) . PHP_EOL;
        echo "</pre>";
        ?>
    </section>

    <section>
        <h2>5) null</h2>
        <?php
        $inconnu = null;

        echo "<pre>";
        echo "\$inconnu = "; var_export($inconnu); echo " (".gettype($inconnu).")".PHP_EOL;
        echo "</pre>";
        ?>
    </section>

    <section>
        <h2>6) Chaînes spéciales : concaténation et heredoc</h2>
        <?php
        $prenom = "Jean";
        $age = 19;

        $concat = "Bonjour " . $prenom . ", tu as " . $age . " ans.";
        $interpolation = "Bonjour $prenom, tu as $age ans."; // fonctionne avec "
        $heredoc = <<<EOT
Heredoc : salut $prenom
Permet d'écrire sur plusieurs lignes sans concaténer.
EOT;

        echo "<pre>";
        echo $concat . PHP_EOL . PHP_EOL;
        echo $interpolation . PHP_EOL . PHP_EOL;
        echo $heredoc . PHP_EOL;
        echo "</pre>";
        ?>
    </section>

    <section>
        <h2>7) Fonctions utiles pour les types</h2>
        <?php
        echo "<pre>";
        echo "gettype(\$jours): " . gettype($jours) . PHP_EOL;
        echo "is_array(\$jours): "; var_export(is_array($jours)); echo PHP_EOL;
        echo "isset(\$inconnu): "; var_export(isset($inconnu)); echo " (false car null)" . PHP_EOL;
        echo "empty(\$entier): "; var_export(empty($entier)); echo PHP_EOL;
        echo "</pre>";
        ?>
    </section>

    <footer>
        <p><small>Exercice : créez une page similaire en affichant vos propres variables et types.</small></p>
    </footer>
</body>
</html>