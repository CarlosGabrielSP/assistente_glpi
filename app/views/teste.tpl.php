<?php require_once 'header.php' ?>


<h1>Exemplo de Página com Modais</h1>

<div class="ui three stackable cards">
    <div class="card">
        <div class="content">
            <div class="header">Modal 1</div>
            <div class="description">Conteúdo do modal 1</div>
        </div>
        <div class="extra content">
            <button class="ui primary basic button" id="modal-1-button">Abrir Modal 1</button>
        </div>
    </div>

    <div class="card">
        <div class="content">
            <div class="header">Modal 2</div>
            <div class="description">Conteúdo do modal 2</div>
        </div>
        <div class="extra content">
            <button class="ui primary basic button" id="modal-2-button">Abrir Modal 2</button>
        </div>
    </div>

    <div class="card">
        <div class="content">
            <div class="header">Modal 3</div>
            <div class="description">Conteúdo do modal 3</div>
        </div>
        <div class="extra content">
            <button class="ui primary basic button" id="modal-3-button">Abrir Modal 3</button>
        </div>
    </div>
</div>

<div class="ui modal" id="modal-1">
    <div class="header">Modal 1</div>
    <div class="content">
        <p>Conteúdo do modal 1</p>
    </div>
    <div class="actions">
        <div class="ui black deny button">Fechar</div>
    </div>
</div>

<div class="ui modal" id="modal-2">
    <div class="header">Modal 2</div>
    <div class="content">
        <p>Conteúdo do modal 2</p>
    </div>
    <div class="actions">
        <div class="ui black deny button">Fechar</div>
    </div>
</div>

<div class="ui modal" id="modal-3">
    <div class="header">Modal 3</div>
    <div class="content">
        <p>Conteúdo do modal 3</p>
    </div>
    <div class="actions">
        <div class="ui black deny button">Fechar</div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modal-1-button').click(function() {
            $('#modal-1').modal('show');
        });

        $('#modal-2-button').click(function() {
            $('#modal-2').modal('show');
        });

        $('#modal-3-button').click(function() {
            $('#modal-3').modal('show');
        });
    });
</script>



<?php require_once 'footer.php' ?>