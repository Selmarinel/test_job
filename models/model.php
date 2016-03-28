<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once ("{$base_dir}controllers{$ds}data.php");

class model extends data{
    function select($id){
        $base = new data();
        $link = $base->connect();
        $resource = mysql_query('
SELECT payments.intPaymentId,accounts.varName,accounts.varAddress,payments.varSum,payments.varPaymentText
FROM payments,accounts
WHERE accounts.intAccount='.$id.' and
payments.intAccountId=accounts.intAccount;',$link);

        $result_array = array() ;
        while ($row = mysql_fetch_array($resource,MYSQL_ASSOC)){
            $result_array[] =$row;
        }
        mysql_free_result($resource);
        return $result_array;
    }
}

