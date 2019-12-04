<?php
class VisitorCounter
{
    var $sessionTimeInMin = 5; // time session will live, in minutes
    
  public  function VisitorCounter()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->cleanVisitors();

        if ($this->visitorExists($ip))
        {
            $this->updateVisitor($ip);
        } else
        {
            $this->addVisitor($ip);
        }


    }

   public function visitorExists($ip)
    {
        $sql = "select * from counter where ip = '$ip'";
        $res = mysql_query($sql);
        if (mysql_num_rows($res) > 0)
        {
            return true;
        } else
            if (mysql_num_rows($res) == 0)
            {
                return false;
            }
    }

  private  function cleanVisitors()
    {
        $sessionTime = 30;
        $sql = "select * from counter";
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res))
        {
            if (time() - $row['lastvisit'] >= $this->sessionTimeInMin * 60)
            {
                $dsql = "delete from counter where id = $row[id]";
                mysql_query($dsql);
            }
        }
    }


  private  function updateVisitor($ip)
    {

        $sql = "update counter set lastvisit = '" . time() . "' where ip = '$ip'";
        mysql_query($sql);
    }


  private  function addVisitor($ip)
    {
        $sql = "insert into counter (ip ,lastvisit) value('$ip', '" . time() . "')";
        mysql_query($sql);
    }

  public  function getAmountVisitors()
    {

        $sql = "select count(id) from counter";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        return $row[0];
    }


   public function show()
    {

        echo '<div style="padding:5px; margin:auto; background-color:#fff"><b>' .
            $this->getAmountVisitors() . 'visitors online</b></div>';

    }

}
?>

<?php
 require "dbconn.php"; // db connection
 require "class.visitorcounter.inc.php"; // the counter class itself
 $counter = new VisitorCounter; // make a new counter
//content here
$counter->show(); // show the counter
// and here
?>