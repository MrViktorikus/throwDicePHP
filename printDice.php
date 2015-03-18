<?php
require_once "throwDice.php";

$diceSides = 6;
$diceAmount = 1;

if (isset($_GET["sides"], $_GET["amount"])) {
    if ($_GET["sides"] > 0) {
        $diceSides = (int) filter_input(INPUT_GET, 'sides', FILTER_SANITIZE_SPECIAL_CHARS);
        $diceAmount = (int) filter_input(INPUT_GET, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        echo "Error 404 u suk u should enter amount and sides naab<br><br>";
    }
}

$dice = new Dice($diceSides);
$diceRolled = $dice->rollDice($diceAmount);

function printRolledDie($rolls) {
    $orderedList = "<ol>";
    foreach ($rolls as $roll) {
        $orderedList .= "<li>" . $roll . "</li>";
    }
    $orderedList .= "</ol>";
    return $orderedList;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Roll Die</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div id="wrapper">
        <h2>Dice Roller: The Game</h2>
        <form action="" method="GET">
            
            <label for="amount" class="subtitle">Number of Die:</label><br><input type="text" name="amount" id="input">
            <br><br>
            <label for="sides" class="subtitle">Number of Sides:</label><br><input type="text" name="sides" id="input">
            <br>
            <input id="submit-button" type="submit" value="Roll Die">
        </form>
        <h2>Rolled Die</h2>
        <ul>
            <li>Amount of sides on the die: <?php echo $diceRolled["sides"] ?></li>
            <li>Amount of rolled dice: <?php echo $diceRolled["rolls"] ?></li>
            <li>Sum of the rolled dice: <?php echo $diceRolled["sum"] ?></li>
            <li>Rolls:
                <?php echo printRolledDie($diceRolled["dice"]); ?>
            </li>
        </ul>
    </div>
    </body>
</html>