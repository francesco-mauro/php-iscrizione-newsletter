    <!-- php  -->
    <?php
    $email = '';
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            
            // Validazione dell'email
            // tentativo con filter_var e strpos 

            if (filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '.') !== false && strpos($email, '@') !== false) {
                $message = '<p class="success">Email valida!.</p>';
            } else {
                $message = '<p class="error">Indirizzo email non valido. Assicurati che contenga un punto (.) e una chiocciola (@).</p>';
            }
        }
    }
    ?>
<!-- html  -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Iscrizione Newsletter</title>
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
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        <button type="submit">Iscriviti</button>
    </form>
    
    <?php
    // Visualizzare il messaggio impostato in php
    echo $message;
    ?>
</body>
</html>
