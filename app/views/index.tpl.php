<?php require_once 'header.php' ?>

<div class="box-main-home">
    <div class="box-login">
        <div id="form-login-home">
            <div class="box-head">
                <div class="logos">
                    <img id="logo-cosanpa" class="ui tiny centered image circular animate__animated animate__rotateIn" src="/img/logo.png" alt="logo-cosanpa">
                    <img class="ui small centered image animate__animated animate__fade" src="/img/logo-GLPI.png" alt="logo-glpi">
                </div>
                <h1 class="header" style="color: white; text-align:center">Unidade Executiva <br /> Suporte Tecnológico</h1>
                <p class="header" style="color: white; text-align:center;">UEST - USTI</p>
            </div>
            <br />
            <div class="login" style="margin-top: 20px;">
                <?php if ($usuario = $_SESSION['user'] ?? false) { ?>
                    <p style="color: white"><span>Bem vindo(a), <strong><?= $usuario['firstname'] ?></strong></span></p>
                    <a href="/logoff" class="ui inverted mini basic red button">Sair</a>
                <?php } else { ?>
                    <form class="ui form" method="POST" action="/login">
                        <div class="field">
                            <input type="text" id="nome-login" name="nome" placeholder="Usuário" required>
                        </div>
                        <button type="submit" class="ui fluid large teal submit button">
                            Acessar&nbsp&nbsp<i class="icon sign-in"></i>
                        </button>
                    </form>
                <?php } ?>
            </div>
        </div>
        <div id="btn-chamados">
            <a href="http://suporte.cosanpa.pa.gov.br:8080/front/ticket.php" target="_blank" class="ui primary button" style="width: 80%;">Ver meus chamados</a>
            <a href="/arquivos/manual" target="_blank" class="ui right floated icon orange  button" style="width: 15%;"><i class="help link icon"></i></a>
        </div>

    </div>
    <div class="box-dashboard">
        <h1 class="ui center aligned header">Assistente de Abertura de Chamados</h1>
        <br>
        <div class="ui three cards">
            <a id="card-2" class="ui raised card card-x" href="#">
                <span class="ui teal huge right corner label">
                    <i class="user icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Esqueci minha senha de Usuário</h3>
                    <div class="description">
                        <p style="display: none">Solicito redefinição da minha senha de Usuário.</p>
                    </div>
                </div>
            </a>

            <a id="card-3" class="ui raised card card-x" href="#">
                <span class="ui orange huge right corner label">
                    <i class="at icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Esqueci minha senha de e-mail</h3>
                    <div class="description">
                        <p style="display: none">Solicito redefinição da senha do meu e-mail.</p>
                    </div>
                </div>
            </a>

            <a id="card-4" class="ui raised card card-x" href="#">
                <span class="ui violet huge right corner label">
                    <i class="folder open icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Acessar a pasta compartilhada</h3>
                    <div class="description">
                        <p style="display: none">Solicito permissão de acesso à pasta compartilhada.</p>
                    </div>
                </div>
            </a>

            <a id="card-5" class="ui raised card card-x" href="#">
                <span class="ui violet huge right corner label">
                    <i class="chrome icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Estou sem acesso à internet</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionado à internet.</p>
                    </div>
                </div>
            </a>

            <a id="card-6" class="ui raised card card-x" href="#">
                <span class="ui orange huge right corner label">
                    <i class="envelope icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Não consigo enviar/receber e-mails</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionado à conta de e-mail.</p>
                    </div>
                </div>
            </a>

            <a id="card-7" class="ui raised card card-x" href="#">
                <span class="ui teal huge right corner label">
                    <i class="user plus icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Nova conta de usuário (Acesso ao computador)</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de nova conta de usuário de rede.</p>
                    </div>
                </div>
            </a>

            <a id="card-8" class="ui raised card card-x" href="#">
                <span class="ui orange huge right corner label">
                    <i class="envelope open icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Nova conta de e-mail</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de nova conta de e-mail.</p>
                    </div>
                </div>
            </a>

            <a id="card-9" class="ui raised card card-x" href="#">
                <span class="ui teal huge right corner label">
                    <i class="desktop icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">O computador não liga</h3>
                    <div class="description">
                        <p style="display: none">Solicito reparo de um computador que não está ligando.</p>
                    </div>
                </div>
            </a>

            <a id="card-10" class="ui raised card card-x" href="#">
                <span class="ui brown huge right corner label">
                    <i class="print icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Substituição do Toner da Impressora</h3>
                    <div class="description">
                        <p style="display: none">A impressão está fraca ou com falhas, solicito troca do Toner.</p>
                    </div>
                </div>
            </a>

            <a id="card-11" class="ui raised card card-x" href="#">
                <span class="ui teal huge right corner label">
                    <i class="shield alternate icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Apareceu um aviso de vírus em meu computador</h3>
                    <div class="description">
                        <p style="display: none">Solicito varredura e remoção de vírus de computador.</p>
                    </div>
                </div>
            </a>

            <a id="card-12" class="ui raised card card-x" href="#">
                <span class="ui brown huge right corner label">
                    <i class="print icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Impressora não está imprimindo</h3>
                    <div class="description">
                        <p style="display: none">Solicito suporte relacionao à impressora.</p>
                    </div>
                </div>
            </a>

            <a id="card-13" class="ui raised card card-x" href="#">
                <span class="ui violet huge right corner label">
                    <i class="sitemap icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Novo Ponto de Rede</h3>
                    <div class="description">
                        <p style="display: none">Solicito criação de novo ponto de rede.</p>
                    </div>
                </div>
            </a>

            <a id="card-1" class="ui raised card" href="#">
                <span class="ui black huge right corner label">
                    <i class="clipboard check icon"></i>
                </span>
                <div class="content">
                    <h3 class="header">Abrir um Chamado</h3>
                    <div class="description">
                        <p style="display: none">Solicitar abertura de chamado</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- MODAL A1 ============================================================================================================================================== -->
