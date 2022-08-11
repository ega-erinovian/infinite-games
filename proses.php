<?php

include 'koneksi.php';

if(isset($_POST)){
    $id_games = $_POST['id_games'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $video = $_POST['video'];
    $genre = $_POST['genre'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $rls_date = date('Y-m-d', strtotime($_POST['date']));
    $games_size = $_POST['size'];
    
    // Img uploading 
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];

    // Getting image path
    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

    // Clean-up name from prohibited letter 
    $arrTitle = explode(':', $title);

    $new_img_name = 'img-'.$arrTitle[0].'.'.$img_ext;
    $uploaded_path = 'assets/img/'.$new_img_name;
    move_uploaded_file($tmp_name, $uploaded_path);

    switch($_POST['action']){
        case 'Add':
            $query = "INSERT INTO games VALUE ('', '$title', '$desc', '$video', '$genre', '$developer', '$publisher', '$rls_date', '$games_size', '$new_img_name')";
            $result = mysqli_query($konek, $query);
            $msg = "Data successfully added"; // send message to database log_activities
            header('Location: index.php');
            break;
        case 'Edit':
            if(isset($new_img_name)){
                // if (value == value(on database)) ? smth edited : nothing
                /* example:
                    $query = mysqli_query($konek, "SELECT * FROM games");
                    while($data=mysqli_fetch_array($query)){
                        $id_games_db = $data[0];
                        $title_db = $data[1];
                        $desc_db = $data[2];
                        $video_db = $data[3];
                        $genre_db = $data[4];
                        $developer_db = $data[5];
                        $publisher_db = $data[6];
                        $rls_date_db = $data[7];
                        $games_size_db = $data[8];
                        $bg_img_db = $data[9];
                    }
                */
                $query = "UPDATE games SET `title`='$title',`desc`='$desc',`video`='$video',`genre`='$genre',`developer`='$developer',`publisher`='$publisher',`rls_date`='$rls_date',`games_size`='$games_size',`bg_img`='$new_img_name' WHERE `id_games` = $id_games";
            }else{
                $query = "UPDATE games SET `title`='$title',`desc`='$desc',`video`='$video',`genre`='$genre',`developer`='$developer',`publisher`='$publisher',`rls_date`='$rls_date',`games_size`='$games_size' WHERE `id_games` = $id_games";
            }
            $result = mysqli_query($konek, $query);
            /*
                if($result)
                    if($title != $title_db) message to db: "The title is set to "$title"
                    if($developer != $developer_db) message to db: "The title is set to "$developer_db"
                    ...
                else
                    Failed, try again
            */ 
            $msg = "Data successfully updated";
            header('Location: index.php');
            break;
        case 'Delete':
            $bg_img = mysqli_query($konek, "SELECT bg_img FROM games WHERE `id_games` = $id_games");
            $query = "DELETE FROM `games` WHERE `id_games` = $id_games";
            $path = realpath('assets/img/'.$bg_img);
            if(is_writable($path)){
                if(unlink($path)){
                    $result = mysqli_query($konek, $query);
                    $msg = "Data successfully deleted";
                }else{
                    $msg = "Data is not deleted";
                }
            }
            break;
    }
}

echo $msg;