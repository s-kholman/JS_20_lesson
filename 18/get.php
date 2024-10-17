<?php
$current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
$descriptions_folder = '/descriptions/';
if (!isset($_POST['submit'])){
$images_folder = '/images/';
$fn = $_GET['image'];
$url = 'https://' . $_SERVER['HTTP_HOST'] . '/18';
$path = $current_dir . $descriptions_folder . $fn . '.txt';
$s = '';
if (file_exists($path)){
    $s = file_get_contents($path);
} else{
    $s =  '<h1>Изображение</h1>';
}

} else {
    $images_folder = '/images/';
    $path_descriptions = $current_dir . $descriptions_folder . $_POST['filename'] . '.txt';
    $path_image = $current_dir . $images_folder . $_POST['filename'] . '.jpg';
    if (file_exists($path_descriptions)){
        unlink($path_descriptions);
    }
    unlink($path_image);
    header('Location: /18/');

    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $s?></title>
    <link href="18.3.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Изображение</h1>

<section id="photo">
    <?php
        $path = $images_folder . $fn . '.jpg';
        echo '<img src="'. $url . $path . '">';
    echo "</br> $s";
    ?>
</section>
<p><a href="/18/#<?php echo $fn ?>">Назад</a> </p>
<form action="/18/get.php" method="post">
    <input hidden name="filename" value="<?php echo $fn ?>">
    <input type="submit" value="Удалить" name="submit">
</form>
</body>
</html>