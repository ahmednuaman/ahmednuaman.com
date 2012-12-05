<?php
if (!ENV) { die('*sneaky sneaky*'); }

class BlogEntry
{
    private $file;

    var $link;
    var $title;

    public function __construct($file)
    {
        $this->file = $file;

        $this->read_file();
    }

    private function read_file()
    {
        $f = file($this->file);

        $this->title = str_replace('title: ', '', $f[0]);
        $this->link = str_replace(array('link: ', 'http://www.ahmednuaman.com'), '', fgets($f));

        fclose($f);
    }
}

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

function get_latest_blog_entries($num=5)
{
    $count = 0;
    $entries = array();
    $years = scandir(PATH_BLOG, SCANDIR_SORT_DESCENDING);

    while ($num > $count)
    {
        $dir = PATH_BLOG . '/' . array_shift($years);
        $files = scandir($dir);
        $i = 0;

        while ($num > $count)
        {
            $file = $files[$i++];

            if ($file !== '.' && $file !== '..')
            {
                array_push($entries, new BlogEntry($dir . '/' . $file));

                $count++;
            }
        }
    }

    return $entries;
}