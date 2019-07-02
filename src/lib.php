<?
function StrRepl($bstr)
{
          $bb = str_replace(":",":<br>",$bstr);
//          $bb = str_replace("(","(<small>",$bb);
//          $bb = str_replace(")","</small>)",$bb);
          $bb = str_replace("(","(<font color='black'>",$bb);
          $bb = str_replace(")","</font>)",$bb);
          $bb = preg_replace("/(\D\B)\d/","\\1",$bb);  // Вырезание цифр из санскр
          $bb = preg_replace("/(%\{)|(\{)/","<b><font color='black'>",$bb);
          $bb = preg_replace("/(\})/","</font></b>",$bb);
          $bb = preg_replace("/@/"," ",$bb);
          $bb = preg_replace("/(\bIndic\.)|(\bCond\.)|(\bPass\.)|(\bCaus\.)|(\bDesid\.)|(\bIntens\.)|(\bSubj\.)|(\bImpv\.)|(\bPot\.)/","<font color='brown'><b>\\0</b></font>",$bb);
          $bb = preg_replace("/(\bpres\.)|(\bFut\.)|(\bPres\.)|(\bperf\.)|(\bpf\.)|(\baor\.)|(\bPrec\.)|(\bfut\.)|(\binf\.)|(\bind\.)|(\bp\.)|(\bimpf\.)|(\bpr\.)/","<font color='brown'><b>\\0</b></font>",$bb);
          $bb = preg_replace("/(\bcl\.\s*)(\d\.?)/","<font color='red'><b>cl.\\2</b></font>",$bb);
          $bb = preg_replace("/\bA\./","<font color='blue'><b> A. </b></font>",$bb);
          $bb = preg_replace("/\bP\./","<font color='blue'><b> P. </b></font>",$bb);
          $bb = preg_replace("/(\bmfn\.)|(\bmf\.)|(\bn\.)|(\bfn\.)|(\bm\.)|(\bf\.)|(\bmn\.)/","<font color='red'><b> \\0 </b></font>",$bb);
          $bb = preg_replace("/(\bm?f)(\()/","<font color='red'><b> \\1 </b></font>(",$bb);
          $bb = preg_replace("/(\bI\.)|(\bII\.)|(\bIII\.)|(\bIV\.)|(\bV\.)|(\bVI\.)|(\bVII\.)/","<font color='red'><b> \\0 </b></font>",$bb);
          $bb = preg_replace("/(\bsg\.)|(\bdu\.)|(\bpl\.)/","<font color='magenta'> \\0 </font>",$bb);


 return ($bb);
}

?>
<SCRIPT LANGUAGE="JavaScript">
<!--

