<?php
// Script qui liste les répertoires à la racine du projet et crée un lien pour chacun

$root = __DIR__;
$entries = array_filter(scandir($root), function ($name) use ($root) {
    return $name !== '.' && $name !== '..' && is_dir($root . DIRECTORY_SEPARATOR . $name);
});
sort($entries);

// Construire la base d'URL relative (ex: /LPB)
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '') {
    $baseUrl = '/';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code source des exercices et leçons du cours LPB 2025-2026</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4 text-center text-info">Code source des exercices et leçons du cours LPB 2025-2026</h1>
        <hr>

        <?php if (empty($entries)): ?>
            <div class="alert alert-warning" role="alert">Aucun répertoire trouvé.</div>
        <?php else: ?>
            <div class="list-group">
                <?php foreach ($entries as $dir):
                        
                        // Si ce n'est pas le répertoire .git, créer le lien
                        if ($dir !== '.git') {
                            // encoder le segment pour gérer espaces/caractères spéciaux
                            $encoded = rawurlencode($dir);
                            $href = rtrim($baseUrl, '/') . '/' . $encoded . '/';
                        } else {
                            continue; // passer au répertoire suivant
                        }
                   
                        
                                         
                ?>
                    <a class="list-group-item list-group-item-action p-3"  href="<?php echo htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($dir, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (bundle avec Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>