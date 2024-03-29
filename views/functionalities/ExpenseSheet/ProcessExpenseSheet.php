<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Traiter une fiche de frais</title>
  <link rel="stylesheet" href="../../../assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script defer src="../../../assets/script.js"></script>
</head>

<body>
  <header class="d-flex flex-column
    justify-content-center align-items-center">
    <img class="img-fluid" style="width: 150px;" src="../../../assets/content/logo.png" alt="logo">
    <nav class="navbar">
      <ul class="nav fw-medium border-bottom border-1">
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../../controllers/portals/accountant.php?manageAccount">Mon compte</a></li>
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../../controllers/portals/accountant.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container p-2">
      <h2 class="mb-3 fs-4 fw-bold">Traiter la fiche de frais n°
        <?php echo $_GET["id"] ?>
      </h2>
      <div class="container p-0">
        <div class="my-3">
          <h3 class="mb-3 fs-5 fw-semibold">Informations générales</h3>
          <div class="mb-2">
            <label>Demande effectuée le :</label>
            <input type="date" class="form-control input" value="<?php echo $data["request_date"] ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Date de départ :</label>
            <input type="date" class="form-control input" value="<?php echo $data["start_date"] ?>" readonly>
          </div>
          <div class="mb-2">
            <label for="end_date">Date de retour :</label>
            <input type="date" class="form-control input" value="<?php echo $data["end_date"] ?>" readonly>
          </div>
        </div>
        <div class="my-3">
          <h3 class="mb-1 fs-5 fw-semibold">Frais</h3>
          <h5 class="mb-3 fs-5 fw-medium">Transport</h5>
          <div class="mb-2">
            <p>Type de transport :
              <?php if ($data["transport_category"] == "1") {
                echo "Avion";
              } else if ($data["transport_category"] == "2") {
                echo "Train";
              } else if ($data["transport_category"] == "3") {
                echo "Bus/Car/Taxi";
              } else if ($data["transport_category"] == "4") {
                echo "Voiture";
              } else {
                echo "N/A";
              } ?>
            </p>
          </div>
          <div class="mb-2">
            <label>Nombre total de kilomètres :</label>
            <input type="number" class="form-control input" value="<?php if ($data["kilometers_number"]) {
                                                                      echo $data["kilometers_number"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["kilometer_expense"]) {
                                                                      echo $data["kilometer_expense"];
                                                                    } else if ($data["transport_expense"]) {
                                                                      echo $data["transport_expense"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total remboursé (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["kilometer_expense_refund"]) {
                                                                      echo $data["kilometer_expense_refund"];
                                                                    } else if ($data["transport_expense_refund"]) {
                                                                      echo $data["transport_expense_refund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Reste total à payer (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["kilometer_expense_unrefund"]) {
                                                                      echo $data["kilometer_expense_unrefund"];
                                                                    } else if ($data["transport_expense_unrefund"]) {
                                                                      echo $data["transport_expense_unrefund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Justificatif :</label>
            <?php if ($data["transport_expense_file"]) {
              echo "<a href=" . $data["transport_expense_file"] . " target='_blank'>Consulter</a>";
            } else {
              echo "N/A";
            } ?>
          </div>
        </div>
        <div class="my-3">
          <h5 class="mb-3 fs-5 fw-medium">Hébergement</h5>
          <div class="mb-2">
            <label>Nombre total de nuitées :</label>
            <input type="number" class="form-control input" value="<?php if ($data["nights_number"]) {
                                                                      echo $data["nights_number"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["accommodation_expense"]) {
                                                                      echo $data["accommodation_expense"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total remboursé (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["accommodation_expense_refund"]) {
                                                                      echo $data["accommodation_expense_refund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Reste total à payer (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["accommodation_expense_unrefund"]) {
                                                                      echo $data["accommodation_expense_unrefund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Justificatif :</label>
            <?php if ($data["accommodation_expense_file"]) {
              echo "<a href=" . $data["accommodation_expense_file"] . " target='_blank'>Consulter</a>";
            } else {
              echo "N/A";
            } ?>
          </div>
        </div>
        <div class="my-3">
          <h5 class="mb-3 fs-5 fw-medium">Alimentation</h5>
          <div class="mb-2">
            <label>Montant total (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["food_expense"]) {
                                                                      echo $data["food_expense"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total remboursé (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["food_expense_refund"]) {
                                                                      echo $data["food_expense_refund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Reste total à payer (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["food_expense_unrefund"]) {
                                                                      echo $data["food_expense_unrefund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Justificatif :</label>
            <?php if ($data["food_expense_file"]) {
              echo "<a href=" . $data["food_expense_file"] . " target='_blank'>Consulter</a>";
            } else {
              echo "N/A";
            } ?>
          </div>
        </div>
        <div class="my-3">
          <h5 class="mb-3 fs-5 fw-medium">Autres</h5>
          <div class="mb-2">
            <label>Montant total (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["other_expense"]) {
                                                                      echo $data["other_expense"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Montant total remboursé (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["other_expense_refund"]) {
                                                                      echo $data["other_expense_refund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Reste total à payer (€) :</label>
            <input type="number" class="form-control input" value="<?php if ($data["other_expense_unrefund"]) {
                                                                      echo $data["other_expense_unrefund"];
                                                                    } else {
                                                                      echo 0;
                                                                    } ?>" readonly>
          </div>
          <div class="mb-2">
            <label>Message :</label>
            <textarea class="form-control input" rows="3" maxlength="500" readonly><?php if ($data["message"]) {
                                                                                      echo $data["message"];
                                                                                    } else {
                                                                                      echo "N/A";
                                                                                    } ?></textarea>
          </div>
          <div class="mb-2">
            <label>Justificatif :</label>
            <?php if ($data["other_expense_file"]) {
              echo "<a href=" . $data["other_expense_file"] . " target='_blank'>Consulter</a>";
            } else {
              echo "N/A";
            } ?>
          </div>
        </div>
        <form action="../../../controllers/functionalities/ExpenseSheet/ProcessExpenseSheet.php?processid=<?php echo $_GET["id"] ?>" method="post">
          <div class="my-3">
            <h3 class="mb-3 fs-5 fw-semibold">Statut du traitement</h3>
            <div class="mb-2">
              <label>Motif du rejet :</label>
              <textarea class="form-control input" rows="3" maxlength="500" name="remark" id="remark" placeholder="Écrire un message..."></textarea>
              <div id="charCount">500/500</div>
            </div>
            <div class="mb-2">
              <button type="submit" class="btn btn-primary c-link" name="validate_submit" id="submit">Valider</button>
              <button type="submit" class="btn btn-primary c-link" name="disprove_submit" id="submit">Refuser</button>
              <a class="btn btn-primary c-link" href="../../../controllers/portals/accountant.php?manageExpenseSheet&id=<?php echo $_GET["id"] ?>">Retour</a></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    function updateCharCount(textareaId, charCountId, maxLength) {
      let textarea = document.getElementById("remark");
      let charCount = document.getElementById("charCount");

      if (textarea && charCount) {
        let remainingChars = maxLength - textarea.value.length;
        charCount.textContent = remainingChars + "/" + maxLength;
      }
    }

    document.getElementById("remark").addEventListener("input", function() {
      updateCharCount("remark", "charCount", 500);
    });

    updateCharCount("remark", "charCount", 500);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>