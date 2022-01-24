<?php include './template/header.php';?>
<header>
    <?php include './template/navbar-page.php';?>
    <div class="container">
        <h1 class="text-light py-3"><?php echo $_POST['action'].' Data';?></h1>
        <form class="row text-light" action="proses.php" method="post" enctype="multipart/form-data">
            <?php
                include 'koneksi.php';
                if(isset($_POST['action'])){
                    // 'Add' conditional
                    if($_POST['action'] == 'Add'){
                        $id_games = "";
                        $title = "";
                        $desc = "";
                        $video = "";
                        $genre = "";
                        $developer = "";
                        $publisher = "";
                        $rls_date = "";
                        $games_size = "";
                        $bg_img = "";
                    }
                    // 'Edit' conditional
                    else{
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
                        }
                    }
                    // 'Delete' conditional
                }
                ?>
            <!-- Form -->
            <input type="hidden" name="action" value="<?= $_POST['action'] ?>" />
            <input type="hidden" name="id_games" value="<?= $id_games?>">
            <div class="col-12 mb-3">
                <label for="title-form" class="form-label">Title</label>
                <input type="text" class="form-control" id="title-form" placeholder="Input title here" name="title"
                    value="<?= $title?>">
            </div>
            <div class="col-12 mb-3">
                <label for="desc-form" class="form-label">Description</label>
                <textarea class="form-control" id="desc-form" rows="5" name="desc"><?= $desc?></textarea>
            </div>
            <div class="col-12 mb-3">
                <label for="video-form" class="form-label">Video</label>
                <input type="text" class="form-control" id="video-form" value="<?= $video; ?>"
                    placeholder="Insert youtube video link here" name="video">
            </div>
            <div class="col-4 mb-3">
                <label for="genre-form" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre-form"
                    placeholder="Use comma ( , ) to separate multiple genre" name="genre" value="<?= $genre?>">
            </div>
            <div class="col-4 mb-3">
                <label for="developer-form" class="form-label">Developer</label>
                <input type="text" class="form-control" id="developer-form" placeholder="Input developer's name here"
                    name="developer" value="<?= $developer?>">
            </div>
            <div class="col-4 mb-3">
                <label for="publisher-form" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher-form" placeholder="Input publisher's name here"
                    name="publisher" value="<?= $publisher?>">
            </div>
            <div class="col-12 mb-3">
                <label for="date-form" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="date-form" placeholder="Input date's name here" name="date"
                    value="<?= $rls_date?>">
            </div>
            <div class="col-6 mb-3">
                <label for="size-form" class="form-label">Size</label>
                <input type="text" class="form-control" id="size-form" placeholder="Input size's here" name="size"
                    value="<?= $games_size?>">
            </div>
            <div class="col-6 mb-3">
                <label for="img-form" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="img-form" name="img" value="<?= $bg_img?>">
            </div>
            <div class="col-12 mb-3 text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</header>
<?php include './template/footer.php';?>