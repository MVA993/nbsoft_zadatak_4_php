<?php
function listFolderFiles($dir){
    $folders = scandir($dir);

    unset($folders[array_search('.', $folders, true)]);
    unset($folders[array_search('..', $folders, true)]);

    if (count($folders) < 1){
        return;
    }

    echo '<ul>';
    foreach($folders as $folder){
        $path = $dir.'/'.$folder;
        if(!is_dir($path)){
            echo "  <li>
                    <a href='$path' target='_blank'>".$folder."</a>
                    </li>";
        }else{
            echo "  <li>
                    ".$folder."
                    </li>";
            listFolderFiles($path);
        }
        }
    echo '</ul>';
}
?>
