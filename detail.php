<?php include './template/header.php';?>
<?php
    include 'koneksi.php';
    $id_games = $_GET['id_games'];
    $query = "SELECT * FROM games WHERE id_games = '$id_games'";
    $query = mysqli_query($konek, $query);
    while($data=mysqli_fetch_array($query)){
    ?>
<section class="detail-container"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 1)), url('assets/img/<?php echo $data['bg_img']; ?>');">
    <?php include './template/navbar-page.php';?>
    <div class="content container text-light">

        <h1 class="about-title"><?= $data['title'];?></h1>
        <p class="py-3 about-text"><?= $data['desc'] ?></p>
        <div class="row">
            <div class="col-md-6 mb-2">
                <iframe class="about-video" width="100%" height="100%"
                    src="https://www.youtube.com/embed/<?= $data['video']?>" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-md-6 mb-2">
                <div class="desc-container p-4 fs-3 d-flex flex-column justify-content-center">
                    <p class="d-flex justify-content-between">Genre <span
                            class="desc-item text-primary fw-lighter"><?= $data['genre']?></span></p>
                    <p class="d-flex justify-content-between">Developer <span
                            class="desc-item text-primary fw-lighter"><?= $data['developer']?></span></p>
                    </p>
                    <p class="d-flex justify-content-between">Publisher <span
                            class="desc-item text-primary fw-lighter"><?= $data['publisher']?></p>
                    <p class="d-flex justify-content-between">Release Date <span
                            class="desc-item text-primary fw-lighter"><?= $data['rls_date']?></span>
                    </p>
                    <p class="d-flex justify-content-between">Storage <span
                            class="desc-item text-primary fw-lighter"><?= $data['games_size']?></span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<footer>
    <div class="container d-flex flex-column justify-content-center align-items-center text-light">
        <a href="dashboard.php" class="text-light">
            <h1>Infinite Games</h1>
        </a>
        <h5>&copy; 2022 Ega Erinovian</h5>
    </div>
</footer>
<?php include './template/footer.php';?>