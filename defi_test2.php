<?php
// --- Paramètres du jeu ---
$colors = [
    "A" => "#ff9999",
    "B" => "#99ccff",
    "C" => "#99ff99"
];

$solutions = [
    "A" => "1",
    "B" => "2",
    "C" => "3"
];

// A implémenter : ouvre le hidden snake
$hidden = [
    "A" => "3",
    "B" => "2",
    "C" => "1"
];

// --- Récupération de l'état actuel (associations faites) ---
session_start();

$defi_id = 2;

if (!isset($_SESSION["pairs"])) {
    $_SESSION["pairs"] = [
        "A" => null,
        "B" => null,
        "C" => null
    ];
}

// Effacer les associations
if (isset($_POST["reset"])) {
    $_SESSION["pairs"] = [
        "A" => null,
        "B" => null,
        "C" => null
    ];
    $activeLetter = null;
    $_GET["select_number"] = null;
	header("Location: defi_test2.php");
}

// --- Gestion des clics sur une lettre ---
$activeLetter = $_GET["select_letter"] ?? null;

// --- Gestion des clics sur un chiffre ---
if (isset($_GET["select_number"]) && isset($_GET["active"])) {
    $letter = $_GET["active"];
    $number = $_GET["select_number"];
    $_SESSION["pairs"][$letter] = $number;
}

// --- Vérification finale ---
$results = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($_SESSION["pairs"] as $letter => $num) {
        $results[$letter] = ($num === $solutions[$letter]);
    }
	if ($results == $solutions) {
        $_SESSION['defis'][$defi_id] = true;
        echo 'bravo bonne reponse';
	} else {
		echo 'mauvaise réponse';
	}
}
if ($_SESSION['defis'][$defi_id]) {
    echo "<p><a href='index.php'>Retour aux cartes</a></p>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Jeu d'association</title>
	<style>
        body{
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

		a {
			text-decoration: none;
			color: black;
		}

        .container{
            display: flex;
            gap: 60px;
        }

        .column{
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .item{
            padding: 12px 20px;
            border: 2px solid #000;
            cursor: pointer;
            text-align: center;
            font-size: 20px;
            width: 60px;
            border-radius: 4px;
        }

        .item.disabled {
            opacity: 0.5;
            cursor: default;
        }

        .active{
            border: 3px solid #000;
        }

        .correct{ color: green; font-weight:bold; }
        .wrong{ color: red; font-weight:bold; }
	</style>
</head>

<body>

<h1>Associer les lettres aux chiffres</h1>

<div class="container">

	<!-- COLONNE LETTRES -->
	<div class="column">
        <?php foreach ($colors as $letter => $color): ?>
            <?php
            $isActive = ($activeLetter === $letter);
            $url = "?select_letter=$letter";
            ?>
			<a href="<?= $url ?>"
			   class="item <?= $isActive ? 'active' : '' ?>"
			   style="background: <?= $color ?>;">
                <?= $letter ?>
			</a>
        <?php endforeach; ?>
	</div>

	<!-- COLONNE CHIFFRES -->
	<div class="column">
        <?php for ($n = 1; $n <= count($solutions); $n++): ?>
            <?php
            $associatedColor = null;
            foreach ($_SESSION["pairs"] as $letter => $value) {
                if ($value == $n) {
                    $associatedColor = $colors[$letter];
                }
            }

            // Clic sur numéro seulement si une lettre active existe
            if ($activeLetter) {
                $url = "?active=$activeLetter&select_number=$n";
            } else {
                $url = "#";
            }
            ?>

			<a href="<?= $activeLetter ? $url : '#' ?>"
			   class="item <?= !$activeLetter ? 'disabled' : '' ?>"
			   style="background: <?= $associatedColor ?>;">
                <?= $n ?>
			</a>
        <?php endfor; ?>
	</div>

</div>

<br><br>

<!-- VALIDATION DES RÉSULTATS -->
<form method="post">
	<button type="submit">Valider mes réponses</button>
	<button type="submit" name="reset" value="1">Effacer les associations</button>
</form>

<?php if (!empty($results)): ?>
	<h2>Résultats :</h2>
    <?php foreach ($results as $letter => $ok): ?>
		<p>
			Lettre <strong><?= $letter ?></strong> :
            <?php if ($ok): ?>
				<span class="correct">Correct ✔️</span>
            <?php else: ?>
				<span class="wrong">Incorrect ❌</span>
            <?php endif; ?>
		</p>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
