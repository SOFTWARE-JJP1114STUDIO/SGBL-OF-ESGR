<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur le Livre</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/safari-pinned-tab.svg" color="#00a6e9">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .book-details {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .book-details p {
            margin: 10px 0;
            color: #333;
        }

        .book-details strong {
            font-weight: bold;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
        }

        /* Style pour le compte à rebours */
        .countdown {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999; /* Pour s'assurer qu'il est au-dessus de tout le reste */
        }

        /* Style pour le bouton retour */
        .back {
            position: fixed;
            top: 70px;
            right: 20px;
            text-decoration: none;
            color: #000000;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999; /* Pour s'assurer qu'il est au-dessus de tout le reste */
        }
    </style>
</head>
<body>
<?php
// Vérifie si l'ID du livre est passé en paramètre GET
if(isset($_GET['id'])) {
    // Récupère l'ID du livre depuis le paramètre GET
    $book_id = $_GET['id'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "aimbfgnd_JJ-P1114";
    $password = "@N9l9z8d1";
    $database = "aimbfgnd_library";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }
    
    // Définir l'encodage sur UTF-8
    $conn->query("SET NAMES utf8");

    // Prépare et exécute la requête SQL pour récupérer les détails du livre
    $sql = "SELECT * FROM tblbooks WHERE id = $book_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Récupère les données du livre
        $book_data = $result->fetch_assoc();

        // Affiche les détails du livre
        echo "<div class='book-details'>";
        echo "<h2>Détails du Livre</h2>";
        echo "<p><strong>Nom du Livre:</strong> " . htmlspecialchars($book_data['BookName']) . "</p>";
        echo "<p><strong>Tome:</strong> " . htmlspecialchars($book_data['Tome']) . "</p>";
        echo "<p><strong>Nom de la série:</strong> " . htmlspecialchars($book_data['Serie']) . "</p>";
        echo "<p><strong>Emplacement:</strong> " . htmlspecialchars($book_data['Emplacement']) . "</p>";
        echo "<p><strong>Quantité:</strong> " . htmlspecialchars($book_data['Quantity']) . "</p>";
        echo "</div>";
    } else {
        echo "<p class='error-message'>Aucun livre trouvé avec cet identifiant.</p>";
    }

    // Ferme la connexion à la base de données
    $conn->close();
} else {
    // Redirige vers une page d'erreur si aucun ID de livre n'est fourni
    echo "<p class='error-message'>Aucun ID de livre fourni.</p>";
}
?>

    <!-- Compte à rebours -->
    <div class="countdown">Redirection dans <span id="countdown">30</span> secondes</div>
    <div class="back"><a class="back" href="javascript:history.back()">Retour en arrière</a></div>

    <script>
        // Redirection après 45 secondes
        let timeout;
        function startTimer() {
            clearTimeout(timeout);
            let countdown = 45; // Temps en secondes
            const countdownElement = document.getElementById('countdown');
            countdownElement.textContent = countdown;
            timeout = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(timeout);
                    window.location.href = 'search_form.html';
                }
            }, 1000); // Mise à jour toutes les 1 seconde
        }
        document.addEventListener('mousemove', startTimer);
        document.addEventListener('', startTimer);
        document.addEventListener('keypress', startTimer);
        document.addEventListener('touchstart', startTimer);
        startTimer(); // Démarre le timer au chargement de la page
    </script>
</body>
</html>
