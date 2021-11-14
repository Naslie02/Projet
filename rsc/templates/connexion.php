<<<<<<< HEAD
<form class="box" action="<?= Router::getLoginPage() ?>" name="login" method="post">
=======
<form class="box" action="<?= Router::getLoginAction() ?>" name="login" method="post">
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
  <h1>Connexion</h1>
  <label for="login">Pseudo</label>
  <input id="login" type="text" class="box-input" name="login" placeholder="Pseudo" value="<?= $pseudo ?>" required></br>

  <label for="password">Mot de passe</label>
  <input id="password" type="password" class="box-input" name="password" placeholder="Mot de passe" required></br>

  <input type="submit" class="box-button" name="submit-log" value="Connexion"></br>
  <p class="box-register">Vous êtes nouveau ici? <a href="<?= Router::getSigninPage() ?>">Inscrivez-vous ici</a></p>
</form>
