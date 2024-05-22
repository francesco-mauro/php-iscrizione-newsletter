<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Iscrizione Newsletter</title>
    <!--------------------- bootstrap  --------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Iscriviti alla nostra Newsletter</h1>

        <!--------------------- php  ----------------------->
        <?php
        include __DIR__ . '/functions.php';

        $email = '';
        $message = '';
        $alertClass = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];

                // ---------------------->Validazione dell'email utilizzando la funzione validate_email---------------------->
                if (validate_email($email)) {
                    $message = 'Email valida! Grazie per l\'iscrizione.';
                    $alertClass = 'alert-success';
                } else {
                    $message = 'Indirizzo email non valido. Assicurati che contenga un punto (.) e una chiocciola (@).';
                    $alertClass = 'alert-danger';
                }
            }
        }
        ?>

        <!----------------------- Form ---------------------->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Indirizzo Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Iscriviti</button>
        </form>

        <?php if ($message) : ?>
            <div class="alert <?php echo $alertClass; ?> mt-3">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>


</body>

</html>