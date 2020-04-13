<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data-list2';

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    tbody tr i.fa-trash-alt {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--
                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page="></a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                    -->
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
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
                <!--
                    <tr>
                        <td><?//= $r['sid'] ?></td>
                        <td><?//= $r['name'] ?></td>
                        <td><?//= $r['mobile'] ?></td>
                        <td><?//= $r['email'] ?></td>
                        <td><?//= $r['birthday'] ?></td>
                        <td><?//= htmlentities($r['address']) ?></td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>