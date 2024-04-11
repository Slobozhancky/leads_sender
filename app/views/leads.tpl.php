<?php require "components/header.tpl.php" ?>

<main>
    <h2><?= $title ?></h2>


    <table class="table table-dark table-striped">
        <tbody>
            <tr>
                <th>id</th>
                <th>email</th>
                <th>status</th>
                <th>ftd</th>
            </tr>
            <?php foreach ($statuses['data'] as $key => $value): ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['status'] ?></td>
                    <td><?= $value['ftd'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php require "components/footer.tpl.php" ?>