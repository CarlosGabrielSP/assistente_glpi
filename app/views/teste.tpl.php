<?php require_once 'header.php' ?>

<h1><?= $usuario ?? 'Nada' ?></h1>

<input type="text" id="campo-pesquisa" name="termo" placeholder="Digite o termo de pesquisa">

<div class="ui form">
    <div class="field">
        <label>Login</label>
        <select class="ui search selection dropdown">
            <option value="">Informe seu DRT/RG</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
        </select>
    </div>
</div>

<ul id="resultados"></ul>

<script>
    $(document).ready(function() {
        $('#campo-pesquisa').on('input', function() {
            var termo = $(this).val();

            $.ajax({
                url: '/usuarios',
                method: 'POST',
                data: {
                    termo: termo
                },
                success: function(response) {
                    // console.debug(response[0]);
                    $('#resultados').empty();
                    var obj = JSON.parse(response);

                    if (response.length > 0) {
                        $.each(obj, function(index, elemento) {
                            // console.log(elemento);
                            var li = $('<li>').text(elemento.name);
                            $('#resultados').append(li);
                        });
                    } else {
                        var li = $('<li>').text('Nenhum resultado encontrado');
                        $('#resultados').append(li);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Ocorreu um erro:', error);
                }
            });

        });
    });
</script>
</body>

</html>


<?php require_once 'footer.php' ?>