<?php
require_once "throwDice.php";

$diceSides = 6;
$diceAmount = 2;

if (isset($_GET["diceSides"])) {
    $diceSides = (int) filter_input(INPUT_GET, 'diceSides', FILTER_SANITIZE_SPECIAL_CHARS);
    $diceAmount = (int) filter_input(INPUT_GET, 'diceAmount', FILTER_SANITIZE_SPECIAL_CHARS);
}

$dice = new Dice($diceSides);
$diceRolled = $dice->rollDice($diceAmount);

function printRolledDices($rolls){
    $orderedList = "<ol>";
    foreach ($rolls as $roll){
        $orderedList .= "<li>" . $roll . "</li>";
    }
    $orderedList .= "</ol>";
    return $orderedList;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Roll Dices</title>
        <meta charset="utf8">
    </head>
    <body>
        <form action="" method="GET">
            <label for="diceAmount">Number of Dices:</label><br><input tyoe="text" name="diceAmount" id="diceAmount">
            <br><br>
            <label for="diceSides">Number of Sides:</label><br><input type="text" name="diceSides" id="diceSides">
            <br>
            <input type="submit" value="Roll Dices">
        </form>
        <h2>Rolled Dices</h2>
        <ul>
            <li>Amount of sides on the dice: <?php echo $diceRolled["diceSides"] ?></li>
            <li>Amount of rolled dices: <?php echo $diceRolled["rolls"] ?></li>
            <li>Sum of the rolled dices: <?php echo $diceRolled["sum"] ?></li>
            <li>Rolls:
                <?php echo printRolledDices($diceRolled["dice"]); ?>
            </li>
        </ul>
    </body>
</html>