<<<<<<< HEAD
<form class="box" action="<?= Router::getSaveAccountPage() ?>" name="register" method="post">
=======
<form class="box" action="<?= Router::getSigninAction() ?>" name="register" method="post">
>>>>>>> f0d2f388be83c1981be5b7c0d8b8772f838c9c7b
  <h1>S'inscrire</h1>
  <label for="login">Pseudo</label><br />
  <input id="login" type="text" class="box-input" name="login" placeholder="Pseudo" value="<?= $pseudo ?>" required /><br />

  <label for="name">Nom</label><br />
  <input id="name" type="text" class="box-input" name="name" placeholder="Nom (peut être vide)" value="<?= $name ?>" /><br />


    <label for="nom">Nom</label><br />
    <input id="nom" type="text" class="box-input" name="nom" placeholder="Nom" value="Entrez votre nom" required /><br />

    <label for="password">Mot de passe</label><br />
  <input id="password" type="password" class="box-input" name="password" placeholder="Mot de passe" required /><br />

  <label for="confirmPassword">Confirmation du mot de passe</label><br />
  <input id="confirmPassword" type="password" class="box-input" name="confirmPassword" placeholder="Confirmation mot de passe" required /><br />

  <input type="submit" class="box-button" name="submit" value="Inscription" /><br />
  <p class="box-register">Déjà inscrit ? <a href="<?= Router::getLoginPage() ?>">Connectez-vous ici</a></p>
</form>
