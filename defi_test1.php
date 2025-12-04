<?php

session_start();
$message = '';
$defi_id = $_GET['id'];
$bonne_reponse = [1 => 'b', 2 => 'c'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reponse = $_POST['qcmi'];
    $_SESSION['defis'][$id] = $reponse == $bonne_repon;
    if ($_SESSION[''][$id]) {
        $message = 'bravo bonne reponse';
    }
    else {
        $message = 'mauvaise réponse';
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Défi <?php echo $defi_id; ?> — QCM</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #f5f5f5
        }

        .question {
            font-weight: bold;
            margin-bottom: 10px
        }

        input[type=submit] {
            margin-top: 10px
        }
    </style>
</head>

<body>
    <h1>Défi <?php echo $defi_id; ?></h1>


    <div class="question">Ce QCM contient : faux / vrai / vrai / faux. Quelle est la bonne réponse ?</div>


    <form method="post">
        <label><input type="radio" name="qcm" value="a"> Faux</label><br>
        <label><input type="radio" name="qcm" value="b"> Vrai</label><br>
        <label><input type="radio" name="qcm" value="c"> Vrai</label><br>
        <label><input type="radio" name="qcm" value="d"> Faux</label><br>


        <input type="submit" value="Valider">
    </form>


    <p><?php echo $message; ?></p>


    <p><a href="index.php">Retour aux cartes</a></p>
</body>

</html>