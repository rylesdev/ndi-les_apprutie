<?php
session_start();

// Questions vrai/faux basées sur le texte Collectivités
$questions = [
    1 => ["q" => "Prolonger la durée de vie des équipements réduit les déchets numériques.", "answer" => "vrai"],
    2 => ["q" => "Les collectivités doivent ignorer les initiatives locales.", "answer" => "faux"],
    3 => ["q" => "Linux et les logiciels libres renforcent la souveraineté numérique.", "answer" => "vrai"],
    4 => ["q" => "PrimTux est recommandé pour les écoles secondaires.", "answer" => "faux"], // c'est pour primaires
    5 => ["q" => "Les élèves deviennent acteurs d’une transformation numérique responsable.", "answer" => "vrai"],
];

// Vérification des réponses
$all_correct = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answers = $_POST['answers'] ?? [];
    $correct = true;

    foreach ($questions as $id => $q) {
        if (!isset($user_answers[$id]) || strtolower($user_answers[$id]) !== $q['answer']) {
            $correct = false;
            break;
        }
    }

    if ($correct) {
        $all_correct = true;
        $_SESSION['defis'][2] = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Défi 2 - Vrai/Faux</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Défi 2 : Vrai / Faux</h1>

    <form method="post">
        <?php foreach ($questions as $id => $q): ?>
            <div class="question">
                <p><?php echo htmlspecialchars($q['q']); ?></p>
                <label>
                    <input type="radio" name="answers[<?php echo $id; ?>]" value="vrai" required> Vrai
                </label>
                <label>
                    <input type="radio" name="answers[<?php echo $id; ?>]" value="faux" required> Faux
                </label>
            </div>
        <?php endforeach; ?>

        <?php if ($all_correct): ?>
            <div class="success">
                <p>Bravo ! Toutes les réponses sont correctes.</p>
                <a href="index.php" class="btn-action">Retour à la page principale</a>
            </div>
        <?php else: ?>
            <button type="submit" class="btn-action">Valider</button>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
