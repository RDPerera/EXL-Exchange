<?php
/*help request handling by moderator model*/
class helpHandleModel extends database
{
    /* fetch all help data where action status is unsolved*/
    public function fetchData()
    {
        $query = "SELECT * FROM help,user WHERE attendstatus LIKE 'Unsolved' AND user.userName=help.userName";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    /*to mark action taken by moderator*/
    public function attend($attndstatus,$ticketId)
    {
        $query="UPDATE help SET  attendstatus='$attndstatus' WHERE ticketId = '$ticketId'";
        mysqli_query($GLOBALS['db'], $query);
    }
}
?>