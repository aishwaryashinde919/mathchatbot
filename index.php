<?

function operate($param1, $param2, $operation) {
    if ($operation == "plus") {
      return $param1 . " plus " . $param2 . " is " . ($param1 + $param2) . ".";
    }
    if ($operation == "minus") {
      return $param1 . " minus " . $param2 . " is " . ($param1 - $param2) . ".";
    }
    if ($operation == "times") {
       return $param1 . " times " . $param2 . " is " . ($param1 * $param2) . ".";
       #return "https://www.amazon.in/Moto-Plus-Lunar-Grey-64GB/dp/B071HWTHPH/ref=sr_1_1?ie=UTF8&qid=1507370524&sr=8-1&keywords=moto+g5+s+plus";
    }
    if ($operation == "divided by") {
      return $param1 . " divided by " . $param2 . " is " . ($param1 / $param2) . ".";
    }
    return "Unknown operation.";
  }
  $json = file_get_contents('php://input');
  $input = json_decode($json, true);
  $parameters = $input["result"]["parameters"];
  $number1 = (int)$parameters["number-integer1"];
  $number2 = (int)$parameters["number-integer2"];
  $operation = $parameters["operation"];
  $outString = operate($number1, $number2, $operation);
  header("Content-type: application/json");
  $out = array(
    "speech" => $outString,
    "displayText" => $outString,
    "source" => "agent"
  );
  echo(json_encode($out));

?>
