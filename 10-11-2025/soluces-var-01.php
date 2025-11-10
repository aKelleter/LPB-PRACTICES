<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Exercice 1 — Variables simples</h1>
        <?php
        $prenom = "Alice";
        $age = 30;

        echo "Bonjour $prenom, vous avez $age ans.";
        ?>

        <h2>Exercice 2 — Types et inspection</h2>
        <p>
            Objectif : Créer des variables de types différents et utiliser gettype() et var_dump().
        </p>
        <?php
            $entier = 42;
            $reel = 3.14;
            $chaine = "Bonjour";
            $booleen = true;
            $tableau = ["rouge", "vert", "bleu"];

            echo "\nTypes (gettype) :\n";
            echo "\$entier => " . gettype($entier) . "\n";
            echo "\$reel => " . gettype($reel) . "\n";
            echo "\$chaine => " . gettype($chaine) . "\n";
            echo "\$booleen => " . gettype($booleen) . "\n";
            echo "\$tableau => " . gettype($tableau) . "\n\n";

            echo "Exemple de var_dump(\$tableau) :\n";
            var_dump($tableau);
        ?>

        <h1>Exercice 3 — Constantes</h1>
        <?php
            define("PI", 3.1415926535);
            const NOM_APPLICATION = "MonApp";

            echo "PI = " . PI . "\n";
            echo "NOM_APPLICATION = " . NOM_APPLICATION;
        ?>


        <h1>Exercice 4 — Conversion de type (casting)</h1>
        <?php
            $strNombre = "10";
            echo "\$strNombre = $strNombre (type: " . gettype($strNombre) . ")\n";

            $entierConverti = (int)$strNombre;
            echo "Après (int) : \$entierConverti = $entierConverti (type: " . gettype($entierConverti) . ")\n";

            $som = $entierConverti + 5;
            echo "Somme = $som\n";

            $valeurFloat = 7.9;
            $intFloat = (int)$valeurFloat;
            echo "\$valeurFloat = $valeurFloat => (int) => $intFloat";
        ?>

        <h1>Exercice 5 — Null, isset et concaténation</h1>
        <?php
            $ville = "Paris";
            $codePostal = null;

            echo "\$ville existe ? " . (isset($ville) ? "oui" : "non") . "\n";
            echo "\$codePostal existe ? " . (isset($codePostal) ? "oui" : "non") . "\n";

            $phrase = $ville . " - " . ($codePostal ?? "N/A");
            echo "Phrase : $phrase\n";

            echo "Interpolation : $ville (code postal " . ($codePostal ?? "inconnu") . ")";
        ?>
    </div>

</body>
</html>

