<?php
session_start();
$error = "";
$numsArray = "";
$mathNum = "";
$newNum = 0;
$startCount = true;
if (!isset($_SESSION['nums'])) {
    $nums = array(2);
    $_SESSION['nums'] = $nums;
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['number']) && is_numeric($_POST['number'])) {
        $_SESSION['nums'][] = $_POST['number'];
        foreach ($_SESSION['nums'] as $number) {
            $numsArray = $numsArray . $number . " ";
            $newNum = $newNum + intval($number);
            if ($startCount) {
                $startCount = false;
                $mathNum = $mathNum . $number;
            } else {
                $mathNum = $mathNum . "+" . $number;
            }
        }
        $mathNum = $mathNum . "=" . $newNum;
    } else {
        $error = "vul iets geldigs in";
    }
}
if (isset($_POST['clear'])) {
    session_unset();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post"   action="">
        <label for="num">vul een getal in</label><br>
        <input id="num" name="number" type="text"><br>
        <button name="submit">Add</button>
        <button name="clear">Clear</button>
    </form>
    <h5>
        <?= $numsArray ?><br>
        <?= $mathNum ?><br>
        <?= $error ?>
    </h5>
</body>
</html>