<?php
// دریافت مقادیر از فرم:
$number1 = $_REQUEST['num1'];
$number2 = $_REQUEST['num2'];
$req = $_REQUEST['req'];

if ($req == "add") {
    echo $number1 + $number2;
} elseif ($req == "sub") {
    echo $number1 - $number2;
} elseif ($req == "mult") {
    echo $number1 * $number2;
} elseif ($req == "div") {
    echo $number1 / $number2;
}
