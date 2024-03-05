<?php
// Fonction de recherche de livres avec tri par pertinence
function searchBooks($search_query, $category) {
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

    // Construction de la requête SQL en fonction des paramètres de recherche
    $sql = "SELECT * FROM tblbooks WHERE 1";

    if (!empty($search_query)) {
        $sql .= " AND BookName LIKE '%$search_query%'";
    }

    if (!empty($category)) {
        $sql .= " AND CatId IN (SELECT id FROM tblcategory WHERE CategoryName = '$category')";
    }

    // Exécution de la requête
    $result = $conn->query($sql);

    // Création d'un tableau pour stocker les résultats de la recherche avec leurs scores
    $books_with_scores = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Calcul du score pour chaque résultat en fonction de sa pertinence
            // Ici, vous pouvez définir votre propre logique pour attribuer un score en fonction de la pertinence
            $score = calculateScore($row, $search_query);

            // Ajout du livre avec son score au tableau des résultats
            $books_with_scores[] = array(
                'id' => $row['id'],
                'book_name' => $row['BookName'],
                'tome' => $row['Tome'],
                'score' => $score
            );
        }
    }

    // Fermeture de la connexion à la base de données
    $conn->close();

    // Trier les résultats par score décroissant
    usort($books_with_scores, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    // Retourner les résultats de la recherche triés par score
    return $books_with_scores;
}

// Fonction pour calculer le score de pertinence d'un livre
function calculateScore($book, $search_query) {
    // Ici, vous pouvez définir votre propre logique pour calculer le score en fonction de la pertinence
    // Par exemple, vous pouvez attribuer des points en fonction de la correspondance du nom du livre avec la requête de recherche
    // et des points supplémentaires pour la correspondance de la catégorie, etc.
    $score = 0;

    // Calcul du score en fonction de la correspondance du nom du livre avec la requête de recherche
    if (!empty($search_query)) {
        similar_text($book['BookName'], $search_query, $percentage);
        $score += $percentage;
    }

    // Vous pouvez ajouter d'autres critères de pertinence et ajuster le score en conséquence

    return $score;
}

// Exemple d'utilisation de la fonction de recherche avec tri par pertinence
$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

$books = searchBooks($search_query, $category);

// Affichage des résultats
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="assets/css/main.css" rel="stylesheet" />
    <title>Résultats de la recherche</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/safari-pinned-tab.svg" color="#00a6e9">
    <style>
        /* Works on Firefox */
        * {
        scrollbar-width: thin;
        scrollbar-color: #cad4db #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .results {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .book {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .book h3 {
            margin-top: 0;
            color: #333;
        }

        .book p {
            margin: 0;
            color: #666;
        }

        .no-results {
            color: #666;
            text-align: center;
        }

        .search-query {
            margin-bottom: 10px;
        }

        .category-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .btn-details {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-details:hover {
            background-color: #0056b3;
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
    <h2>Résultats de la recherche</h2>

    <div class="results">
        <?php
        if (!empty($books)) {
            foreach ($books as $book) {
                echo '<div class="book">';
                echo '<h3>Nom du Livre: ' . htmlspecialchars($book['book_name']). '</h3><h4>Tome: ' . htmlspecialchars($book['tome']). '</h4>';
                echo '<a href="product_info.php?id=' . $book['id'] . '" class="btn-details">Voir plus</a>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-results">Aucun résultat trouvé</p>';
        }
        ?>
    </div>

    <!-- Compte à rebours -->
    <div class="countdown">Redirection dans <span id="countdown">30</span> secondes</div>
    <div class="back"><a class="back" href="search_form.html">Retour en arrière</a></div>

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
