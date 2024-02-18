<?php

displayAlerts()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB - Créer une fiche de frais</title>
    <link rel="stylesheet" href="../../../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script defer src="../../../assets/script.js"></script>
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1 class="text-center">Créer une nouvelle fiche de frais</h1>
    </header>
    <main>
        <div class="container mt-4">
            <p>Le montant total des dépenses dépassant le budget fixé pour chaque catégorie ne sera pas remboursé.
                Veuillez laisser le champ vide, si aucune dépense n'a été faite.</p>
        </div>
        <div class="container mt-4">
            <form action="../../../controllers/functionalities/ExpenseSheet/CreateExpenseSheet.php" method="post"
                enctype="multipart/form-data">
                <div class="mt-3">
                    <h3>Informations générales</h3>
                    <label for="request_date">Demande effectuée le :</label>
                    <input type="date" class="form-control" name="request_date" id="request_date" required>
                </div>
                <div class="mt-3">
                    <label for="start_date">Date de départ :</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                </div>
                <div class="mt-3">
                    <label for="end_date">Date de retour :</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                </div>
                <div class="mt-3">
                    <h3>Frais</h3>
                    <h5>Transport</h5>
                    <select class="form-select" name="transport_category" id="transport_category"
                        onchange="showDiv(this)">
                        <option selected hidden>Sélectionnez le type de transport</option>
                        <option value="1">Avion</option>
                        <option value="2">Train</option>
                        <option value="3">Bus/Car/Taxi</option>
                        <option value="4">Voiture</option>
                    </select>
                </div>
                <div class="mt-3">
                    <input type="number" step=0.01 class="form-control" name="kilometers_number" id="kilometers_number"
                        placeholder="Nombre total de kilomètres">
                </div>
                <div class="mt-3">
                    <p id="transport_expense_limit">Montant maximum : 2500 €</p>
                    <input type="number" step=0.01 class="form-control" name="transport_expense" id="transport_expense"
                        placeholder="Montant total en euros">
                </div>
                <div class="mt-3">
                    <input type="file" class="form-control" name="transport_expense_file" id="transport_expense_file">
                </div>
                <div class="mt-3">
                    <h5>Hébergement</h5>
                    <p>Montant maximum : 250 €</p>
                    <input type="number" class="form-control" name="nights_number" id="nights_number"
                        placeholder="Nombre de nuitées">
                </div>
                <div class="mt-3">
                    <input type="number" step=0.01 class="form-control" name="accommodation_expense"
                        id="accommodation_expense" placeholder="Montant total en euros">
                </div>
                <div class="mt-3">
                    <input type="file" class="form-control" name="accommodation_expense_file"
                        id="accommodation_expense_file">
                </div>
                <div class="mt-3">
                    <h5>Alimentation</h5>
                    <p>Montant maximum : 300 €</p>
                    <input type="number" step=0.01 class="form-control" name="food_expense" id="food_expense"
                        placeholder="Montant total en euros">
                </div>
                <div class="mt-3">
                    <input type="file" class="form-control" name="food_expense_file" id="food_expense_file">
                </div>
                <div class="mt-3">
                    <h5>Autres</h5>
                    <p>Montant maximum : 200 €</p>
                    <input type="number" step=0.01 class="form-control" name="other_expense" id="other_expense"
                        placeholder="Montant total en euros">
                </div>
                <div class="mt-3">
                    <input type="file" class="form-control" name="other_expense_file" id="other_expense_file">
                </div>
                <div class="mt-3">
                    <textarea class="form-control" rows="3" name="message" id="message"
                        placeholder="Écrire un message..." maxlength="500"></textarea>
                    <div id="charCount">0/500</div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Envoyer</button>
                    <button class="btn btn-primary"><a href="../../../v-home/v-home.php"
                            style="color: white; text-decoration: none">Retour</a></button>
                </div>
            </form>
        </div>
    </main>
    <script>
        function showDiv(category) {
            let value = category.value;

            let kilometers_number = document.getElementById("kilometers_number");
            let transport_expense_limit = document.getElementById("transport_expense_limit");
            let transport_expense = document.getElementById("transport_expense");
            let transport_expense_file = document.getElementById("transport_expense_file");

            kilometers_number.style.display = "none";
            transport_expense_limit.style.display = "none";
            transport_expense.style.display = "none";
            transport_expense_file.style.display = "none";

            if (value === "4") {
            kilometers_number.style.display = "block";
            } else {
                if (value != "4") {
                    transport_expense_limit.style.display = "block";
                    transport_expense.style.display = "block";
                    transport_expense_file.style.display = "block";
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>