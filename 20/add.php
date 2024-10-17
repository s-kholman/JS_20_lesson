<?php
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
$output['data']['status'] = 1;
$json = json_encode($output);
echo $json;
?>
