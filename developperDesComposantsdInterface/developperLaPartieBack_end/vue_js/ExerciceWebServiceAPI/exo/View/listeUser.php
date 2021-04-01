<h1 class="center-align">Liste des utilisateurs</h1>
<form
    v-for="user in result"
    v-bind:key="user.user_id"
    method="post"
    class="row"
>
    <label for="nom" class="col s2">
        Nom :
        <input name="nom" id="user_name" type="text" class="validate" v-bind:value="user.user_name">
    </label>
    <label for="tel" class="col s2">
        Tel :
        <input name="tel" id="user_tel" type="number" class="validate" v-bind:value="user.user_tel">
    </label>
    <label for="groupe" class="col s2">
        Groupe
        <input name="groupe" id="club" type="text" class="validate" v-bind:value="user.user_groupe">
    </label>
    <input type="hidden" name="id" v-bind:value="user.user_id">
    <div id="submitDiv" class="col s4 center-align">
        <button type="submit" name="submitEdit" class="btn blue">
            <i class="material-icons">edit</i>
        </button>
        <button type="submit" name="submitDel" class="btn red">
            <i class="material-icons">delete</i>
        </button>
    </div>
</form>