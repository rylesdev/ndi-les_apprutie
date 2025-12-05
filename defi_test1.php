<?php

session_start();
$message = '';
$defi_id = $_GET['id'];
$bonne_reponse = ['A2', 'A3', 'B2', 'B3', 'C2', 'C3', 'D2', 'D3']; // bonnes réponses pour défi 1

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reponsebis = $_POST['qcm'] ?? [];
    $reponse = isset($_POST['response']) ? array_merge((array)$reponsebis, (array)$_POST['response']) : $reponsebis;
    if (count($reponse) == count($bonne_reponse)) {
        sort($reponse);
        sort($bonne_reponse);
        $correct = ($reponse === $bonne_reponse);
        if ($correct) {
            $_SESSION['defis'][$defi_id] = true;
            $message = 'BRAVO !!! Bonne reponse :)';
        } else {
            $message = 'mauvaise réponse';
        }
    } else {
        $message = 'continuer de remplir le test';
    }
}
if ($_SESSION['defis'][$defi_id]) {
    echo "<p><a href='index.php'>Retour aux cartes</a></p>";
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Défi <?php echo $defi_id; ?> — QCM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #ffb6c1;
            margin: 0;
            padding: 40px 0;
            text-align: center;
        }

        .question {
            margin-bottom: 30px;
            font-size: 20px;
        }

        form {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            width: 900px;
            margin: 0 auto;
            padding: 20px;
            justify-items: center;
        }

        .qcm-block {
            background: rgba(255, 255, 255, 0.07);
            border-radius: 10px;
            padding: 18px 0 10px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            min-width: 320px;
            min-height: 260px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            width: 340px;
            height: 260px;
        }

        .qcm-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 18px;
            color: #fff;
            text-align: center;
            width: 100%;
            padding: 0 10px;
        }

        .qcm-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px 30px;
            width: 100%;
            height: 100%;
            justify-items: stretch;
            align-items: stretch;
        }

        .qcm-grid label {
            background: none;
            border-radius: 8px;
            font-size: 20px;
            min-height: unset;
            box-shadow: none;
            border: none;
            transition: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        form input[type=submit] {
            grid-column: span 2;
            background-color: #34d399;
            border: none;
            padding: 18px 30px;
            border-radius: 12px;
            cursor: pointer;
            color: white;
            font-size: 24px;
            font-weight: bold;
            transition: 0.2s;
            margin-top: 10px;
            width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        form input[type=submit]:hover {
            opacity: 0.85;
            transform: scale(1.03);
        }

        form br {
            display: none;
        }

        form label:has(input:checked) {
            background: rgba(255, 255, 255, 0.18);
            border-color: #fff;
            box-shadow: 0 0 8px #fff;
            transform: scale(0.90);
            z-index: 1;
        }

        form input[type=checkbox] {
            transform: scale(1.5);
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Défi <?php echo $defi_id; ?></h1>


    <div class="question">Ce QCM contient : faux / vrai / vrai / faux. Quelle est la bonne réponse ?</div>


    <form method="post">
        <div class="qcm-block">
            <div class="qcm-title">Question A : Choisissez les bonnes réponses</div>
            <div class="qcm-grid">
                <label><input type="checkbox" name="qcm[]" value="A1"> Faux</label>
                <label><input type="checkbox" name="qcm[]" value="A2"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="A3"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="A4"> Faux</label>
            </div>
        </div>
        <div class="qcm-block">
            <div class="qcm-title">Question B : Sélectionnez les affirmations vraies</div>
            <div class="qcm-grid">
                <label><input type="checkbox" name="qcm[]" value="B1"> Faux</label>
                <label><input type="checkbox" name="qcm[]" value="B2"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="B3"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="B4"> Faux</label>
            </div>
        </div>
        <div class="qcm-block">
            <div class="qcm-title">Question C : Cochez les bonnes cases</div>
            <div class="qcm-grid">
                <label><input type="checkbox" name="qcm[]" value="C1"> Faux</label>
                <label><input type="checkbox" name="qcm[]" value="C2"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="C3"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="C4"> Faux</label>
            </div>
        </div>
        <div class="qcm-block">
            <div class="qcm-title">Question D : Indiquez les réponses correctes</div>
            <div class="qcm-grid">
                <label><input type="checkbox" name="qcm[]" value="D1"> Faux</label>
                <label><input type="checkbox" name="qcm[]" value="D2"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="D3"> Vrai</label>
                <label><input type="checkbox" name="qcm[]" value="D4"> Faux</label>
            </div>
        </div>
        <input type="submit" value="Valider">
    </form>
    <p><?php echo $message; ?></p>

    <!--<p><a href="index.php">Retour aux cartes</a></p>-->
</body>

</html>