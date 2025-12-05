<?php

session_start();
$message = '';
$defi_id = $_GET['id'];
$bonne_reponse = ['b', 'c']; // bonnes réponses pour défi 1

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reponse = $_POST['qcm'] ?? [];
    sort($reponse);
    sort($bonne_reponse);
    $correct = ($reponse === $bonne_reponse);
    if ($correct) {
        $_SESSION['defis'][$defi_id] = true;
        $message = 'BRAVO !!! Bonne reponse :)';
    } else {
        $message = 'mauvaise réponse';
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


form br {
    display: none;
}


form {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;            
    width: 500px;          
    margin: 0 auto;        
    padding: 20px;
}


form label {
    background: rgba(255,182,193,0.15);
    padding: 25px;         
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid transparent;
    font-size: 22px;       
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.25s;
    min-height: 80px;      
}


form label:hover {
    background: rgba(255,182,193,0.25);
    transform: scale(1.03);
}


form label:has(input:checked) {
    background: rgba(255,255,255,0.25);
    border-color: white;
    box-shadow: 0 0 18px white;
    transform: scale(1.07);
}


form input[type=checkbox] {
    transform: scale(1.5);
    margin-right: 10px;
}


input[type=submit] {
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
}

input[type=submit]:hover {
    opacity: 0.85;
    transform: scale(1.03);
}





    </style>
</head>

<body>
    <h1>Défi <?php echo $defi_id; ?></h1>


    <div class="question">Ce QCM contient : faux / vrai / vrai / faux. Quelle est la bonne réponse ?</div>


    <form method="post">
        <label><input type="checkbox" name="qcm[]" value="a"> Faux</label><br>
        <label><input type="checkbox" name="qcm[]" value="b"> Vrai</label><br>
        <label><input type="checkbox" name="qcm[]" value="c"> Vrai</label><br>
        <label><input type="checkbox" name="qcm[]" value="d"> Faux</label><br>


        <input type="submit" value="Valider">
    </form>


    <p><?php echo $message; ?></p>

    <!--<p><a href="index.php">Retour aux cartes</a></p>-->
</body>

</html>