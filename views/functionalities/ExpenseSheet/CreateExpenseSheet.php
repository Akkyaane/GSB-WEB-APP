<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GSB - Fiche de frais</title>
    <link rel="stylesheet" href="../../../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script defer src="../../../assets/script.js"></script>
</head>

<body>
    <header class="d-flex flex-column
    justify-center align-items-center">
        <img class="img-fluid" style="width: 150px;" src="../../../assets/content/logo.png" alt="logo">
        <nav class="navbar">
            <ul class="nav my-2 fw-medium border-bottom border-1">
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?data">Compte</a></li>
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?settings">Paramètres</a></li>
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?logout">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <main>
            <div class="container p-3">
                <h2 class="mb-3 fs-4 fw-bold">Créer une fiche de frais</h2>
                <p class="fw-bold text-danger">Attention : un budget est attitré pour chaque catégorie et correspond au
                    montant maximum remboursé par l'entreprise. Si dépassé, le reste est à charge du visiteur médical.
                    Veuillez laisser le champ vide, si aucune dépense n'a été faite.</p>
                <div class="container p-0">
                    <form action="../../../controllers/functionalities/ExpenseSheet/CreateExpenseSheet.php"
                        method="post" enctype="multipart/form-data">
                        <div class="my-3">
                            <h3 class="mb-3 fs-5 fw-semibold">Informations générales</h3>
                            <div class="my-3">
                                <label class="mb-2" for="request_date">Demande effectuée le :</label>
                                <input type="date" class="form-control input" name="request_date" id="request_date"
                                    required>
                            </div>
                            <div class="my-3">
                                <label class="mb-2" for="start_date">Date de départ :</label>
                                <input type="date" class="form-control input" name="start_date" id="start_date"
                                    required>
                            </div>
                            <div class="my-3">
                                <label class="mb-2" for="end_date">Date de retour :</label>
                                <input type="date" class="form-control input" name="end_date" id="end_date" required>
                            </div>
                        </div>
                        <div class="my-3">
                            <h3 class="mb-1 fs-5 fw-semibold">Frais</h3>
                            <h5 class="mb-3 fs-5 fw-medium">Transport</h5>
                            <div class="my-3">
                                <select class="form-select input" name="transport_category" id="transport_category"
                                    onchange="showDiv(this)">
                                    <option selected hidden>Sélectionnez le type de transport</option>
                                    <option value="1">Avion</option>
                                    <option value="2">Train</option>
                                    <option value="3">Bus/Car/Taxi</option>
                                    <option value="4">Voiture</option>
                                </select>
                            </div>
                            <div class="my-3">
                                <input type="number" step=0.01 class="form-control input" name="kilometers_number"
                                    id="kilometers_number" placeholder="Nombre total de kilomètres">
                            </div>
                            <div class="my-3">
                                <p class="fw-bold text-danger" id="transport_expense_limit">Montant maximum : 2500 €</p>
                                <input type="number" step=0.01 class="form-control input" name="transport_expense"
                                    id="transport_expense" placeholder="Montant total (€)">
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control input" name="transport_expense_file"
                                    id="transport_expense_file">
                            </div>
                        </div>
                        <div class="my-3">
                            <h5 class="mb-1 fs-5 fw-medium">Hébergement</h5>
                            <div class="mt-2 mb-3">
                                <p class="fw-bold text-danger">Montant maximum : 250 €</p>
                                <input type="number" step=0.01 class="form-control input" name="nights_number"
                                    id="nights_number" placeholder="Nombre total de nuitées">
                            </div>
                            <div class="my-3">
                                <input type="number" step=0.01 class="form-control input" name="accommodation_expense"
                                    id="accommodation_expense" placeholder="Montant total (€)">
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control input" name="accommodation_expense_file"
                                    id="accommodation_expense_file">
                            </div>
                        </div>
                        <div class="my-3">
                            <h5 class="mb-1 fs-5 fw-medium">Alimentation</h5>
                            <div class="mt-2 mb-3">
                                <p class="fw-bold text-danger">Montant maximum : 300 €</p>
                                <input type="number" step=0.01 class="form-control input" name="food_expense"
                                    id="food_expense" placeholder="Montant total (€)">
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control input" name="food_expense_file"
                                    id="food_expense_file">
                            </div>
                        </div>
                        <div class="my-3">
                            <h5 class="mb-1 fs-5 fw-medium">Autres</h5>
                            <div class="mt-2 mb-3">
                                <p class="fw-bold text-danger">Montant maximum : 200 €</p>
                                <input type="number" step=0.01 class="form-control input" name="other_expense"
                                    id="other_expense" placeholder="Montant total (€)">
                            </div>
                            <div class="my-3">
                                <input type="file" class="form-control" name="other_expense_file"
                                    id="other_expense_file">
                            </div>
                            <div class="my-3">
                                <textarea class="form-control input" rows="3" name="message" id="message"
                                    placeholder="Écrire un message..." maxlength="500"></textarea>
                                <div id="charCount">0/500</div>
                            </div>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary c-link" name="submit"
                                id="submit">Soumettre</button>
                            <a class="btn btn-primary c-link"
                                href="../../../controllers/portals/visitor">Retour</a></button>
                        </div>
                    </form>
                </div>
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

                if (value != "4") {
                    transport_expense_limit.style.display = "block";
                    transport_expense.style.display = "block";
                    transport_expense_file.style.display = "block";
                } else {
                    kilometers_number.style.display = "block";
                }
            }

            function updateCharCount(textareaId, charCountId, maxLength) {
                let textarea = document.getElementById("message");
                let charCount = document.getElementById("charCount");

                if (textarea && charCount) {
                    let remainingChars = maxLength - textarea.value.length;
                    charCount.textContent = remainingChars + "/" + maxLength;
                }
            }

            document.getElementById("message").addEventListener("input", function () {
                updateCharCount("message", "charCount", 500);
            });

            updateCharCount("message", "charCount", 500);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>