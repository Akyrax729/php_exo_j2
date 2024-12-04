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
        <label for="testPair">Entrer un nombre</label> 
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
                echo $testPair . "";
                echo EstPair($testPair,1);
            };
        ?>
    </p>

                                                        <!-- EXCERCICE 1 -->

<h2>EXERCICE 1</h2>
<?php 
    if (isset($_GET['loco']) && isset($_GET['loca'])) {
        echo "<p>La ville choisie est " . $_GET['loca'] . " et le voyage se fera en " . $_GET['loco'] . " !</p>";
    };
    // ?loca=Sidney&loco=vélo-moteur
?>

                                                        <!-- EXCERCICE 2 -->
<h2>EXERCICE 2</h2>
<form action="index.php">
    <label for="animal">Quel est votre animal préféré ?</label> 
    <input type="text" id="animal" name="animal">
    <button>Test</button>
</form>

<?php
    if (isset($_GET['animal'])) {
        $animal = $_GET['animal'];
    }
    if (isset($_GET['animal'])) {
        echo "Votre animal préféré est : " . $animal;
    }
?>

                                                        <!-- EXCERCICE 3 -->
<h2>EXERCICE 3</h2>

<form action="index.php" method="POST">
    <label for="pseudo">Entrez votre pseudo</label> 
    <input type="text" id="pseudo" name="pseudo"> 

    <label for="">Choisissez une couleur</label>
    <input type="color" id="hex" name="hex"> 
    <button>Test</button>
</form>

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

                                                        <!-- EXCERCICE 4 -->
<h2>EXERCICE 4</h2>

<form id="de" action="index.php" method="POST">
    <label for="dice">Multiple de d6?</label> 
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

                                                        <!-- EXCERCICE 5 -->
<h2>EXERCICE 5</h2>
<form id="ex5" action="index.php" method="POST">
    <label for="user">Username</label>
    <input type="text" id="user" name="user">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <button>Test</button>
</form>
<?php 

    if (isset($_POST['user'])  && isset($_POST['password'] )) {
        if ($_POST['user'] !== 'admin' || $_POST['password'] !== '1234') {
            echo "erreur";
        } else {
            header('location:logon.php');
        }
        $password = $_POST['password'];
        $pw = password_hash($password, PASSWORD_ARGON2I);
        var_dump($pw);
    }  
?>

                                                        <!-- EXCERCICE 6 -->
<h2 id="ex6">EXERCICE 6</h2>

<form action="index.php#ex6" method="POST">
    <label for="valeur1">Valeur 1</label> 
    <input type="number" id="valeur1" name="valeur1"> 
    <label for="valeur2">Valeur 2</label> 
    <input type="number" id="valeur2" name="valeur2"> 
    <label for="operateur">Opérateur</label> 
    <select name="operateur" id="operateur">
        <option value="+">ADDITION</option>
        <option value="-">SOUSTRACTION</option>
        <option value="*">MULTIPLIER</option>
        <option value="/">DIVISER</option>
    </select> 
    <button>Test</button>
</form>

<?php 
    if (isset($_POST['valeur1']) && isset($_POST['valeur2'])){
        $var1 = floatval($_POST['valeur1']);
        $var2 = floatval($_POST['valeur2']);
        $ope = $_POST['operateur'];
        switch ($ope) {
            case '+': 
                echo $var1 + $var2;
                break;
            case '-': 
                echo $var1 - $var2;
                break;
            case '*': 
                echo $var1 * $var2;
                break;
            case '/': if ($var1 / $var2 != 0) {
                echo $var1 / $var2;
            }
                else {
                    echo "Erreur : Division par zéro.";
                }
                break;
        };
    }
?>

                                                        <!-- EXCERCICE 7 -->
<h2>EXERCICE 7</h2>

<form id="ex7" action="index.php" method="POST">
    <input type="number" name="euro" id="euro"><label for="euro">€</label>
    <p> en </p>
    <select name="convertisseur" id="convertisseur">
        <option value="yen">Yen</option>
        <option value="usd">Dollar Américain</option>
        <option value="aud">Dollar Australien</option>
    </select>
    <button>Test</button>
</form>

<?php 
    if (isset($_POST['euro'])) {
        $eur = $_POST['euro'];
        $conv = $_POST['convertisseur'];
        switch ($conv) {
            case 'yen' :
                echo $eur * 157.96;
                break;
            case 'usd':
                echo $eur * 1.05;
                break;
            case 'aud':
                echo $eur * 1.63;
                break;
        }
    }
?>

                                                        <!-- EXCERCICE 8 -->
<h2>EXERCICE 8</h2>

