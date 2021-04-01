<h1 class="center-align">Ajouter un Joueur</h1>
<form method="post">
    <div class="row">
        <div class="input-field col s6">
            <label for="nom">Nom</label>
            <br>
            <input name="nom" placeholder="Nom....." id="user_name" type="text" class="validate">
        </div>
        <div class="input-field col s6">
            <label for="groupe">Groupe</label>
            <input name="groupe" placeholder="Dernier groupe....." id="user_groupe" type="text" class="validate">
        </div>
        <div class="input-field col s4 offset-s4">
            <label for="tel">Numéro</label>
            <input name="tel" placeholder="Numéro de telephone ...." id="user_tel" type="number" class="validate">
        </div>
        <div class="col s12 center-align">
            <button class="btn waves-effect waves-light" type="submit" name="submitAdd">Ajouter
                <i class="material-icons right">add</i>
            </button>
        </div>
    </div>
</form>