function OpenEdit(trget, script, Obj, regim, cod, scod) {
//   regim 6 - gr_rus, 8 - gr_en, 9 - er_en, 10 - er_rus, 11 - er_src
 editWindow=window.open("",trget,"resizable=yes,status=yes,scrollbars=yes,width=700,height=400") 
 editWindow.document.close()
 var rows=15
 var cols=80

editWindow.document.write("<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0//EN'>")
editWindow.document.write("<HTML>")
editWindow.document.write("<HEAD>")
editWindow.document.write("<META HTTP-EQUIV='CONTENT-TYPE' CONTENT='text/html; charset=utf-8'>")
editWindow.document.write("<TITLE>Корректировка ошибок</TITLE>")
editWindow.document.write("<STYLE type='text/css'>")
var scr_w = screen.width;
if (!scr_w) {
 scr_w = 1280;
}

switch (scr_w){

 case 640,800 :
  rows=12
  cols=70
  editWindow.document.write("body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; background-color: #e5f7f3}\n")
  editWindow.document.write(".maker  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 9pt; text-align: left;padding-left: 5; background-color: #A4FFE9; color: #010483}\n")
  editWindow.document.write("form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 10pt;font-weight: bold; text-align: center; background-color: #e5f7f3}\n")

 case 1024 :
  rows=15
  cols=75
  editWindow.document.write("body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; background-color: #e5f7f3}\n")
  editWindow.document.write(".maker  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 11pt; text-align: left;padding-left: 5; background-color: #A4FFE9; color: #010483}\n")
  editWindow.document.write("form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 13pt;font-weight: bold; text-align: center; background-color: #e5f7f3}\n")

 default :
  rows=12
  cols=80
  editWindow.document.write("body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; background-color: #e5f7f3}\n")
  editWindow.document.write(".maker  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 14pt; text-align: left;padding-left: 5; background-color: #A4FFE9; color: #010483}\n")
  editWindow.document.write(".form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 15pt;font-weight: bold; text-align: center; background-color: #e5f7f3}\n")
}
editWindow.document.write("</STYLE>")
editWindow.document.write("</HEAD>")
editWindow.document.write("<BODY>")
editWindow.document.write("<TABLE BORDER='0' CELLPADDING='1' CELLSPACING='0' WIDTH=100% ><TR>")
editWindow.document.write("<form name='f_edit_err' ACCEPT-CHARSET='utf-8' action='"+script+"' method='POST' ENCTYPE='x-www-form-urlencoded'>")
editWindow.document.write("<input type='hidden' name='regim' value='"+regim+"'>")
editWindow.document.write("<input type='hidden' name='cod' value='"+cod+"'>")
editWindow.document.write("<input type='hidden' name='scod' value='"+scod+"'>")
editWindow.document.write("<input type='hidden' name='rem-ip' value='<? echo $_SERVER["REMOTE_ADDR"];?>'>")
editWindow.document.write("<tr>")
editWindow.document.write("<td WIDTH=10% COLSPAN=3 class='form'>")

editWindow.document.write("Корректировка ошибок</td>")
editWindow.document.write("</tr>")
editWindow.document.write("<tr>")
editWindow.document.write("<td WIDTH=10%  class='maker_srch'>")
editWindow.document.write("</td>")
editWindow.document.write("<td WIDTH=80%  class='maker_srch'>")
editWindow.document.write("<TEXTAREA class='maker' name='fedit' ROWS='"+rows+"' COLS='"+cols+"'>"+Obj+"</TEXTAREA>")
editWindow.document.write("</td>")
editWindow.document.write("<td WIDTH=10%  class='maker_srch'>")
editWindow.document.write("</td>")
editWindow.document.write("</tr>")
editWindow.document.write("</TABLE>")
editWindow.document.write("<hr>")
editWindow.document.write("<TABLE BORDER='0' CELLPADDING='1' CELLSPACING='0' WIDTH=100% >")
editWindow.document.write("<tr>")
editWindow.document.write("<td WIDTH=25%  class='maker_srch'>")
editWindow.document.write("</td>")
editWindow.document.write("<td WIDTH=20%  class='maker_srch'>")
editWindow.document.write("<button name='Edit_mist' type='submit' ACCESSKEY=O value='Сохранить'>Сохранить </button>")
editWindow.document.write("</td>")
editWindow.document.write("</form>")
editWindow.document.write("<td WIDTH=10%  class='maker_srch'>")
editWindow.document.write("</td>")
editWindow.document.write("<form class='srch' name = 'f_Back' action='$fname' method='POST' ENCTYPE='x-www-form-urlencoded'>")
editWindow.document.write("<input type='hidden' name='Hash_er' value='$Hash_er'>")
editWindow.document.write("<td WIDTH=20% class='maker_srch'>")
editWindow.document.write("<button name='submit' type='submit' onclick='window.close()' value='Отмена'> Отмена</button>")
editWindow.document.write("</td>")
editWindow.document.write("</form>")
editWindow.document.write("<td WIDTH=25%  class='maker_srch'>")
editWindow.document.write("</td>")
editWindow.document.write("</tr>\n")
editWindow.document.write("</TABLE>")

editWindow.document.write("<SCRIPT LANGUAGE='JavaScript'>")
editWindow.document.write("document.f_edit_err.fedit.focus()")
editWindow.document.write("</SCRIPT>")

editWindow.document.write("</BODY>")
editWindow.document.write("</HTML>")
}

//-->
</SCRIPT>

<?


