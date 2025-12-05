<?php
session_start();
session_abort();
// Initialisation des défis
if (!isset($_SESSION['defis'])) {
    $_SESSION['defis'] = [1 => false, 2 => false, 3 => false, 4 => false];
}
$defis_done = &$_SESSION['defis'];

// Configuration des cartes
$cards = [
    ['id' => 1, 'title' => 'Défi Logique', 'subtitle' => ($defis_done[1] ? "Terminé" : "À faire"), 'back' => 'Résolvez l\'énigme mathématique.', 'is_done' => $defis_done[1]],
    ['id' => 2, 'title' => 'Défi Code', 'subtitle' => ($defis_done[2] ? "Terminé" : "À faire"), 'back' => 'Trouvez l\'erreur de syntaxe.', 'is_done' => $defis_done[2]],
    ['id' => 3, 'title' => 'Défi Design', 'subtitle' => ($defis_done[3] ? "Terminé" : "À faire"), 'back' => "Les collectivités prolongent la vie des équipements et réduisent les déchets numériques. Elles assurent un accès équitable aux outils pour tous les élèves. Linux et les logiciels libres renforcent la souveraineté numérique. Les élèves participent activement à une transformation numérique responsable. Distribution recommandée : PrimTux (primaire), Linux NIRD (secondaire)", 'is_done' => $defis_done[3]],
    ['id' => 4, 'title' => 'Défi Hacker', 'subtitle' => ($defis_done[4] ? "Terminé" : "À faire"), 'back' => 'Le reconditionnement remet en état des ordinateurs usagés en effaçant les données et testant les composants, il développe compétences, autonomie et esprit d’équipe tout en valorisant tous les profils, il sensibilise à l’éthique, à la citoyenneté numérique et au réemploi, il mobilise la communauté éducative et des partenaires, et il promeut le développement durable et la redistribution solidaire du matériel.', 'is_done' => $defis_done[4]],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tableau de Bord des Défis</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>🚀 Tableau de Bord des Défis</h1>

    <div class="grid">
        <?php foreach ($cards as $c): ?>
            <div class="card-wrap">
                <input type="checkbox" id="card-<?php echo $c['id']; ?>" aria-hidden="true">

                <div class="flip-card">
                    <div class="flip-card-inner">

                        <div class="flip-card-front <?php echo $c['is_done'] ? 'status-done' : ''; ?>" style="<?php echo $c['is_done'] ? 'border-bottom-color: var(--success);' : ''; ?>">
                            <div class="card-title"><?php echo htmlspecialchars($c['title']); ?></div>
                            <span class="card-status <?php echo $c['is_done'] ? 'status-done' : 'status-pending'; ?>">
                                    <?php echo htmlspecialchars($c['subtitle']); ?>
                                </span>
                            <div class="hint">Cliquez pour voir l'info</div>
                        </div>

                        <div class="flip-card-back">
                            <div class="back-text"><?php echo htmlspecialchars($c['back']); ?></div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <a href="defi_test<?php echo $c['id']; ?>.php?id=<?php echo $c['id']; ?>" class="btn-action">
                        <?php echo $c['is_done'] ? 'Revoir le défi' : 'Lancer le défi'; ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
