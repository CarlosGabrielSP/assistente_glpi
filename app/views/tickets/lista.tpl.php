<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Chamados</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $chamado) : ?>
            <tr>
                <td><?= $chamado['id'] ?></td>
                <td><?= $chamado['name'] ?></td>
                <td><?= $chamado['content'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</body>
</html>