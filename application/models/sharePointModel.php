<?php
class sharePointModel extends database{
    public function file($id)
    {
        $sql = "SELECT * FROM files WHERE id=$id";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $file = mysqli_fetch_assoc($result);
        return $file;
    }
    public function fileList()
    {
        $sql = "SELECT * FROM files";
        $result = mysqli_query($GLOBALS['db'], $sql);
        $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($files);
        return $files;
    }
    

    public function fileUpload($name,$size)
    {
        $sql = "INSERT INTO files (name, size) VALUES ('$name', $size)";
        return mysqli_query($GLOBALS['db'], $sql);
    }
}
?>