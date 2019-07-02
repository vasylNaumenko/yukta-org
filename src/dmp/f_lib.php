<?
// ------------------------------------
function f_set_fltr($lim,$DB) {
//  Значения для отладки
//-------------------
 $StrWhere = "";
 $StrOrderBy = "ORDER BY sans";
 if (!$lim) $lim = 200;
//-------------------
  $Qstr = "DROP TABLE IF EXISTS t_fltr"; 
  mysql("$DB",$Qstr) or mysql_die();
//  echo "Test from f_set_fltr()";
//  $Qstr = "CREATE TABLE t_fltr ( num int(11) DEFAULT '0' NOT NULL auto_increment,lst_scod text, UNIQUE num (num))";
  $Qstr = "CREATE TABLE t_fltr ( num int(11) NOT NULL auto_increment,lst_scod text, UNIQUE num (num))";
  mysql("$DB",$Qstr) or mysql_die();

  $Qstr = "SELECT mw.scod, mw.sans FROM mw $StrOrderBy";
  $result=mysql_query($Qstr) or mysql_die();
 
 $num_rows = mysql_num_rows($result); 
 if ($num_rows>0) {
  $i=0;

  while  ($row  =  mysql_fetch_row($result))  {
    $Ar_full[] = $row[0];
  } //  while  ($row  =  mysql_fetch_row($result))

  mysql_free_result($result);

  $Ar_chunk = array_chunk($Ar_full,$lim);  // порезать массив на куски $lim
//  
  while (list($k, $v) = each ($Ar_chunk)) {
   $Bv = implode(",",$v);
   $Qstr = "INSERT INTO t_fltr (lst_scod) VALUES ('$Bv')";
   mysql("$DB",$Qstr) or mysql_die();
  }   //   while (list($k, $v) = each ($Ar_chunk))
 }  //   if ($num_rows>0)
} // function f_set_fltr($lim,$DB)


?>