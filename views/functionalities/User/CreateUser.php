<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GSB - Page d'inscription</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../../visitor/v-functionalities/v-ExpenseSheet/v-AddExpenseSheet/v-AddExpenseSheet.css">
    <script defer src="../../../script.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <form action="../../../../models/authentication/signup/signup.php" method="post">
        <div class="mb-3">
          <p class="h3">Ajouter un utilisateur à la base de données</p>
        </div>
        <div class="mb-3">
          <input
            type="text"
            class="form-control"
            name="first_name"
            placeholder="Prénom"
            required
          />
        </div>
        <div class="mb-3">
          <input
            type="text"
            class="form-control"
            name="last_name"
            placeholder="Nom"
            required
          />
        </div>
        <div class="mb-3">
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="E-mail"
            required
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control"
            name="password"
            placeholder="Mot de passe"
            required
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control"
            name="password_match"
            placeholder="Vérification du mot de passe"
            required
          />
        </div>
        <div class="mb-3">
          <select class="form-select" name="role" onchange="showDiv1(this)" required>
            <option disabled selected value>Choisir une fonction</option>
            <option value="administrator">Administrateur</option>
            <option value="accountant">Comptable</option>
            <option value="visitor">Visiteur médical</option>
          </select>
        </div>
        <div class="mb-3 hidden" id="horsepower">
          <input
            type="number"
            class="form-control"
            name="horsepower"
            placeholder="Nombre de chevaux"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary" name="submit">
          Envoyer
        </button>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
