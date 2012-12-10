<?php
if (!ENV) { die('*sneaky sneaky*'); }

class BlogEntry
{
    private $props = array();

    private $file;

    var $id;
    var $link;
    var $post;
    var $timestamp;
    var $title;

    public function __construct($file)
    {
        include_once 'markdown.php';

        $this->file = $file;

        $this->read_file();
    }

    private function read_file()
    {
        $f = explode("\n\n", file_get_contents($this->file), 3);

        foreach (explode("\n", trim($f[0])) as $line)
        {
            $prop = explode(': ', $line, 2);

            $this->props[$prop[0]] = $prop[1];
        }

        $this->id = $this->props['post_name'];
        $this->link = str_replace('http://www.ahmednuaman.com', '', $this->props['link']);
        $this->timestamp = strtotime($this->props['post_date_gmt']);
        $this->title = $this->props['title'];

        $this->post = Markdown($f[2]);
    }
}

class WorkEntry
{
    var $link;
    var $thumb;
    var $title;

    public function __construct($title, $link)
    {
        $this->link = $link;
        $this->thumb = PATH_ASSETS . 'img/work/' . str_replace(' ', '_', strtolower($title)) . '.jpg';
        $this->title = $title;
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

function get_latest_blog_entries($num=5, $offset=0)
{
    $count = 0;
    $entries = array();
    $years = scandir(PATH_BLOG, SCANDIR_SORT_DESCENDING);
    $files = array();
    $max = $num * ($offset + 1);

    foreach ($years as $year)
    {
        $dir = PATH_BLOG . '/' . $year;

        foreach (scandir($dir) as $file)
        {
            if ($file !== '.' && $file !== '..' && strpos($file, '.') !== 0)
            {
                $entry = new BlogEntry($dir . '/' . $file);

                $entries[$entry->timestamp] = $entry;
            }
        }

        if (count($entries) >= $max)
        {
            break;
        }
    }

    krsort($entries);

    return array_slice($entries, $offset, $num);
}

function get_work_entries()
{
    $data = json_decode(file_get_contents('work.json'));
    $entries = array();

    foreach ($data as $value)
    {
        array_push($entries, new WorkEntry($value->title, $value->link));
    }

    return $entries;
}