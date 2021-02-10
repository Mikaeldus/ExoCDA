<!DOCTYPE html>
<html lang="fr">
<!-- ----------HEAD--------- -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>PAGE ACCUEIL</title>

  <!-- Bootstrap/css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
<!-- ------JS-------- -->
<script></script>
    
</head>

<!-- ---------HEAD---------- -->

<!-- --------------Body------------- -->

<body>
  <div class="container-fluid">
      <button><a href="../../index.php">Retour à l'accueil</a></button>
      <br><br>

    <!-- --------------header------------- -->




    <!-- --------------Formulaire------------- -->


    <form action="formu.php" method="POST" onSubmit="return verif(this)">
            <div class="form-row">

              <p class="col-12">* Ces zones sont obligatoire</p>

              <div class="col-md-6 mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="inputNom" name="nom" value="" >
                <span id="missNom" class="hint missNom"></span>
              </div>

              <div class="col-md-6 mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="inputPrenom" name="prenom" value="" >
                <span id="missPrenom" class="hint missPrenom"></span>
              </div>

            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="date">Date de naissance:</label>
                <input type="date" class="form-control" id="inputDate" name="date_de_naissance" value="">
              </div>

              <div class="col-md-6 mb-3">
                <label for="mail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="" >
                <span id="missMail" class="hint missMail"></span>
              </div>

            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="inputAdresse" name="adresse" value="" >
              </div>

              <div class="col-md-6 mb-3">
                <p>Sexe*:</p>
                <input type="radio" name="sexe" value="f" class='sexe' required="required">Masculin
                <input type="radio" name="sexe" value="m" class='sexe' required="required">Féminin<br>
              </div>
            </div>

            <div class="form-row">

              <div class="col-md-6 mb-3">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="validationDefault06" name="ville" >
              </div>

              <div class="col-md-6 mb-3">
                <label for="code">Code Postale</label>
                <input type="number" class="form-control" id="inputCodePostal" name="codePostale">
                <span id="missCodePostale" class="hint missCodePostale"></span>
              </div>

            </div>

            <div class="form-row">

              <div class="col-md-6 mb-3">

                <div>Votre demande</div>
                <label for="sujet">Sujet*</label>
                <select name="sujet" id="inputSujet" required>
                  <option value="" selected>Veuillez séléctionner un sujet</option>
                  <option value="Mes commandes">Mes commandes</option>
                  <option value="Question sur un produit">Question sur un produit</option>
                  <option value="Réclamation">Réclamation</option>
                  <option value="Autres">Autres</option>
                </select><br>
                <div>Votre question* :</div>
                <textarea name="commentaires" rows="6" cols="40" id="inputQuestion" required="required"></textarea>
              </div>
            </div>
            <br>



            <div class="form-group">
              <div class="form-check">
                <div class="col-md-12 mb-6">
                  <input class="form-check-input" type="checkbox" value="autoriser" id="invalidCheck2" name="autoriser" required>
                  <label class="form-check-label" for="invalidCheck2">
                    J'accepte le traitement informatique de ce formulaire
                  </label>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-6">
              <div class="form-group">
                <div class="form-check">
                  <button id="submit" class="btn btn-primary" type="submit" name='submit'>Envoyer</button>
                  <input class="btn btn-primary" type="reset" value="annuler">
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>



    <!-- --------------Formulaire------------- -->




    <!-- --------------Footer------------- -->
    <!-- en attente de liens !!! -->


    <!-- en attente de liens !!! -->
    <!-- --------------Footer------------- -->

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
  </div>
</body>

<!-- --------------Body------------- -->

</html>