<form id="ex8" action="index.php#ex8" method="POST">
    
    <label for="q1">Question 1 : Quel est le second type le plus commun des starters feu ?</label>
    <div>
        <div>
            <input type="radio" name="q1" id="eau1" value="eau1"><label for="eau1">Eau</label>
        </div>
        <div>
            <input type="radio" name="q1" id="spectre1" value="spectre1"><label for="spectre1">Spectre</label>
        </div>
        <div>
            <input type="radio" name="q1" id="combat1" value="combat1"><label for="combat1">Combat</label>
        </div>
        <div>
            <input type="radio" name="q1" id="vol1" value="vol1"><label for="vol1">Vol</label>
        </div>

    </div>

        <!-- PHP QUESTION 1 -->

        <?php  
        if (isset($_POST['q1'])){
            if ($_POST['q1'] === "combat1"){
                $varq1 = 1;
                echo "<p style='color:green'>Vrai, sur les 9 générations et les starters d'Hisui, nous avons 3 starters Feu/Combat.</p><br>";
            } else {
                echo "<p style='color:red'>Faux, sur les 9 générations et les starters d'Hisui, nous avons 3 starters Feu/Combat.</p><br>";
                $varq1 = 0;
            }
        }
        ?>
        
        <!-- FIN PHP QUESTION 1 -->

    <label for="q2">Question 2 : Quel type d'attaque n'affecte pas Keunotor ?</label>
    <div>
        <div>
            <input type="radio" name="q2" id="combat2" value="combat2"><label for="combat2">Combat</label>
        </div>
        <div>
            <input type="radio" name="q2" id="spectre2"value="spectre2"><label for="spectre2" >Spectre</label>
        </div>
        <div>
            <input type="radio" name="q2" id="normal2" value="normal2"><label for="normal2">Normal</label>
        </div>
        <div>
            <input type="radio" name="q2" id="fée2" value="fée2"><label for="fée2">Fée</label>
        </div>
    </div>

            <!-- PHP QUESTION 2 -->

            <?php  
        if (isset($_POST['q2'])){
            if ($_POST['q2'] === "spectre2"){
                $varq2 = 1;
                echo "<p style='color:green'>Vrai, les types normal ne sont pas affecté par les attaques spectre.</p><br>";
            } else {
                echo "<p style='color:red'>Faux, les types normal ne sont pas affecté par les attaques spectre.</p><br>";
                $varq2 = 0;
            }
        }
        ?>
        
        <!-- FIN PHP QUESTION 2 -->

    <label for="q3">Question 3 : Quel pokémon est le VRAI dieu des pokémon ?</label>
    <div>
        <div>
            <input type="radio" name="q3" id="Arceus" value="Arceus"><label for="Arceus">Arceus</label>
        </div>
        <div>
            <input type="radio" name="q3" id="Amonita" value="Amonita"><label for="Amonita">Amonita</label>
        </div>
        <div>
            <input type="radio" name="q3" id="Lucario" value="Lucario"><label for="Lucario">Lucario</label>
        </div>
        <div>
            <input type="radio" name="q3" id="Keunotor" value="Keunotor"><label for="Keunotor">Keunotor</label>
        </div>
    </div>

    <!-- PHP QUESTION 3 -->

    <?php  
        if (isset($_POST['q3'])){
            if ($_POST['q3'] === "Keunotor"){
                $varq3 = 1;
                echo "<p style='color:green'>Vrai, le seul VRAI dieu est Godnotor.</p><br>";
            } else {
                echo "<p style='color:red'>Faux, le seul VRAI dieu est Godnotor.</p><br>";
                $varq3 = 0;
            }
        }
        ?>
        
        <!-- FIN PHP QUESTION 3 -->

    <button>Vérifier</button>

    <!-- PHP DECOMPTE DES POINTS -->

    <?php
        if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3'])){
            $result = $varq1 + $varq2 + $varq3;
            echo "Vous avez répondu à " . $result . " question(s) correctement.";
        }
            
    ?>

    <!-- FIN DECOMPTE DES POINTS -->
</form>

                                                        <!-- EXCERCICE 9 -->
<h2>EXERCICE 9</h2>

<form action="index.php" method="POST">

</form>

                                                        <!-- EXCERCICE 10 -->
<h2 id="ex10">EXERCICE 10</h2>

<form action="index.php#ex10" method="POST" enctype="multipart/form-data">
    <label for="userfile">Votre image a upload</label>
    <input type="file" name="userfile" id="userfile">
    <button>Upload</button>
</form>



<?php 
    $file = $_FILES['userfile'];
    // var_dump($file);
    // echo $file['tmp_name'];
    // echo $file['name'];

    move_uploaded_file($file['tmp_name'],$file['name']);

    echo '<img src="'.$file['name'].'">';


//     move_uploaded_file($_POST['userfile'],$_POST['userfile']);
?> 














<form method="post" action="" enctype="multipart/form-data" style="text-align: center; margin-top: 20px;">
<label for="image">Choisissez une image :</label>
                <input type="file" id="image" name="image" accept="image/*" required><br><br>
                <button type="submit">Uploader</button>
            </form>

<?php
        $message = null;
        $imagePath = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($file['type'], $allowedTypes)) {
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $uniqueName = uniqid() . "-" . basename($file['name']);
                    $uploadDir = 'uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    $uploadPath = $uploadDir . $uniqueName;
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $message = "Image uploadée avec succès !";
                        $imagePath = $uploadPath;
                    } else {
                        $message = "Erreur lors du déplacement du fichier.";
                    }
                } else {
                    $message = "Erreur lors de l'upload : " . $file['error'];
                }
            } else {
                $message = "Le fichier n'est pas une image valide.";
            }
        }
        ?>
        <?php if ($message): ?>
                <p style="text-align: center; margin-top: 20px;"><?= $message ?></p>
            <?php endif; ?>

            <?php if ($imagePath): ?>
                <div style="text-align: center; margin-top: 20px;">
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="Image uploadée" style="max-width: 300px;">
                </div>
            <?php endif; ?>

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