<?
session_name("yukta_org");
session_start(); 
if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] =="") $_SESSION['id_src'] = "bhgt";
if ($_SESSION['s_lang']) {
 $lang = $_SESSION['s_lang'];
} else {
 $lang='rus';
 $_SESSION['s_lang'] = $lang;
}
require("header.php");

function Send_mail($to,$sbj,$mes,$from)
{
 if (!$from) $from = "none";
// Connect_s ($SERVER,$MAIL);
 $headers  = "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/plain; charset=utf-8\r\n";
 $headers .= "From: $from \r\n";
 mail($to, $sbj, $mes, $headers);
}

?>
<SCRIPT LANGUAGE="JavaScript">
<!--
 function Ch_fmail(Obj) { 
  if (!Obj.name.value) {
   alert ("Введите, пожалуйста, свое имя.");
   return false;
  }
  if (Obj.email.value) {
   re = /.@.{5}/;
   if (!re.test(Obj.email.value)) {
     alert ("Введен некорректный адрес e-mail");
     return false;
   }  
  } else {
   alert ("Введите, пожалуйста, свой e-mail");
   return false;
  }
  if (!Obj.message.value) {
   alert ("Введите, пожалуйста, текст сообщения.");
   return false;
  }


 } 
//-->
</SCRIPT>

<? 
//print_r($_POST);
 $msg = "";
 if ($_POST[B1] == "Отправить" and isset($_POST['email']) 
        and isset($_POST['message'])) {
  list($user, $domain) = split("@", $_POST['email'], 2);
  if (checkdnsrr($domain, "MX")) {
  
   $adminemail = "yukta@yukta.org";
   $sbj = " Сообщение из сайта yukta.org ";
   $msg2 = "   Имя:    ".$_POST['name']."\n
   -----------------------------------\n
   ".$_POST['message'];

//   mail("$adminemail", " Message from  yukta.org ", "$msg2", "From: ".$_POST['email']." \nReply-To: ".$_POST['email']);
   Send_mail($adminemail,$sbj,$msg2,$_POST['email']);
   $msg = "Ваше сообщение отправлено и будет рассмотрено в ближайшее время.";

  } else {
   $msg = "Указанный Вами почтовый сервер $domain не отвечает.";
  } 	
 }  
?>


 <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
  <tr>
  <th class="head">
<? if ($msg=="") {
echo "Вы можете связаться с нами, воспользовавшись этой формой:";
} else {
  echo "<p>$msg</p>";
}
?>
  </th>
  </tr>
  <td class="form">
  
  </td>
  </tr>

 </table>
 <hr size="1" width="70%">



<TABLE cellpadding="0" cellspacing="0" border="0" width ="100%">
    <TR>
    <TD width="15%"></TD>
    <TD width="70%">
     <table cellpadding="3" cellspacing="3" border="0" width ="100%">
      <tr><td class="refer">
      </td></tr>
<?
 if ($msg) {
 } else {
?>

                          <div align="center">
                            <center>
                            <form name="f_cont" method="POST" action="cont.php">
                            <table border="0" width="79%">
                              <tr>
                                <td width="36%"><font color="#333399" size="2" face="verdana">Ваше
                                  имя:</font></td>
                                <td width="64%"><input type="text" name="name" size="30" class="contact"></td>
                              </tr>
                              <tr>
                                <td width="36%"><font color="#333399" size="2" face="verdana">Ваш
                                  E-mail:</font></td>
                                <td width="64%"><input type="text" name="email" size="30" class="contact"></td>
                              </tr>
                              <tr>
                                <td width="36%"><font color="#333399" size="2" face="verdana">Ваше
                                  сообщение:</font></td>
                                <td width="64%"><font color="#333399" size="2" face="verdana"><textarea rows="10" name="message" cols="50" class="contact"></textarea></font></td>
                              </tr>
                              <tr>
                                <td width="100%" colspan="2"></td>
                              </tr>
                              <tr>
                                <td width="100%" colspan="2">
                                  <p align="center"><input type="submit" value="Отправить" name="B1" class="contact" onclick="return Ch_fmail(this.form)">&nbsp;
                                  <input type="reset" value="Очистить" name="B2" class="contact"></p>
                                </td>
                              </tr>
                            </table>
                            </center>
                          </div>
<SCRIPT LANGUAGE="JavaScript">
<!--
document.f_cont.name.focus()
//-->
</SCRIPT>
<?
 }
?>
      
      
      <tr><td class="refer">
        &nbsp      
      </td></tr>
     </table>
    </TD>

    <TD width="15%"></TD>
    </TR>

</TABLE>

<hr>
<?
require "m_menu.php";
?>
<hr>
