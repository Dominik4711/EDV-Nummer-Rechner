<!DOCTYPE html>
<html lang="de">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>EDV-Nummer Rechner</title>
   <link rel="stylesheet" href="style.css">
  </head>
<body>
<div class="wrapper">  <h1>Prüfziffern Rechner</h1>

  <form method=post>
  <input type="text" name="nummerInput" placeholder="Nummer eingeben">
  <input id="s"type="submit" name="absenden" value="Rechnen">
  </form>

  <?php
  if(isset($_POST["absenden"])){

    $nummerIn=$_POST["nummerInput"];

    if(strlen($nummerIn)>=4){
      $uic = str_replace(' ', '', $nummerIn);
      $uic = str_replace('-', '', $uic);
      $uic = str_split($uic); // Split string in elements of array
      $uicl = count($uic)-1; // Get the lenght of Array
      for($i=$uicl; $i >= 0; $i = $i - 2){
        $prf[$i] = $uic[$i] * 2;
      }
      for($i=$uicl-1; $i >= 0; $i = $i - 2){
        $prf[$i] = $uic[$i];
      }
      $przf = 0;
      for($i=$uicl; $i >= 0; $i = $i-1){ //Create loop for calculating "Prüfziffer" for 21212121 and so on
        if($prf[$i] > 9){
          $pz = str_split($prf[$i]); // Split string into digit array
          $prf[$i] = $pz[0] + $pz[1];
        }
        $przf = $prf[$i] + $przf; // create sum of array elements.
      }

      $przf = str_split($przf);
      if(count($przf)>1){ // Check for sum < 10. Do else statement.
      if($przf[1] != 0){ // If sum is > 10 just take second digit and subtract it.
      $pruefziffer = 10 - $przf[1];
    } else {
      $pruefziffer = 0;
    }}else{
      $pruefziffer = 10 - $przf[0];
    }
    if($uicl > 5){
      echo("Die Nummer lautet: <b>".$uic[0].$uic[1].$uic[2].$uic[3]." ".$uic[4].$uic[5].$uic[6]."-".$pruefziffer."</b>");
    } elseif($uicl <= 5)
    echo("Die Nummer lautet: <b>".$uic[0].$uic[1].$uic[2]." ".$uic[3].$uic[4].$uic[5]."-".$pruefziffer."</b>");
    }else{
      echo ("Gib eine geeignete Nummer ein! <br>Beispiel: 078 468)");
    }

  }
?>
</div>
<footer>
  <a href="#">Impressum</a>
  <a href="#">Datenschutz</a>
  <a href="#">Eisenbahn Bebra</a>
</footer>
</body>
</html>
