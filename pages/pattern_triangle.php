<?php  
function pickPattern($n, $pattern) {
    if (function_exists($pattern)) {
      $pattern($n);
    } else {
      echo "Pattern tidak tersedia";
    }
  }
  
  function upsideLeft($n) {
    echo "Triangle Upside Left <br> <br>";
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  
  function upsideRight($n) {
    echo "Triangle Upside Right <br> <br>";
    for ($i = 1; $i <= $n; $i++) {
      for ($j = $n-$i; $j >= 1; $j--) {
        echo "&nbsp;&nbsp;";
      }
      for ($k = 1; $k <= $i; $k++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  
  function downsideLeft($n) {
    echo "Triangle Downside Left <br> <br>";
    for ($i = $n; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  
  function downsideRight($n) {
    echo "Triangle Downside Right <br> <br>";
    for ($i = $n; $i >= 1; $i--) {
      for ($j = $n-$i; $j >= 1; $j--) {
        echo "&nbsp;&nbsp;";
      }
      for ($k = 1; $k <= $i; $k++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  pickPattern(5,"upsideLeft");
    echo "<br>";
  pickPattern(5,"upsideRight");
    echo "<br>";
  pickPattern(5,"downsideLeft");
    echo "<br>";
  pickPattern(5,"downsideRight");

  echo "<br>";

  // Pattern Modification

  function pickPattern2($n, $pattern) {
    if (function_exists($pattern)) {
      $pattern($n);
    } else {
      echo "Pattern tidak tersedia";
    }
  }
  
  function upsideLeft2($n) {
    echo "Triangle Upside Left <br> <br>";
    for ($i = 1; $i <= $n; $i++) {
      for ($j = 1; $j <= $i; $j++) {
        echo "$";
      }
      echo "<br>";
    }
  }
  
  function upsideRight2($n) {
    echo "Triangle Upside Right <br> <br>";
    for ($i = 1; $i <= $n; $i++) {
      for ($j = $n-$i; $j >= 1; $j--) {
        echo "&nbsp;&nbsp;";
      }
      for ($k = 1; $k <= $i; $k++) {
        echo "#";
      }
      echo "<br>";
    }
  }
  
  function downsideLeft2($n) {
    echo "Triangle Downside Left <br> <br>";
    for ($i = $n; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo "@";
      }
      echo "<br>";
    }
  }
  
  function downsideRight2($n) {
    echo "Triangle Downside Right <br> <br>";
    for ($i = $n; $i >= 1; $i--) {
      for ($j = $n-$i; $j >= 1; $j--) {
        echo "&nbsp;&nbsp;";
      }
      for ($k = 1; $k <= $i; $k++) {
        echo "*";
      }
      echo "<br>";
    }
  }
    pickPattern2(6,"upsideLeft2");
        echo "<br>";
    pickPattern2(9,"upsideRight2");
        echo "<br>";
    pickPattern2(10,"downsideLeft2");
        echo "<br>";
    pickPattern2(6,"downsideRight2");
?>