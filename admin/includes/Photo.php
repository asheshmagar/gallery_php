<?php


class Photo extends DbObject
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array("title", "description", "filename", "type","size");
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";

}