<div id="modal-a1" class="ui first coupled modal piled segment">
    <i class="close icon"></i>
    <br>
    <form id="form-modal-a1" method="POST" action="/novoChamado" class="ui form">
        <div class="header">
            <div class="ui labeled fluid input">
                <div class="ui label">
                    <h3>Assunto:</h3>
                </div>
                <input id="assunto-a1" class="ui input required" type="text" name="assunto" required>
            </div>
        </div>
        <div class="content">
            <br>
            <br>
            <input id="ipt-cod-a1" name="cod" type="hidden">
            <input id="ipt-nomeUsuario-a1" name="nomeUsuario" type="hidden">
            <div class="required field">
                <label style="font-size: 1.3rem;">
                    <strong>Descrição:</strong>
                </label>
                <textarea name="descricao" id="descricao-a1" rows="3" required></textarea>
            </div>
            <div class="fields">
                <div class="required eight wide field">
                    <label>E-mail</label>
                    <input id="iptEmailA1" type="email" name="email" placeholder="email@cosanpa.pa.gov.br" value="<?= $usuario['email'] ?? ''?>" required>
                </div>
                <div class="four wide field">
                    <label>Setor</label>
                    <input id="iptSetorA1" type="text" name="setor">
                </div>
                <div class="four wide field">
                    <label>Ramal</label>
                    <input id="iptRamalA1" type="text" name="ramal" maxlength="16" value="<?= $usuario['phone'] ?? ''?>">
                </div>
            </div>
            <div class="ui info icon message">
                <i class="close icon"></i>
                <i class="lightbulb outline icon"></i>
                <div class="content">
                    <div class="header">
                        Acrescente detalhes
                    </div>
                    <p>Lembre-se de incluir todas as informações relevantes, como: <strong>DRT</strong> do solicitante, <strong>Setor</strong>, <strong>Tombamento</strong>, <strong>E-mail</strong> e qualquer outra informação que possa ser útil.</p>
                </div>
            </div>
        </div>
    </form>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <div id="submit-formModal-a1" class="ui green button right labeled icon button">
            Enviar
            <i class="paper plane icon"></i>
        </div>
    </div>
</div>
<!-- MODAL A2---------------------------------------------------------------------------- -->
<div id="modal-a2" class="ui mini coupled modal red segment">
    <div>
        <h4 class="ui header">
            <div class="content">
                <p><i class="red exclamation circle icon"></i>Informe o seu Usuário ou de outra pessoa</p>
                <p class="sub header">O seu <strong>Usuário</strong> é o número utilizado para acessar os computadores da empresa, geralmente seu <strong>DRT</strong> ou <strong>RG</strong></p>
            </div>
        </h4>
        <div class="description">
            <div class="ui form">
                <div class="ui fluid icon input">
                    <input type="text" id="nome-usuario-a2" name="nome" placeholder="Usuário" required>
                    <i class="icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui tiny grey button">
            Voltar
        </div>
        <div id="btnOk-a2" class="ui tiny green button disabled">
            OK
        </div>
    </div>
