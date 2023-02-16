<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deposit</title>
</head>
<body>
  <a href="../">back</a>
<?php

function depositCalculate($deposit, $months, $rate)
{
    $years = $months / 12;
    $interestRate = $rate / 100;
    $result = $deposit * (1 + $interestRate * $years);
    return $result;
}

echo depositCalculate(5000, 18, 50);

?>
</body>
</html>