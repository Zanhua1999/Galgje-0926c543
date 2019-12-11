
<?php

$letter;
$isCorrect = false;

if (isset($_POST['submit']) && $_COOKIE['lives'] != 0)
{
  $letter = $_POST['submit'];
  for ($i=0; $i < strlen($_COOKIE['woord']); $i++)
  {
    if ($letter == $_COOKIE['woord'][$i])
    {
      $_COOKIE['woord_string'][$i] = $_COOKIE['woord'][$i];
      setcookie('woord_string', $_COOKIE['woord_string']);
      $isCorrect = true;
    }
  }

  if ($_COOKIE['won'] != 'true')
  {
    if (!$isCorrect)
    {
      if ($_COOKIE['lives'] > 0)
      {
        $_COOKIE['lives'] = $_COOKIE['lives'] - 1;
        setcookie('lives', $_COOKIE['lives']);
      }


      if ($_COOKIE['lives'] == 0)
      {
        $_COOKIE['message'] = 'YOU LOST :)';
        setcookie('message', $_COOKIE['message']);
      }

    }
  }

  if ($_COOKIE['woord_string'] == $_COOKIE['woord'])
  {
    $_COOKIE['message'] = 'YOU WIN!!';
    $_COOKIE['won'] = 'true';
    setcookie('message', $_COOKIE['message']);
    setcookie('won', $_COOKIE['won']);
  }


}



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
    <title>Galgje</title>
  </head>
  <body>

    <div class="container">
      <div class="linkerdiv">
        <div class="sub_div">
          <form class="form" action="game.php" method="post">
            <div class="section">
              <input type="submit" name="submit" value="q">
              <input type="submit" name="submit" value="w">
              <input type="submit" name="submit" value="e">
              <input type="submit" name="submit" value="r">
              <input type="submit" name="submit" value="t">
              <input type="submit" name="submit" value="y">
              <input type="submit" name="submit" value="u">
              <input type="submit" name="submit" value="i">
              <input type="submit" name="submit" value="o">
              <input type="submit" name="submit" value="p">
            </div>
            <div class="section">
              <input type="submit" name="submit" value="a">
              <input type="submit" name="submit" value="s">
              <input type="submit" name="submit" value="d">
              <input type="submit" name="submit" value="f">
              <input type="submit" name="submit" value="g">
              <input type="submit" name="submit" value="h">
              <input type="submit" name="submit" value="j">
              <input type="submit" name="submit" value="k">
              <input type="submit" name="submit" value="l">
            </div>
            <div class="section">
              <input type="submit" name="submit" value="z">
              <input type="submit" name="submit" value="x">
              <input type="submit" name="submit" value="c">
              <input type="submit" name="submit" value="v">
              <input type="submit" name="submit" value="b">
              <input type="submit" name="submit" value="n">
              <input type="submit" name="submit" value="m">
            </div>
          </form>
        </div>
        <div class="sub_div">
          <div class="streepjes_container">
            <?php
            for ($i=0; $i < strlen($_COOKIE['woord']); $i++)
            {
              echo "<h1 class='streepje'>" . $_COOKIE['woord_string'][$i] . "</h1>";
            }
             ?>
          </div>
        </div>
      </div>
      <div class="rechterdiv">
        <?php

        if (isset($_COOKIE['message']))
        {
          echo "<h1>" . $_COOKIE['message'] . "</h1>";
        }

        ?>
        <div class="img_container">
          <?php echo "<img src='img/hm" . $_COOKIE['lives'] . ".png' alt=''>" ?>
        </div>
      </div>
    </div>

  </body>
</html>
