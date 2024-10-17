    <?php
    $images_folder = '/images/';
    $current_dir = dirname($_SERVER['SCRIPT_FILENAME']) ;
    $output['data'] = [];

    //$url = 'https://' . $_SERVER['HTTP_HOST'] . '/19/';
    if (isset($_GET['image'])) {
        $output['data']['path'] = $images_folder . $_GET['image'] . '.jpg';
        $descriptions_folder = '/descriptions/';
        $path = $current_dir . $descriptions_folder . $_GET['image'] . '.txt';
        if (file_exists($path))
            $output['data']['description'] = file_get_contents($path);
    } else {
        $path = $current_dir . $images_folder;

        if ($dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    $el['path'] = '/19' . $images_folder . $file;
                    $el['id'] = pathinfo($file, PATHINFO_FILENAME);
                    $output['data'] [] = $el;
                }
            }
            closedir($dh);
        }
    }
    $json = json_encode($output);
    echo $json;



