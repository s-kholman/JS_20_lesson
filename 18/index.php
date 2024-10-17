<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="18.3.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Фотогалерея</h1>
<p><a href="add.php">Добавить изображение</a> </p>
<section id="photogallery">
    <?php
    $images_folder = '/images/';
    $current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
    $path = $current_dir . $images_folder;
    $url = 'https://' . $_SERVER['HTTP_HOST'] . '/18/';

    if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                $n = pathinfo($file, PATHINFO_FILENAME);
                echo '<a href="'.$url. 'get.php?image='. $n . '" id="'. $n .'">';
                echo '<img src="' .$url.$images_folder.$file . '">';
                echo '</a>';
            }
        }
        closedir($dh);
    }
    ?>
</section>
</body>
</html>