// Для интерактивного перевода моно вывод отличается - не нужно
// подсвечивать русские и англ. значения из поиска
function print_mono($s_id, $s_targ, $s_phpscr, $Hash, $Show_Srch) 
{
global $pdo;

$pat = "/^(-|\(| \()/";
$pat1 = "/^(\|)/";

$Qstr = "SELECT mw.lst_gr, mw.sans FROM mw WHERE scod='$s_id'";
$rows = $pdo->query($Qstr)->fetchAll();

if (count($rows)>0) {

    $MW_q = $rows[0];
    $Ar_gr = explode(";", $MW_q[0]);

if ($Ar_gr[0]>" " and count($Ar_gr)>0) { // Не пусто ли?
 $cnt_gr = 0;
 $cnt_er = 0;
 $Str_prnt = "";
 $ColSpan_h = ($_SESSION['RegDispl_lang'] == "all")?2:1;
// $_SESSION['RegDispl_items']
 $Show_src = 1;
 $Show_gr = 1;

switch ($_SESSION['RegDispl_items']) {
    case "no_gr":
        $Show_gr = 0;
        break;
    case "no_src":
        $Show_src = 0;
        break;
    case "no_src_gr":
        $Show_src = 0;
        $Show_gr = 0;
        break;
}

if ($Show_Srch) {
  // Восстановл первонач списка _всех_ англ значений по условию поиска
  // передается из f_getskr для подсветки искомых англ и русс слов 
  $ERlight_ar = explode(";", $_SESSION['s_EngArrStr']);
}

 echo "<TABLE BORDER='1' CELLPADDING='5' CELLSPACING='0' WIDTH=100%>";
 echo "<tr><th COLSPAN=$ColSpan_h class='form'>";
 echo ("<A name='$Hash'><B><big>$MW_q[1]</big></B></A>"); 
 echo "</th></tr>";
 echo "<tr>";

// англ. значение
 if ($_SESSION['RegDispl_lang'] == "eng" or $_SESSION['RegDispl_lang'] == "all") {
 echo "<td class='mono' width='45%'>";
 foreach ($Ar_gr as $kgr => $vgr)
  if ($vgr) {

   $rgr_vgr = $pdo->query("select gr.lst_er, gr.gr_e from gr WHERE gr.gr_ind='$vgr'");
 if ($rgr_vgr) {
   $cnt_gr++;
   $rgr = $rgr_vgr->fetch();
   if ($Show_gr) {
    if (preg_match($pat,$rgr[1])==0) {  
      echo ($cnt_gr == 1)?" ":"<br>";
    } 
//    echo "<a class='mono' target='$s_targ' href='$s_phpscr?gr_edit=1&gr_ind=$vgr&Hash=$Hash'>".StrRepl($rgr[1])."</a>";
//     $Bstr = $s_phpscr."?gr_edit=1&gr_ind=$vgr&Hash=$Hash";
?>
       <a class="mono"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($rgr[1]);?>', '8', '<? echo $vgr;?>', '<? echo $s_id;?>')"> <? echo StrRepl($rgr[1])." ";?>
<?

   }
    $Ar_er = explode(";", $rgr[0]);
  if (count($Ar_er)>0 and $rgr[0]>" ") 
    foreach ($Ar_er as $ker => $ver)
     if ($ver) {   
      $res1 = $pdo->query("select er.eng from er WHERE er.ecod='$ver'");
      if ($res1) {
       $rer = $res1->fetch();
       $cnt_er++;
       if ($rer[0]) {  
        echo (preg_match($pat1,$rer[0]) or ($cnt_er == 1 and !$Show_gr))?" ":" | ";
        if ($Show_Srch and $ERlight_ar and in_array($ver,$ERlight_ar)) {
         $class="b_light";
        } else {
         $class="mono";
        }
//        echo "<a class='$class' target='$s_targ' href='$s_phpscr?er_edit=1&gr_ind=$vgr&ecod=$ver&Hash=$Hash'>".StrRepl($rer[0])."</a>";
     $Bstr = $s_phpscr."?er_edit=1&gr_ind=$vgr&ecod=$ver&Hash=$Hash";
?>
       <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($rer[0]);?>', '9', '<? echo $ver;?>', '<? echo $s_id;?>')"> <? echo StrRepl($rer[0])." ";?></a>
<?

       }  // if ($rer[0])
      }  // if ($res1) 
     }  // while (list($ker, $ver) = each ($Ar_er)) if ($ver)
   }  // if ($res_vgr) 
  } // if (count($Ar_gr)) while (list($kgr, $vgr) = each ($Ar_gr)) if ($vgr)
  echo "</td>";
 }
// русское значение
 if ($_SESSION['RegDispl_lang'] == "rus" or $_SESSION['RegDispl_lang'] == "all") {
 $cnt_gr = 0;
 $cnt_er = 0;
 reset($Ar_gr);
 echo "<td class='mono' width='55%'>";
  foreach ($Ar_gr as $kgr => $vgr)
  if ($vgr) {   
   $res_vgr = $pdo->query("select gr.lst_er, gr.gr from gr WHERE gr.gr_ind='$vgr'");
 if ($res_vgr) {
   $cnt_gr++;
   $rgr = $res_vgr->fetch();
   if ($Show_gr) {
    if (preg_match($pat,$rgr[1])==0) {  
      echo ($cnt_gr == 1)?" ":"<br>";
    } 
//    echo "<a class='mono' target='$s_targ' href='$s_phpscr?gr_edit=1&gr_ind=$vgr&Hash=$Hash'>".StrRepl($rgr[1])."</a>";
     $Bstr = $s_phpscr."?gr_edit=1&gr_ind=$vgr&Hash=$Hash";
?>
       <a class="mono"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($rgr[1]);?>', '6', '<? echo $vgr;?>', '<? echo $s_id;?>')"> <? echo StrRepl($rgr[1])." ";?>
<?
   }
   $Ar_er = explode(";", $rgr[0]);
  if (count($Ar_er)>0 and $rgr[0]>" ") 
    foreach ($Ar_er as $ker => $ver)
     if ($ver) {   
      $res1 = $pdo->query("select er.rus, er.src from er WHERE er.ecod='$ver'");
      if ($res1) {
       $cnt_er++;
       $rer = $res1->fetch();
       if ($rer[0]) {  
        echo (preg_match($pat1,$rer[0]) or ($cnt_er == 1 and !$Show_gr))?" ":" | ";
        if ($Show_Srch and $ERlight_ar and in_array($ver,$ERlight_ar)) {
         $class="b_light";
        } else {
         $class="mono";
        }
// href="javascript:OpenIntr()"
//        echo "<a class='$class' target='$s_targ' href='$s_phpscr?er_edit=1&gr_ind=$vgr&ecod=$ver&Hash=$Hash'>".StrRepl($rer[0])." ";
     $Bstr = $s_phpscr."?er_edit=1&gr_ind=$vgr&ecod=$ver&Hash=$Hash";
?>
       <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($rer[0]);?>', '10', '<? echo $ver;?>', '<? echo $s_id;?>')"> <? echo StrRepl($rer[0])." ";?></a>
<?
       if ($Show_src) {
?>
        <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($rer[1]);?>', '11', '<? echo $ver;?>', '<? echo $s_id;?>')"> <? echo StrRepl($rer[1])." ";?></a>
<?
       }
       }  // if ($rer[0])
      }  // if ($res1) 
     }  // while (list($ker, $ver) = each ($Ar_er)) if ($ver)
   }  // if ($res_vgr) 
  } // if (count($Ar_gr)) while (list($kgr, $vgr) = each ($Ar_gr)) if ($vgr)
  echo "</td>";
 }

 echo "</tr>";
 echo "</TABLE>";
 }  // if ($Ar_gr[0]>" ")
}  // if (mysql_num_rows($res)>0)

} // function print_mono_it()

