<?php

function shuffle_assoc($array) {
    $keys = array_keys($array);
    shuffle($keys);
    $shuffled = [];
    foreach ($keys as $key) {
        $shuffled[$key] = $array[$key];
    }
    return $shuffled;
}

// --- Paramètres du jeu ---
$colors = [
    "Microsoft Windows" => "#ff9999",
    "Microsoft Office" => "#99ccff",
    "Adobe Photoshop" => "#99ff99",
    "Adobe Premiere Pro" => "#ffcc99",
    "Adobe Audition" => "#cc99ff",
    "Microsoft Visual Studio" => "#ffff99",
    "WinRAR" => "#ccccff",
    "Google Chrome" => "#ccff99",
    "VMware Workstation" => "#ffeb99",
    "Spotify" => "#99ffff"
];

$solutions = [
    "Microsoft Windows"        => "Linux",
    "Microsoft Office"         => "LibreOffice",
    "Adobe Photoshop"          => "GIMP",
    "Adobe Premiere Pro"       => "Kdenlive",
    "Adobe Audition"           => "Audacity",
    "Microsoft Visual Studio"  => "Eclipse",
    "WinRAR"                   => "7-Zip",
    "Google Chrome"            => "Firefox",
    "VMware Workstation"       => "VirtualBox",
    "Spotify"                  => "Jellyfin"
];

$hidden_solutions = [
    "Microsoft Windows"        => "LibreOffice",
    "Microsoft Office"         => "Linux",
    "Adobe Photoshop"          => "Audacity",
    "Adobe Premiere Pro"       => "7-Zip",
    "Adobe Audition"           => "GIMP",
    "Microsoft Visual Studio"  => "Jellyfin",
    "WinRAR"                   => "Kdenlive",
    "Google Chrome"            => "VirtualBox",
    "VMware Workstation"       => "Firefox",
    "Spotify"                  => "Eclipse"
];

// --- Récupération de l'état actuel (associations faites) ---
session_start();

// Quand on charge le défi
if (!isset($_SESSION['shuffled_colors'])) {
    $_SESSION['shuffled_colors'] = shuffle_assoc($colors);
}

if (!isset($_SESSION['shuffled_solutions'])) {
    $_SESSION['shuffled_solutions'] = shuffle_assoc($solutions);
}

// On utilise les versions mélangées stockées
$colors = $_SESSION['shuffled_colors'];
$solutions = $_SESSION['shuffled_solutions'];

$defi_id = $_GET['id'];

if (!isset($_SESSION["pairs"])) {
    $_SESSION["pairs"] = [
        "Microsoft Windows" => null,
        "Microsoft Office" => null,
        "Adobe Photoshop" => null,
        "Adobe Premiere Pro" => null,
        "Adobe Audition" => null,
        "Microsoft Visual Studio" => null,
        "WinRAR" => null,
        "Google Chrome" => null,
        "VMware Workstation" => null,
        "Spotify" => null
    ];
}

// Effacer les associations
if (isset($_POST["reset"])) {
    $_SESSION["pairs"] = [
        "Microsoft Windows" => null,
        "Microsoft Office" => null,
        "Adobe Photoshop" => null,
        "Adobe Premiere Pro" => null,
        "Adobe Audition" => null,
        "Microsoft Visual Studio" => null,
        "WinRAR" => null,
        "Google Chrome" => null,
        "VMware Workstation" => null,
        "Spotify" => null
    ];
    $activeLetter = null;
    $_GET["select_number"] = null;
    header("Location: defi_test2.php?id=2");
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
        $results[$letter] = $num;
    }
    if ($results == $solutions) {
        $_SESSION['defis'][$defi_id] = true;
        echo "Bien joué ! C'est la bonne réponse !";
    } elseif ($results == $hidden_solutions) {
        header("Location: snake.php");
	}
	else {
        echo "Hmm, réessaie...";
    }
}
if ($_SESSION['defis'][$defi_id]) {
    echo "<p><a href='../ndi-les_apprutie/index.php'>Retour aux cartes</a></p>";
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
            width: 210px;
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

<h1>Associer le logiciel propriétaire à son équivalent libre</h1>

<div class="container">

	<!-- COLONNE LETTRES -->
	<div class="column">
        <?php foreach ($colors as $letter => $color): ?>
            <?php
            $isActive = ($activeLetter === $letter);
            $url = "?select_letter=$letter";
            $id = "id=" . $_GET['id'];
            ?>
			<a href="<?= $url . '&' . $id?>"
			   class="item <?= $isActive ? 'active' : '' ?>"
			   style="background: <?= $color ?>;">
                <?= $letter ?>
			</a>
        <?php endforeach; ?>
	</div>

	<!-- COLONNE CHIFFRES -->
	<div class="column">
        <?php foreach ($solutions as $k => $v): ?>
            <?php
            $associatedColor = null;
            foreach ($_SESSION["pairs"] as $letter => $value) {
                if ($value == $v) {
                    $associatedColor = $colors[$letter];
                }
            }

            // Clic sur numéro seulement si une lettre active existe
            if ($activeLetter) {
                $url = "?active=$activeLetter&select_number=$v" . '&' . $id;
            } else {
                $url = "?" . $id;
            }
            ?>

			<a href="<?= $activeLetter ? $url : '#' ?>"
			   class="item <?= !$activeLetter ? 'disabled' : '' ?>"
			   style="background: <?= $associatedColor ?>;">
                <?= $v ?>
			</a>
        <?php endforeach; ?>
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
			<strong><?= $letter ?></strong> :
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
