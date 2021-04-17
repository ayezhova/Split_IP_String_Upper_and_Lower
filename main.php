<?php

  function SplitIP($ipstr, $isIPv4) {
    $upper = "";
    $lower = "";
    $delim = $isIPv4 ? "." : ":";
    $numSegments = $isIPv4 ? 4 : 8;

    $ipArray = explode($delim, $ipstr);
    foreach ($ipArray as $i => $segment) {
      $segArray = explode("-", $segment);
      if (count($segArray) == 1) {
        $lower = $lower.$segArray[0];
        $upper = $upper.$segArray[0];
      }
      else {
        $lower = $lower.$segArray[0];
        $upper = $upper.$segArray[1];
      }
      if ($i != $numSegments - 1) {
        $lower = $lower.$delim;
        $upper = $upper.$delim;
      }
    }
    return array("lower"=>$lower, "upper"=>$upper);
  }
  function SplitIPv4($ipstr) {
    $upper = "";
    $lower = "";

    $ipArray = explode(".", $ipstr);
    foreach ($ipArray as $i => $quad) {
      $quadArray = explode("-", $quad);
      if (count($quadArray) == 1) {
        $lower = $lower.$quadArray[0];
        $upper = $upper.$quadArray[0];
      }
      else {
        $lower = $lower.$quadArray[0];
        $upper = $upper.$quadArray[1];
      }
      if ($i != 3) {
        $lower = $lower.".";
        $upper = $upper.".";
      }
    }
    return array("lower"=>$lower, "upper"=>$upper);
  }


  $retv4 = SplitIP("100.10-255.2-10.200-255", true);
  echo $retv4["lower"]." ".$retv4["upper"]."\n";

  $retv6 = SplitIP("2001:0db8:85a3-ffff:0000-ffff:0000-ffff:8a2e-ffff:0370-ffff:7334-ffff", false);
  echo $retv6["lower"]." ".$retv6["upper"]."\n";

?>
