<?php include './template/header.php';?>
<header>
    <?php include './template/navbar-page.php';?>
    <div class="container">
        <h1 class="text-light py-3">Dashboard</h1>
        <form action="kelola.php" method="post">
            <button class="btn btn-primary mb-2" name="action" value="Add">+ Add New Games</button>
        </form>

        <div class="table-responsive">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Developer</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Size</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
                include "koneksi.php";
                $query = mysqli_query($konek, "SELECT * FROM games");
                while($data=mysqli_fetch_array($query)){
                    $id_games = $data[0];
                    $title = $data[1];
                    $desc = $data[2];
                    $video = $data[3];
                    $genre = $data[4];
                    $developer = $data[5];
                    $publisher = $data[6];
                    $rls_date = $data[7];
                    $games_size = $data[8];
                    $bg_img = $data[9];
                    ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $id_games ?></th>
                        <td><?= $title ?></td>
                        <td><?= $genre ?></td>
                        <td><?= $developer ?></td>
                        <td><?= $publisher ?></td>
                        <td><?= $rls_date ?></td>
                        <td><?= $games_size ?></td>
                        <td>
                            <form action="kelola.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id_games ?>">
                                <button class="btn btn-success mb-2" name="action" value="Edit"><i
                                        class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-danger mb-2" name="action" value="Delete"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</header>
<?php include './template/footer.php';?>