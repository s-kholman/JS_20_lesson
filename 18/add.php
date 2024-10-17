<?php
    if (isset($_POST['submit'])) {
        $images_folder = '/images/';
        $descriptions_folder = '/descriptions/';
        $current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
        $images_path = $current_dir . $images_folder;
        $descriptions_path = $current_dir . $descriptions_folder;
        $d = getdate(time());
        $file_base_name = $d['year'] . $d['mon'] . $d['mday'] . $d['hours'] .
            $d['minutes'] . $d['seconds'];
        $image_file_name = $images_path . $file_base_name . '.jpg';
        move_uploaded_file($_FILES['file']['tmp_name'], $image_file_name);
        if (isset($_POST['description']) && !empty($_POST['description'])) {
            $description_file_name = $descriptions_path . $file_base_name . '.txt';
            $file = fopen($description_file_name, 'w');
            fwrite($file, $_POST['description']);
            fclose($file);
        }
        header('Location: /18/');
        exit();
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Добавление изображения</title>
        <link href="18.3.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Добавление изображения</h1>
        <form action="/18/add.php" method="post" enctype="multipart/form-data">
            <p>Изображение:<br><input type="file" name="file" accept=".jpg" required></p>
            <p>Описание:<br><textarea name="description"></textarea></p>
            <p><input type="submit" name="submit" value="Добавить"></p>
        </form>
        <p><a href="/">Назад</a></p>
    </body>
</html>
