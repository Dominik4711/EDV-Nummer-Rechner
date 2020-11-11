
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

    if(strlen($nummerIn)>=7){
      $uic = trim($nummerIn, "\x00..\x1F-"); // clean array of special characters

      $uic = str_split($uic); // Split string in elements of array
      $uicl = count($uic)-1; // Get the lenght of Array

      for ($i = 1;  $i <= $uicl; $i+1){  // Hier ist noch eine Menge Arbeit. Ich versuche den Algorythmmus expandebel zu machen, sodass auch der 1440 z.b. dazu kann. Die Prüfziffer ensteht immer nach dem System 1212121 usw., die letzte Ziffer kann dabei als fixer Startpunkt gesehen werden.
        if($i % 2 == 0){
          $prf[$i] = $uic[$i];
        } else {
          $prf[$i] = $uic[$i] * 2 ;
        }
      }
      print_r($prf);
      print_r($uic);

      echo $uicl;

    echo("Die Nummer lautet: <b>".$nummerA[0].$nummerA[1].$nummerA[2]." ".$nummerA[3].$nummerA[4].$nummerA[5]."-".$pruefziffer."</b>");
    }else{
      echo ("Gib eine geeignete Nummer ein! <br>Beispiel: 078 468)");
    }

  }
?>
</body>
</html>
