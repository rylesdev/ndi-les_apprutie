<?php

?>

<!DOCTYPE html>
<html lang = "fr">
    <head> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Défis des photos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
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
     <img src="Images/remotecontrolle.jpg" alt="Télécommande" width = 175>
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
    <figcaption>Imprimante<br> n°3 </br></figcaption>
</figure>
  </div>

  <div>
    <figure>
     <img src="Images/leds.jpg" alt="Leds" width = 175>
    <figcaption>LEDs<br> n°9 </br></figcaption>
</figure>
  </div>

  <div> 
  <figure>  
  <img src="Images/manette.jpg" alt="Manette" width = 175>
    <figcaption>Manette <br> n°4 </br></figcaption>
</figure>
</div>

  <div>
    <figure>
     <img src="Images/barretteram.jpg" alt="RAM" width = 175>
    <figcaption>Barette de RAM<br> n°5 </br></figcaption>
</figure>
</div>

<div>
    <figure>
     <img src="Images/cables.jpg" alt="Cables" width = 175>
    <figcaption>Cables (embouts brûlés) - n°6</figcaption>
</figure>
</div>


<div>
    <figure>
     <img src="Images/ecouteurs.jpg" alt="Ecouteurs filaires" width = 175>
    <figcaption>Ecouteurs filaires<br> n°8 </br></figcaption>
</figure>
  </div>

  

</div>
    
<div class="row">
  <div class="column">
    <h4> Recyclable </h4>
<input type="checkbox" id="n1" name="n1" value="n1">
<label for="n1"> N°1 : Moniteur</label><br>

<input type="checkbox" id="n2" name="n2" value="n2">
<label for="n2"> N°2 : Smartphone</label><br>

<input type="checkbox" id="n3" name="n3" value="n3">
<label for="n3"> N°3 : Imprimante</label><br>

<input type="checkbox" id="n4" name="n4" value="n4">
<label for="n4"> N°4 : Manette</label><br>

<input type="checkbox" id="n5" name="n5" value="n5">
<label for="n5"> N°5 : Barette de RAM</label><br>

<input type="checkbox" id="n6" name="n6" value="n6">
<label for="n6"> N°6 : Cables aux embouts brûlés</label><br>

<input type="checkbox" id="n7" name="n7" value="n7">
<label for="n7"> N°7 : Appareil photo jetable</label><br>

<input type="checkbox" id="n8" name="n8" value="n8">
<label for="n8"> N°8 : Ecouteurs filaires</label><br>

<input type="checkbox" id="n9" name="n9" value="n9">
<label for="n9"> N°9 : LEDs</label><br>

<input type="checkbox" id="n10" name="n10" value="n10">
<label for="n10"> N°10 : Télécommande</label><br>
  </div>
  
  <div class="column">
       <h4> Non recyclable </h4>
<input type="checkbox" id="n1" name="n1" value="n1">
<label for="vehicle1"> N°1 : Moniteur</label><br>

<input type="checkbox" id="n2" name="n2" value="n2">
<label for="vehicle1"> N°2 : Smartphone</label><br>

<input type="checkbox" id="n3" name="n3" value="n3">
<label for="vehicle1"> N°3 : Imprimante</label><br>

<input type="checkbox" id="n4" name="n4" value="n4">
<label for="vehicle1"> N°4 : Manette</label><br>

<input type="checkbox" id="n5" name="n5" value="n5">
<label for="vehicle1"> N°5 : Barette de RAM</label><br>

<input type="checkbox" id="n6" name="n6" value="n6">
<label for="vehicle1"> N°6 : Cables aux embouts brûlés</label><br>

<input type="checkbox" id="n7" name="n7" value="n7">
<label for="vehicle1"> N°7 : Appareil photo jetable</label><br>

<input type="checkbox" id="n8" name="n8" value="n8">
<label for="vehicle1"> N°8 : Ecouteurs filaires</label><br>

<input type="checkbox" id="n9" name="n9" value="n9">
<label for="vehicle1"> N°9 : LEDs</label><br>

<input type="checkbox" id="n10" name="n10" value="n10">
<label for="vehicle1"> N°10 : Télécommande</label><br>
  </div>
</div>

<button type="button">Valider ma réponse</button>


</body>
