<?php require_once 'header.php' ?>


<h1>Exemplo de Página com Links</h1>

<div class="ui five link items">
    <a class="item" href="#" id="link-1">
        <div class="content">
            <div class="description">
                <p>Texto do Link 1</p>
            </div>
        </div>
    </a>
    <a class="item" href="#" id="link-2">
        <div class="content">
            <div class="description">
                <p>Texto do Link 2</p>
            </div>
        </div>
    </a>
    <a class="item" href="#" id="link-3">
        <div class="content">
            <div class="description">
                <p>Texto do Link 3</p>
            </div>
        </div>
    </a>
    <a class="item" href="#" id="link-4">
        <div class="content">
            <div class="description">
                <p>Texto do Link 4</p>
            </div>
        </div>
    </a>
    <a class="item" href="#" id="link-5">
        <div class="content">
            <div class="description">
                <p>Texto do Link 5</p>
            </div>
        </div>
    </a>
</div>

<div class="ui form">
    <div class="field">
        <label for="input-text">Campo de Texto</label>
        <input type="text" id="input-text" readonly>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#link-1').click(function() {
            var text = $(this).find('.description p').text();
            $('#input-text').val(text);
        });

        $('#link-2').click(function() {
            var text = $(this).find('.description p').text();
            $('#input-text').val(text);
        });

        $('#link-3').click(function() {
            var text = $(this).find('.description p').text();
            $('#input-text').val(text);
        });

        $('#link-4').click(function() {
            var text = $(this).find('.description p').text();
            $('#input-text').val(text);
        });

        $('#link-5').click(function() {
            var text = $(this).find('.description p').text();
            $('#input-text').val(text);
        });
    });
</script>

<?php require_once 'footer.php' ?>