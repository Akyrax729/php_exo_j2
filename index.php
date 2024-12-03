<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="PumpkinSpiceNyan.gif" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PHP - form</title>
</head>
<body>

                                                        <!-- TEST -->
    <form action="index.php" method="POST">
        <label for="testPair">Entrer un nombre</label> <br><br>
        <input id="testPair" type="number" name="testPair">
        <button>Test</button>
    </form>

    <p>
        <?php 
            if(isset($_POST['testPair'])){
                $testPair = $_POST['testPair'];
            };

            function EstPair ($even,$msg=NULL) {
                if ($even % 2 == 0){
                    if ($msg == 1) {
                        echo "Le nombre " . $even . " est pair.";
                    }
                    // return true;
                } else {
                    if ($msg == 1) {
                        echo "Le nombre " . $even . " n'est pas pair.";
                    }
                    // return false;
                };
            };     

            if(isset($_POST['testPair'])){
                echo $testPair . "<br>";
                echo EstPair($testPair,1);
            };
        ?>
    </p>
<br><br><br>
                                                        <!-- EXCERCICE 1 -->

<h2>EXERCICE 1</h2>
<?php 
    if (isset($_GET['loco']) && isset($_GET['loca'])) {
        echo "<p>La ville choisie est " . $_GET['loca'] . " et le voyage se fera en " . $_GET['loco'] . " !</p>";
    };
    // ?loca=Sidney&loco=vélo-moteur
?>

<br><br><br>
                                                        <!-- EXCERCICE 2 -->
<h2>EXERCICE 2</h2>
<form action="index.php">
    <label for="animal">Quel est votre animal préféré ?</label> <br><br>
    <input type="text" id="animal" name="animal">
    <button>Test</button>
</form>

<?php
    if (isset($_GET['animal'])) {
        $animal = $_GET['animal'];
    }
    if (isset($_GET['animal'])) {
        echo "<br>Votre animal préféré est : " . $animal;
    }
?>
<br><br><br>
                                                        <!-- EXCERCICE 3 -->
<h2>EXERCICE 3</h2>

<form action="index.php" method="POST">
    <label for="pseudo">Entrez votre pseudo</label> <br><br>
    <input type="text" id="pseudo" name="pseudo"> <br><br>

    <label for="">Choisissez une couleur</label><br><br>
    <input type="color" id="hex" name="hex"> <br><br>
    <button>Test</button>
</form>
<br><br>

<?php
if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
};
if (isset($_POST['hex'])) {
    $hex = $_POST['hex'];
};

if (isset($_POST['pseudo']) && isset($_POST['hex'])) {
    echo "<p style='background-color:".$hex."'>" . $pseudo . "</p>";
}

?>

<br><br><br>
                                                        <!-- EXCERCICE 4 -->
<h2>EXERCICE 4</h2>

<form id="de" action="index.php" method="POST">
    <label for="dice">Multiple de d6?</label> <br><br>
    <input type="text" id="dice" name="dice">
    <button>Test</button>
</form>
<?php

if (isset($_POST['dice'])){
    if (!empty($_POST['dice'])) {
        $dice = $_POST['dice'];
        if ($dice % 6 == 0 ) {   
                $result = rand(1, $dice);
                echo $result;
        } else {
            header('location:index.php?error=invalid');
        };
    };
};
if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
    echo "<p style='color: red;'>Erreur : Le nombre doit être un multiple de 6.</p>";
}
?>

<br><br><br>
                                                        <!-- EXCERCICE 5 -->
<h2>EXERCICE 5</h2>
<form action="index.php" method="POST">
    <label for="user">Username</label>
    <input type="text" id="user" name="user">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <button>Test</button>
</form>
<?php 
$password = $_POST['password'];
    if ($_POST['user'] !== 'admin' || $_POST['password'] !== '1234') {
        echo "erreur";
    } else {
        header('location:logon.php');
    }
    $pw = password_hash($password, PASSWORD_ARGON2I);
    var_dump($pw);
?>
<!-- 
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
░░░░░░░░░░▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄░░░░░░░░░
░░░░░░░░▄▀░░░░░░░░░░░░▄░░░░░░░▀▄░░░░░░░
░░░░░░░░█░░▄░░░░▄░░░░░░░░░░░░░░█░░░░░░░
░░░░░░░░█░░░░░░░░░░░░▄█▄▄░░▄░░░█░▄▄▄░░░
░▄▄▄▄▄░░█░░░░░░▀░░░░▀█░░▀▄░░░░░█▀▀░██░░
░██▄▀██▄█░░░▄░░░░░░░██░░░░▀▀▀▀▀░░░░██░░
░░▀██▄▀██░░░░░░░░▀░██▀░░░░░░░░░░░░░▀██░
░░░░▀████░▀░░░░▄░░░██░░░▄█░░░░▄░▄█░░██░
░░░░░░░▀█░░░░▄░░░░░██░░░░▄░░░▄░░▄░░░██░
░░░░░░░▄█▄░░░░░░░░░░░▀▄░░▀▀▀▀▀▀▀▀░░▄▀░░
░░░░░░█▀▀█████████▀▀▀▀████████████▀░░░░
░░░░░░████▀░░███▀░░░░░░▀███░░▀██▀░░░░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
 -->
</body>
</html>