<?php include './template/header.php';?>
<!-- HEADER -->
<!-- Navbar -->
<header>
    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img class='logo-nav' src="./assets/img/logo.png" alt="logo"></a>
            <a href="#content" class="btn btn-primary">Shop</a>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center">
        <h1 class='header-title text-light fw-bolder'>FOR GAMERS BY GAMERS</h1>
    </div>
</header>
<section class="about-container py-5 text-light">
    <div class="container">
        <h1 class='about-title text-center fw-bolder'>- WELCOME GAMERS -</h1>
        <p class='about-text text-center'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, ab accusamus
            assumenda
            perspiciatis hic nostrum
            nemo possimus ad sit sed quis excepturi. Fuga ullam possimus voluptatem enim, tempore ut delectus.
            Harum voluptatem veritatis praesentium nemo deserunt. Perferendis neque voluptatibus eum recusandae tempora
            incidunt illo, voluptas saepe similique at magni perspiciatis quibusdam ex ad ut dolorem quaerat vitae
            molestiae
            dolorum iusto.
            Quia aut ea dicta tempora possimus natus dolorem sed omnis incidunt est aliquam perspiciatis officia
            corporis
            assumenda culpa quibusdam, laborum maxime alias quos inventore velit et. Cupiditate necessitatibus ea
            aperiam!
        </p>
    </div>
</section>
<section class="content-container" id="content">
    <div class="container">
        <div class="row">
            <?php include 'koneksi.php';
                $query = mysqli_query($konek, "SELECT id_games, title, bg_img FROM games");
                while($data=mysqli_fetch_array($query)){?>
            <div class="btn-games col-md-4 mb-4">
                <form action="detail.php" method="GET">
                    <input type="hidden" value="<?php echo $data['id_games']; ?>" name="id_games" />
                    <button type="submit" class="btn btn-dark d-flex align-items-center justify-content-center py-1"
                        style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/img/<?php echo $data['bg_img'];?>')">
                        <h1 class="fs-5"><?php echo $data['title'];?></h1>
                    </button>
                </form>
            </div>
            <?php
                    }
                ?>
        </div>
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