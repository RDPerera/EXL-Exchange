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
        return $files;
    }
    

    public function fileUpload($name,$size,$jobid)
    {
        echo "<br>".$name.$size.$jobid;
        $sql = "INSERT INTO files (name,size,jobid) VALUES ('$name',$size,$jobid)";
        return mysqli_query($GLOBALS['db'], $sql);
    }
}
?>