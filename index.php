<?php
function listFolderFiles($dir){
    $flds = scandir($dir);

    unset($flds[array_search('.', $flds, true)]);
    unset($flds[array_search('..', $flds, true)])
        
    if (count($flds) < 1){
        return;
    }

    echo '<ul>';
    foreach($flds as $fld){
        $path = $dir.'/'.$fld;
        if(!is_dir($path)){
            echo "  <li>
                    <a href='$path' target='_blank'>".$fld."</a>
                    </li>";
        }else{
            echo "  <li>
                    ".$fld."
                    </li>";
            listFolderFiles($path);
        }
        }
    echo '</ul>';
}

listFolderFiles('./folder');
?>