</div>
<!-- MODAL B1 ============================================================================================================================================== -->
<div id="modal-b1" class="ui small first coupled modal piled segment">
    <i class="close icon"></i>
    <div class="header">
        <h3 id="assunto-b1"></h3>
    </div>
    <div class="content">
        <div class="description">
            <p id="descricao-b1"></p>
        </div>
        <br>
        <br>
        <form id="form-modal-b1" method="POST" action="/novoChamado" class="ui form">
            <input id="ipt-cod-b1" name="cod" type="hidden">
            <input id="ipt-nomeUsuario-b1" name="nomeUsuario" type="hidden">
            <div class="fields">
                <div class="required eight wide field">
                    <label>E-mail</label>
                    <input id="iptEmailB1" type="email" name="email" placeholder="email@cosanpa.pa.gov.br" value="<?= $usuario['email'] ?? '' ?>" required>
                </div>
                <div class="four wide field">
                    <label>Setor</label>
                    <input id="iptSetorB1" type="text" name="setor">
                </div>
                <div class="four wide field">
                    <label>Ramal</label>
                    <input id="iptRamalB1" type="text" name="ramal" maxlength="16" value="<?= $usuario['phone'] ?? ''?>">
                </div>
            </div>
            <div class="field">
                <label>Informações adicionais</label>
                <textarea name="infoAdc" id="infoAdc-b1" rows="3"></textarea>
            </div>
        </form>
        <div class="ui info icon message">
            <i class="close icon"></i>
            <i class="lightbulb outline icon"></i>
            <div class="content">
                <div class="header">
                    Acrescente detalhes
                </div>
                <p>Lembre-se de incluir todas as informações relevantes, como: <strong>DRT do solicitante</strong>, <strong>Setor</strong>, <strong>Tombamento</strong>, <strong>E-mail</strong> e qualquer outra informação que possa ser útil.</p>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancelar
        </div>
        <div id="submit-formModal-b1" class="ui green button right labeled icon button">
            Enviar
            <i class="paper plane icon"></i>
        </div>
    </div>
</div>
<!-- MODAL B2 ---------------------------------------------------------------------------- -->
<div id="modal-b2" class="ui mini coupled modal red segment">
    <div>
        <h4 class="ui header">
            <div class="content">
                <p><i class="red exclamation circle icon"></i>Informe o seu Usuário ou de outra pessoa</p>
                <p class="sub header">O seu <strong>Usuário</strong> é o número utilizado para acessar os computadores da empresa, geralmente seu <strong>DRT</strong> ou <strong>RG</strong></p>
            </div>
        </h4>
        <div class="description">
            <div class="ui form">
                <div class="ui fluid icon input">
                    <input type="text" id="nome-usuario-b2" name="nome" placeholder="Usuário" required>
                    <i class="icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui tiny grey button">
            Voltar
        </div>
        <div id="btnOk-b2" class="ui tiny green button disabled">
            OK
        </div>
    </div>
</div>

<script src="/js/index.js"></script>
<script>
    $(document).ready(function() {
        var sessao = <?= isset($_SESSION['user']) ? true : false ?> + '';

        $('#submit-formModal-a1').click(function() {
            var emailA1 = $('#iptEmailA1').val();
            if (emailA1) {
                if (sessao) {
                    $('#form-modal-a1').submit();
                } else {
                    $('#modal-a2').modal({
                        allowMultiple: true,
                        transition: 'shake in',
                    }).modal('show');
                }
            } else {
                $('#form-modal-a1 .required').addClass('error');
            }
        });

        $('#submit-formModal-b1').click(function() {
            var emailB1 = $('#iptEmailB1').val();
            if (emailB1) {
                if (sessao) {
                    console.log('Chamado Criado');
                    $('#form-modal-b1').submit();
                } else {
                    $('#modal-b2').modal({
                        allowMultiple: true,
                        transition: 'shake in',
                    }).modal('show');
                }
            } else {
                $('#form-modal-b1 .required').addClass('error');
            }
        });
    });
</script>

<?php require_once 'footer.php' ?>