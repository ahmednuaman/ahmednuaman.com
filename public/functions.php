<?php
if (!ENV) { die('*sneaky sneaky*'); }

function get_assets($ext, $template)
{
    $folders = array(
        PATH_ASSETS . $ext . '/' . PATH_VENDOR,
        PATH_ASSETS . $ext
    );

    foreach ($folders as $folder)
    {
        $files = @scandir($folder);

        foreach ($files as $file)
        {
            if (strstr($file, $ext))
            {
                printf($template . "\n", '/' . $folder . '/' . $file);
            }
        }
    }
}