<form action="<?= $url; ?>/cadastrar" method="post">
    <div class="container">
        <h1>Cadastro</h1>
        <p>Por favor preencha os campos do formulario para criar uma conta.</p>
        <hr>
        <label for="name"><b>Nome</b></label>
        <input type="text" placeholder="Nome" name="name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="psw"><b>Senha</b></label>
        <input type="password" placeholder="Senha" name="psw" required>

        <label for="psw-repeat"><b>Repetir Senha</b></label>
        <input type="password" placeholder="Repita Senha" name="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn">Cadastrar</button>
    </div>

    <div class="container signin">
        <p>Já possuí uma conta? <a href="#">Acesse já</a>!</p>
    </div>
</form>