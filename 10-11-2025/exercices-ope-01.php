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
    <h1>Concaténation vs addition</h1>
    <p>Expliquez la différence entre :</p>
    <pre>
        &lt;?php        
            echo 2 + 3;
            echo "2" . "3";
        ?&gt;
    </pre>

    <h1>Affectation par valeur vs par référence</h1>
    <p>Expliquez avec tes mots la différence entre :</p>
    <pre>
        &lt;?php        
            $a = 5;
            $b = $a;
        ?&gt;
    </pre>

    <p>ET</p>

    <pre>
        &lt;?php        
            $a = 5;
            $b = &$a;
        ?&gt;
    </pre>
</body>
</html>