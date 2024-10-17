<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
$images_folder = '/images/';
$current_dir = dirname($_SERVER['SCRIPT_FILENAME']);
$path = $current_dir . $images_folder;
$last_id = (isset($_SERVER['LAST_EVENT_ID'])) ?
    $_SERVER['LAST_EVENT_ID'] : 0;
$n = 1;
    if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false){
            if ($file != '.' && $file != '..'){
            if ($n > $last_id) {
                $el['path'] = $images_folder . $file;
                $el['id'] = pathinfo($file, PATHINFO_FILENAME);
                echo "event: newfile\n";
                echo 'data: ' . json_encode($el) . "\n";
                echo 'id: ' . $n . "\n\n";
                flush();
                $n++;
            }
        }
    }
closedir($dh);
}
echo "event: end\n";
echo "data: \n\n"
?>