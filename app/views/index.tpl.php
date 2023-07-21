<?php require_once 'header.php' ?>

<div class="box-main-home">
    <div class="box-login">
        <div id="form-login-home">
            <img class="ui tiny centered image circular animate__animated animate__rotateIn" src="/img/logo.png" alt="logo">
            <h3 class="header" style="color: white; text-align:center">UE - Suporte Tecnológico</h3>
            <?php if($usuario = $_SESSION['user'] ?? false) { ?>
                <p style="color: white">Bem vindo, <strong><?= $usuario['firstname'] ?></strong></p>
                <a href="/logoff" class="ui inverted mini basic orange button">Sair</a>
            <?php } else { ?>
                <form class="ui form" method="POST" action="/login">
                    <div class="field">
                        <input type="text" id="nome" name="nome" placeholder="DRT" required>
                    </div>
                    <div class="field">
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    </div>
                    <button type="submit" class="ui fluid large teal submit button">Login</button>
                </form>
            <?php } ?>
        </div>
    </div>
    <div class="box-dashboard">
        <h1 class="ui center aligned header">Do que você está precisando?</h1>
        <br>

        <div class="ui three cards">
            <a id="card-1" class="ui raised card" href="#">
                <span class="ui green right corner label"></span>
                <div class="content">
                    <h3 class="header">Abrir um Chamado</h3>
                    <div class="description">
                        <p style="display: none;">Solicitar abertura de chamado para assuntos diversos</p>
                    </div>

                </div>
            </a>

            <a id="card-2" class="ui raised card card-x" href="#">
                <span class="ui gray right corner label"></span>
                <div class="content">
                    <h3 class="header">Novo ponto de rede</h3>
                    <div class="description">
                        <p style="display: none;">Solicito criação de novo ponto de rede</p>
                    </div>
                </div>
            </a>

            <a id="card-3" class="ui raised card card-x" href="#">
                <span class="ui green right corner label"></span>
                <div class="content">
                    <h3 class="header">Esqueci minha senha de e-mail</h3>
                    <div class="description">
                        <p style="display: none;">Solicito redefinição da senha do meu e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-4" class="ui raised card card-x" href="#">
                <span class="ui red right corner label"></span>
                <div class="content">
                    <h3 class="header">Estou sem acesso à Internet</h3>
                    <div class="description">
                        <p style="display: none;">Solicito suporte relacionado à internet</p>
                    </div>
                </div>
            </a>

            <a id="card-5" class="ui raised card card-x" href="#">
                <span class="ui orange right corner label"></span>
                <div class="content">
                    <h3 class="header">Acessar a pasta compartilhada</h3>
                    <div class="description">
                        <p style="display: none;">Solicito permissão de acesso à pasta compartilhada</p>
                    </div>
                </div>
            </a>

            <a id="card-6" class="ui raised card card-x" href="#">
                <span class="ui blue right corner label"></span>
                <div class="content">
                    <h3 class="header">Nova conta de e-mail</h3>
                    <div class="description">
                        <p style="display: none;">Solicito criação de nova conta de e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-7" class="ui raised card card-x" href="#">
                <span class="ui teal right corner label"></span>
                <div class="content">
                    <h3 class="header">Nova conta de usuário (Acesso ao computador)</h3>
                    <div class="description">
                        <p style="display: none;">Solicito criação de nova conta de usuário</p>
                    </div>
                </div>
            </a>

            <a id="card-8" class="ui raised card card-x" href="#">
                <span class="ui black right corner label"></span>
                <div class="content">
                    <h3 class="header">Não consigo enviar/receber e-mails</h3>
                    <div class="description">
                        <p style="display: none;">Solicito suporte relacionado à conta de e-mail</p>
                    </div>
                </div>
            </a>

            <a id="card-9" class="ui raised card card-x" href="#">
                <span class="ui violet right corner label"></span>
                <div class="content">
                    <h3 class="header">O Computador não liga</h3>
                    <div class="description">
                        <p style="display: none;">Solicito reparo de um computador que não está ligando</p>
                    </div>
                </div>
            </a>

            <a id="card-10" class="ui raised card card-x" href="#">
                <span class="ui brown right corner label"></span>
                <div class="content">
                    <h3 class="header">Apareceu um aviso de vírus em meu computador</h3>
                    <div class="description">
                        <p style="display: none;">Solicito varredura e remoção de vírus de computador</p>
                    </div>
                </div>
            </a>

            <a id="card-11" class="ui raised card card-x" href="#">
                <span class="ui pink right corner label"></span>
                <div class="content">
                    <h3 class="header">Impressora não está imprimindo</h3>
                    <div class="description">
                        <p style="display: none;">Solicito suporte relacionao à impressora</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<div id="modal-b1" class="ui small first coupled modal piled segment">
    <i class="close icon"></i>
    <div class="header">
        <h3 id="assunto"></h3>
    </div>
    <div class="content">
        <div class="description">
            <p id="descricao"></p>
        </div>
        <br>
        <br>
        <form id="form-modal-b1" method="POST" class="ui form">
            <input id="ipt-titulo" type="hidden">
            <input id="ipt-descricao" type="hidden">
            <input id="login-formX" type="hidden">
            <div class="field">
                <label>Informações adicionais</label>
                <textarea name="infoAdc" id="infoAdc"></textarea>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <div id="submit-formModalX" class="ui green button right labeled icon button">
            Enviar
            <i class="paper plane icon"></i>
        </div>
    </div>
</div>

<div id="modal-b2" class="ui mini coupled modal red segment">

    <div>
        <h4 class="ui header">
            <div class="content">
                <p><i class="red exclamation circle icon"></i>Não esqueça de informar seu Usuário</p>
                <p class="sub header">O seu <strong>Usuário</strong> é o mesmo utilizado para acessar os computadores da empresa, geralmente seu <strong>DRT</strong> ou <strong>RG</strong></p>
            </div>
        </h4>
        <div class="description">
            <div class="ui form">
                <div class="field">
                    <input id="campo" type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui tiny grey button">
            Voltar
        </div>
        <div class="ui tiny green button">
            OK
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {

        $('.card-x').click(function() {
            var titulo = $(this).find('.header').text();
            var descricao = $(this).find('.description p').text();
            var login = $('#login').val();
            $('#modal-b1 #assunto').text('Assunto: ' + titulo);
            $('#modal-b1 #descricao').text('Descrição: ' + descricao);
            $('#ipt-titulo').val(titulo);
            $('#ipt-descricao').val(descricao);
            $('#login-formX').val(login);
            $('#modal-b1').modal({
                allowMultiple: true,
                transition: 'horizontal flip'
            }).modal('show');
        });

        $('#submit-formModalX').click(function() {
            var login = $('#login').val();
            // console.log(login);
            if (login) {
                console.log(login);
                // $('#form-modal-b1').submit();
            } else {
                $('#modal-b2').modal({
                    allowMultiple: true,
                    transition: 'shake in',
                    // transition: 'vertical flip in out'
                }).modal('show');
            }
        });

        $('#modal-b2 .grey.button').click(function() {
            $('#modal-b2').modal({
                transition: 'horizontal flip',
            }).modal('hide');
        });

    });
</script>

<?php require_once 'footer.php' ?>