<html>
 <head>
   <title>EDV-Nummer Rechner</title>
   <link rel="stylesheet" href="style.css">
  </head>
<body>
  <h1>EDV-Nummer Rechner</h1>

  Nummer eingeben: 

  <form method=post>
  <input type="text" name="nummerInput"> <br><br>
  <input type="submit" name="absenden" value="Rechnen">
  </form>

  <?php
  if(isset($_POST["absenden"])){

    $nummerIn=$_POST["nummerInput"];
    
    if(strlen($nummerIn)==7){
      if(substr($nummerIn, -4,1)==" "){
      $nummerA= array(
        0 => substr($nummerIn, -7,1),
        1 => substr($nummerIn, -6,1),
        2 => substr($nummerIn, -5,1),
        3 => substr($nummerIn, -3,1),
        4 => substr($nummerIn, -2,1),
        5 => substr($nummerIn, -1,1));
        
        $verhalten=1;
      }else{
        $verhalten=0;
      }
    }elseif(strlen($nummerIn)==6){
      $nummerA = str_split($nummerIn);
      $verhalten=1;
    }else{
      $verhalten=0;
    }

    

    if($verhalten==1){
    $erg=$nummerA[0]+$nummerA[2]+$nummerA[4];

    $z=$nummerA[1]*2;
    if($z>9){
      $erg=$erg+$z-9;
    }else{
      $erg=$erg+$z;
    }

    $z=$nummerA[3]*2;
    if($z>9){
      $erg=$erg+$z-9;
    }else{
      $erg=$erg+$z;
    }


    $z=$nummerA[5]*2;
    if($z>9){
      $erg=$erg+$z-9;
    }else{
      $erg=$erg+$z;
    }

    $erg=substr($erg, -1);

    if($erg==0){
      $pruefziffer=0;
    }else{
      $pruefziffer=10-$erg;
    }

    echo("Die Nummer lautet: <b>".$nummerA[0].$nummerA[1].$nummerA[2]." ".$nummerA[3].$nummerA[4].$nummerA[5]."-".$pruefziffer."</b>");
    }else{
      echo ("Gib eine geeignete Nummer ein! <br>Beispiel: 078 468)");
    }

  }
?>
</body>
</html>
