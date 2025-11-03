<?php
header('Content-Type: text/html; charset=utf-8');

$dir = __DIR__;
$parentName = basename($dir); // nom du répertoire courant
$entries = scandir($dir, SCANDIR_SORT_NONE);
$files = [];

/*
 * Handler pour afficher le code source d'un fichier (PHP/HTML)
 * usage: index.php?view=monfichier.php
 * Sécurité : on utilise basename() pour éviter les parcours de répertoire
 * et on vérifie l'extension avant d'afficher.
 */
if (isset($_GET['view'])) {
    $requested = basename($_GET['view']);
    $path = $dir . DIRECTORY_SEPARATOR . $requested;

    if (!is_file($path) || !preg_match('/\.(php|html?|phtml)$/i', $requested)) {
        http_response_code(404);
        echo '<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Fichier introuvable</title></head><body><div style="padding:2rem;font-family:Arial,Helvetica,sans-serif;"><h1>404 — Introuvable</h1><p>Fichier non trouvé ou extension non autorisée.</p><p><a href="./">Retour</a></p></div></body></html>';
        exit;
    }

    $title = htmlspecialchars($requested, ENT_QUOTES, 'UTF-8');
    // Affiche le code source avec coloration syntaxique
    echo '<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Source — ' . $title . '</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '<style>body{font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;}</style>';
    echo '</head><body class="bg-light"><main class="container py-4">';
    echo '<div class="d-flex justify-content-between align-items-center mb-3">';
    echo '<h1 class="h5 mb-0">Source : ' . $title . '</h1>';
    echo '<div><a href="./" class="btn btn-sm btn-secondary me-2">Retour</a>';
    echo '<a href="?download=' . rawurlencode($requested) . '" class="btn btn-sm btn-outline-secondary">Télécharger</a>';
    echo '</div></div>';

    // highlight_file retourne du HTML coloré
    $highlighted = highlight_file($path, true);

    echo '<div class="card"><div class="card-body p-0"><div class="p-3 bg-white" style="overflow:auto;">';
    echo $highlighted;
    echo '</div></div></div>';

    echo '</main><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script></body></html>';
    exit;
}

// Handler pour téléchargement (optionnel)
if (isset($_GET['download'])) {
    $requested = basename($_GET['download']);
    $path = $dir . DIRECTORY_SEPARATOR . $requested;
    if (is_file($path) && preg_match('/\.(php|html?|phtml)$/i', $requested)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $requested . '"');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }
}

foreach ($entries as $e) {
    $path = $dir . DIRECTORY_SEPARATOR . $e;
    if (!is_file($path)) continue;
    if (preg_match('/\.(htm|html|php|phtml)$/i', $e)) $files[] = $e;
}

if (!empty($files)) {
    natcasesort($files);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index — Liste des fichiers</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        .file-name { word-break: break-all; }
    </style>
</head>
<body class="bg-light">
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">
                Liste des fichiers du cours :
                <small class="text-muted ms-2">/ <?php echo htmlspecialchars($parentName, ENT_QUOTES, 'UTF-8'); ?></small>
            </h1>
            <small class="text-muted"><?php echo count($files)-1; ?> fichier(s)</small>
        </div>
        <div class="mt-4 text-muted small mb-5">
            <a href=".." class="me-3">Retour</a>
            Généré le <?php echo date('d/m/Y H:i'); ?>
        </div>

        <?php if (empty($files)): ?>
            <div class="alert alert-warning">Aucun fichier .htm / .html / .php trouvé dans ce dossier.</div>
        <?php else: ?>
            <div class="list-group">
                <?php foreach ($files as $name):
                    if ($name === 'index.php') continue;
                    $url = './' . rawurlencode($name);
                    $viewUrl = '?view=' . rawurlencode($name);
                ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <a class="me-3 text-decoration-none" href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
                                <span class="file-name"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></span>
                            </a>
                        </div>

                        <div class="btn-group btn-group-sm" role="group" aria-label="actions">
                            <a class="btn btn-outline-primary" href="<?php echo htmlspecialchars($viewUrl, ENT_QUOTES, 'UTF-8'); ?>">Voir le code</a>
                            <a class="btn btn-outline-secondary" href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">Ouvrir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <footer class="mt-4 text-muted small mt-5">
            <a href=".." class="me-3">Retour</a>
            Généré le <?php echo date('d/m/Y H:i'); ?>
        </footer>
    </main>

    <!-- Bootstrap JS (bundle avec Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>