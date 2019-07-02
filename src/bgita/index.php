<?
session_name("yukta_org");
session_start();


if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] =="") $_SESSION['id_src'] = "bhgt";
if ($_GET['Vrsh']) {
  $_SESSION['s_Vrsh'] = $_GET['Vrsh'];
  $Vrsh = $_GET['Vrsh'];
} elseif ($_POST['Vrsh']) {
  $_SESSION['s_Vrsh'] = $_POST['Vrsh'];
  $Vrsh = $_GET['Vrsh'];
} elseif (isset($_SESSION['s_Vrsh'])) {
  $Vrsh = $_SESSION['s_Vrsh'];
} else {
  $Vrsh = '01-01';
  $_SESSION['s_Vrsh'] = $Vrsh;
}

if ($_SESSION['s_lang']) {
 $lang = $_SESSION['s_lang'];
} else {
 $lang='rus';
 $_SESSION['s_lang'] = $lang;
}

?>
<html>
<head>
<title> Meditation about translation Bhagavad Gita  </title>
<meta name="Keywords" CONTENT="Bhagavad Gita, Meditation, Sanscrit, English, Russion, Translation, Бхагавад Гита, медитация, Санскрит, Английский, Русский, Перевод"> 
<meta name="Description" CONTENT="Meditation about translation Bhagavad Gita with use of the Sanscrit-English-Russian dictionary, Размышление над переводом Бхагавад Гиты с использованием санскритско-англо-русского словаря">
</head>
<FRAMESET COLS="15%,85%"  border="0" FRAMEBORDER="1" FRAMESPACING="3" BORDERCOLOR="silver">
  <FRAME SRC="ch_virsh.php" name="left" >
  <FRAMESET ROWS="20%,80%"">
     <FRAME src="v_virsh.php" name="rtop">
     <FRAME SRC="qvirsh.php" name="rbot">
  </FRAMESET>
</FRAMESET>
</html>
