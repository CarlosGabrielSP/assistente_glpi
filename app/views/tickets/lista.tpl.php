<<?php require_once __DIR__ .'../header.php' ?>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lista as $user) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<<?php require_once __DIR__ .'../footer.php' ?>