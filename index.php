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
<div class="wrapper">  <h1>EDV-Nummer Rechner</h1>

  <p>Nummer eingeben:</p>

  <form method=post>
  <input type="text" name="nummerInput">
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
      for($i=$uicl; $i >= 0; $i = $i-1){
        if($prf[$i] > 9){
          $pz = str_split($prf[$i]);
          $prf[$i] = $pz[0] + $pz[1];
        }
        $przf = $prf[$i] + $przf;

      }
      $przf = str_split($przf);
      if(count($przf)>1){
      if($przf[1] != 0){
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
</body>
</html>
