<?php
require __DIR__. '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `address_book`");

?>
<?php include __DIR__. '/parts/html-head.php';   ?>
<?php include __DIR__. '/parts/navbar.php';   ?>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Birthday</th>
            <th scope="col">Address</th>
        </tr>
        </thead>
        <tbody>
        <?php while($r=$stmt->fetch()): ?>
        <tr>
            <td><?= $r['sid'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['mobile'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['birthday'] ?></td>
            <td><?= $r['address'] ?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__. '/parts/html-foot.php';   ?>