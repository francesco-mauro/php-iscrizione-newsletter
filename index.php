<!-- php  -->
<?php

// --------------------FUNCTIONS.PHP --------------------
include __DIR__ . '/functions.php';

$email = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        // ------------- Validazione dell'email utilizzando la funzione validate_email da FUNCTIONS.PHP--------------------
        if (validate_email($email)) {
            $message = '<p class="success">Email valida!.</p>';
        } else {
            $message = '<p class="error">Indirizzo email non valido. Assicurati che contenga un punto (.) e una chiocciola (@).</p>';
        }
    }
}
?>
<!---------------------- html  ---------------------->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Iscriviti alla nostra Newsletter</h1>

    <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Indirizzo Email:</label>
        <input type="email" id="email" name="email" value="<?php echo ($email); ?>" required>
        <button type="submit">Iscriviti</button>
    </form>
    
    <?php
    // --------------------Visualizzare il messaggio impostato in php--------------------
    echo $message;
    ?>
    
</body>
</html>