// Функция вывода в табличном режиме для интерактивного перевода
function print_list ($vs, $s_targ, $s_phpscr, $Hash, $Show_Srch) {
global $pdo;
$pat = "/^(-|\(| \()/";
$pat1 = "/^(\|)/";

$Qstr = "SELECT mw.scod, mw.sans, mw.lst_gr FROM mw WHERE mw.scod='$vs'";
$MW_q = $pdo->query($Qstr)->fetch();

if ($MW_q[2] and $MW_q[2] > "") {

$Ar_gr = explode(";", $MW_q[2]);
if ($Ar_gr[0]>" " and count($Ar_gr)>0) { // Не пусто ли?

 $cnt_gr = 0;
 $cnt_er = 0;
 $Str_prnt = "";
 $ColSpan_h = ($_SESSION['RegDispl_lang'] == "all")?2:1;
 $Show_src = 1;
 $Show_gr = 1;
switch ($_SESSION['RegDispl_items']) {
    case "no_gr":
        $Show_gr = 0;
        break;
    case "no_src":
        $Show_src = 0;
        break;
    case "no_src_gr":
        $Show_src = 0;
        $Show_gr = 0;
        break;
}

if ($Show_Srch) {
  // Восстановл первонач списка _всех_ англ значений по условию поиска
  // передается из f_getskr для подсветки искомых англ и русс слов 
  $ERlight_ar = explode(";", $_SESSION['s_EngArrStr']);
}

echo "<TABLE BORDER='1' CELLPADDING='5' CELLSPACING='0' WIDTH=100%>";

        echo "<tr><th COLSPAN=$ColSpan_h class='form'>";
        echo ("<A name='$Hash'><big><B>$MW_q[1]</B></big></A>"); 
        echo "</th></tr>";

    foreach ($Ar_gr as $kg => $vg){
if ($vg and $vg>" ") {

$Qstr = "SELECT * FROM gr WHERE gr.gr_ind=$vg";
$row1  =  $pdo->query($Qstr)->fetch();
$Ar_er = explode(";", $row1[3]);


 if ($Show_gr) {
   echo "<tr>";
   if ($_SESSION['RegDispl_lang'] == "eng" or $_SESSION['RegDispl_lang'] == "all") {
     echo "<td class='h_gr' width='45%'>";
//     echo "<a class='mono' target='$s_targ' href='$s_phpscr?gr_edit=1&gr_ind=$vg&Hash=$Hash'>".StrRepl($row1[4])."</a>";
//     $Bstr = $s_phpscr."?gr_edit=1&gr_ind=$vg&Hash=$Hash";
?>
       <a class="mono"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($row1[4]);?>', '8', '<? echo $vg;?>', '<? echo $vs;?>')"> <? echo StrRepl($row1[4])." ";?>
<?
     echo "</td>";
   } 

   if ($_SESSION['RegDispl_lang'] == "rus" or $_SESSION['RegDispl_lang'] == "all") {
     echo "<td class='h_gr' width='55%'>";
//     echo StrRepl($row1[1]);
//     echo "<a class='mono' target='$s_targ' href='$s_phpscr?gr_edit=1&gr_ind=$vg&Hash=$Hash'>".StrRepl($row1[1])."</a>";
     $Bstr = $s_phpscr."?gr_edit=1&gr_ind=$vg&Hash=$Hash";
?>
       <a class="mono"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($row1[1]);?>', '6', '<? echo $vg;?>', '<? echo $vs;?>')"> <? echo StrRepl($row1[1])." ";?>
<?
     echo "</td>";
   }
   echo "</tr>";
 }

$light = true;
      foreach ($Ar_er as $ke => $ve){
  if ($ve) {   
   $row1 = $pdo->query("select er.eng, er.rus, er.src from er WHERE er.ecod='$ve'")->fetch();

   echo  "<tr>";
   if ($Show_Srch and $ERlight_ar and in_array($ve,$ERlight_ar)) {
     $class="b_light";
   } else if ($light) {
     $class = "b_l_left"; 
   } else {
     $class = "b_d_left"; 
   }

   if ($_SESSION['RegDispl_lang'] == "eng" or $_SESSION['RegDispl_lang'] == "all") {
     echo  "<td WIDTH='45%' class='$class'>";
//     echo "<a class='$class' target='$s_targ' href='$s_phpscr?er_edit=1&gr_ind=$vg&ecod=$ve&Hash_er=$Hash_er'>".StrRepl($row1[0])."</a>";
     $Bstr = $s_phpscr."?er_edit=1&gr_ind=$vg&ecod=$ve&Hash=$Hash";
?>
       <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($row1[0]);?>', '9', '<? echo $ve;?>', '<? echo $vs;?>')"> <? echo StrRepl($row1[0])." ";?>
<?
     echo  "</td>";
   }
   if ($_SESSION['RegDispl_lang'] == "rus" or $_SESSION['RegDispl_lang'] == "all") {
     echo "<td class='$class' width='55%'>";
//     echo "<a class='$class' target='$s_targ' href='$s_phpscr?er_edit=1&gr_ind=$vg&ecod=$ve&Hash_er=$Hash_er'>";
//    .StrRepl($row1[0]).
     $Bstr = $s_phpscr."?er_edit=1&gr_ind=$vg&ecod=$ve&Hash=$Hash";
?>
       <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($row1[1]);?>', '10', '<? echo $ve;?>', '<? echo $vs;?>')"> 
<?
     echo  StrRepl($row1[1])."  </a>";
     if ($Show_src and $row1[2] and $row1[2]>" ") {
?>
       <a class="<? echo $class;?>"  href="javascript: OpenEdit('<? echo $s_targ;?>', '<? echo $s_phpscr;?>', '<? echo addslashes($row1[2]);?>', '11', '<? echo $ve;?>', '<? echo $vs;?>')"> 
<?

     }
     echo StrRepl($row1[2])." </a>";
     echo "</td>";
   }
   $light = ! $light;
   
    } // if ($ve)
   } // while (list($ke, $ve)
  }   // if ($vg and $vg>" ")
 }   // while (list($kg, $vg) = each ($Ar_gr))
echo "</TABLE>";
} // if ($Ar_gr[0]>" " and count($Ar_gr)>0)
} // if ($MW_q[2] and $MW_q[2] > "")

}

function f_set_patern_stat($ptrn) {
global $pdo;

$Qstr = "SELECT cnt FROM patern_stat WHERE patern='".trim($ptrn)."'";
$row  =  $pdo->query($Qstr)->fetch();

 if (isset($row[0])) {
   $Qstr = "UPDATE patern_stat set cnt='".($row[0]+1)."' WHERE patern='".trim($ptrn)."'";
   $pdo->exec($Qstr);
 } else {

   $Qstr = "INSERT INTO patern_stat (patern,cnt) VALUES ('".trim($ptrn)."', 1)";

   $pdo->exec($Qstr);
 }
}

?>