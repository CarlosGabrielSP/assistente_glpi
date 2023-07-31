<?php require_once 'header.php' ?>

<form class="ui form" method="POST" action="/login">
    <div class="field">
        <input type="text" id="nome-login" name="nome" placeholder="Usuário" value="<?= $_GET['usr'] ?? '' ?>" required>
    </div>
    <div class="field">
        <input type="password" id="senha" name="senha" placeholder="Senha" required>
    </div>
    <button type="submit" class="ui fluid large teal submit button">Login</button>
</form>

<?php require_once 'footer.php' ?>