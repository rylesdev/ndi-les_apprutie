
<?php
session_start();
$compteurjustes = 0; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $justerecyclable = [1,2,5,7,8]; 
    $justenonrecyclable = [3,4,6,9,10]; 

    $reponse_oui = $_POST['oui'] ; 
    $reponse_non = $_POST['non'] ;

    
    for ($i = 0; $i < count($justerecyclable); $i++) {
    if (in_array($justerecyclable[$i], $reponse_oui)) {
        $compteurjustes++;
    }
}


    for ($i = 0; $i < count($justenonrecyclable); $i++) {
    if (in_array($justenonrecyclable[$i], $reponse_non)) {
        $compteurjustes++;
    }
}


    echo "<script> alert( 'Vous avez $compteurjustes réponses correctes sur 10.');window.location.href = 'index.php';</script>";
}
?>


<!DOCTYPE html>
<html lang = "fr">
    <head> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Défis des photos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <style>
     .grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  justify-content: center;
  gap: 30px;
}

    </style>
</head>

<body>
    <h1> Défis photos </h1>
    <h3> Consigne : Classer les objets représentés sur les photos dans les deux catégories ci dessous. </h3>
    
<div class = "container">
    <div class="grid">
  
    <div>
    <figure>
    <img src="Images/9131.jpg" alt="Moniteur" width = 175>
    <figcaption>Moniteur <br> n°1 </br></figcaption>
</figure>
  </div>

  <div>
    <figure>
     <img src="Images/smartphone.jpg" alt="Smartphone" width = 175>
    <figcaption>Smartphone<br> n°2 </br></figcaption>
</figure>
  </div>

  <div>
    <figure>
     <img src="Images/remotecontrolle.jpg?=v2" alt="Télécommande" width = 175>
    <figcaption>Télécommande<br> n°3 </br></figcaption>
</figure>
  </div>

  <div>
    <figure>
     <img src="Images/camera.jpg" alt="Camera jetable" width = 175>
    <figcaption>Apareil photo jetable<br> n°4 </br></figcaption>
</figure>
</div>

  <div>
    <figure>
     <img src="Images/imprimante.jpg" alt="Imprimante" width = 175>
    <figcaption>Imprimante<br> n°5 </br></figcaption>
</figure>
  </div>

  <div>
    <figure>
     <img src="Images/leds.jpg" alt="Leds" width = 175>
    <figcaption>LEDs<br> n°6</br></figcaption>
</figure>
  </div>

  <div> 
  <figure>  
  <img src="Images/manette.jpg" alt="Manette" width = 175>
    <figcaption>Manette <br> n°7 </br></figcaption>
</figure>
</div>

  <div>
    <figure>
     <img src="Images/barretteram.jpg" alt="RAM" width = 175>
    <figcaption>Barette de RAM<br> n°8 </br></figcaption>
</figure>
</div>

<div>
    <figure>
     <img src="Images/cables.jpg" alt="Cables" width = 175>
    <figcaption>Cables (embouts brûlés) - n°9</figcaption>
</figure>
</div>


<div>
    <figure>
     <img src="Images/ecouteurs.jpg" alt="Ecouteurs filaires" width = 175>
    <figcaption>Ecouteurs filaires<br> n°10 </br></figcaption>
</figure>
  </div>

  

</div>
   
<form method = "POST">
<div class="row">
  <div class="column">
    <h4> Recyclable </h4>
<input type="checkbox" id="n1" name="oui[]" value="1">
<label for="n1"> N°1 : Moniteur</label><br>

<input type="checkbox" id="n2" name="oui[]" value="2">
<label for="n2"> N°2 : Smartphone</label><br>

<input type="checkbox" id="n3" name="non[]" value="3">
<label for="n3"> N°3 : Télécommande</label><br>

<input type="checkbox" id="n4" name="non[]" value="4">
<label for="n4"> N°4 : Appareil photo jetable</label><br>

<input type="checkbox" id="n5" name="oui[]" value="5">
<label for="n5"> N°5 : Imprimante</label><br>

<input type="checkbox" id="n6" name="non[]" value="6">
<label for="n6"> N°6 : LEDs</label><br>

<input type="checkbox" id="n7" name="oui[]" value="7">
<label for="n7"> N°7 : Manette</label><br>

<input type="checkbox" id="n8" name="oui[]" value="8">
<label for="n8"> N°8 : Barette de RAM</label><br>

<input type="checkbox" id="n9" name="non[]" value="9">
<label for="n9"> N°9 : Cables aux embouts brûlés</label><br>

<input type="checkbox" id="n10" name="non[]" value="10">
<label for="n10"> N°10 : Écouteurs filaires</label><br>
  </div>
  
  <div class="column">
       <h4> Non recyclable </h4>
<input type="checkbox" id="n1-2" name="oui[]" value="1">
<label for="n1-2"> N°1 : Moniteur</label><br>

<input type="checkbox" id="n2-2" name="oui[]" value="2">
<label for="n2-2"> N°2 : Smartphone</label><br>

<input type="checkbox" id="n3-2" name="non[]" value="3">
<label for="n3-2"> N°3 : Télécommande</label><br>

<input type="checkbox" id="n4-2" name="non[]" value="4">
<label for="n4-2"> N°4 : Appareil photo jetable</label><br>

<input type="checkbox" id="n5-2" name="oui[]" value="5">
<label for="n5-2"> N°5 : Imprimante</label><br>

<input type="checkbox" id="n6-2" name="non[]" value="6">
<label for="n6-2"> N°6 : LEDs</label><br>

<input type="checkbox" id="n7-2" name="oui[]" value="7">
<label for="n7-2"> N°7 : Manette</label><br>

<input type="checkbox" id="n8-2" name="oui[]" value="8">
<label for="n8-2"> N°8 : Barette de RAM</label><br>

<input type="checkbox" id="n9-2" name="non[]" value="9">
<label for="n9-2"> N°9 : Cables aux embouts brûlés</label><br>

<input type="checkbox" id="n10-2" name="non[]" value="10">
<label for="n10-2"> N°10 : Écouteurs filaires</label><br>
  </div>
</div>

<br>
<button type="submit" class = "btn-action">Valider ma réponse</button>
</form>

</body>
