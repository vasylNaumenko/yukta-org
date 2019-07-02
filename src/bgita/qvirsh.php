<?
session_name("yukta_org");
session_start();
//print_r($_POST);
//echo "<br>\n";
//print_r($_GET);
require("../bhgit.php");
$pdo = Connect();

require("../lib.php");

if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";
if ($_GETS['id_src']) {
    $_SESSION['id_src'] = $_GET['id_src'];
    $Qstr = "SELECT min(it.vcod) FROM it WHERE id_src=?";
    $stmt = $pdo->prepare($Qstr);
    $stmt->execute([$_SESSION['id_src']]);
    $row = $stmt->fetch();
    $Vrsh = $row[0];
    $_SESSION['s_Vrsh'] = $Vrsh;
}
if ($_GET['Vrsh']) {
    $_SESSION['s_Vrsh'] = $_GET['Vrsh'];
    $Vrsh = $_GET['Vrsh'];
} elseif ($_POST['Vrsh']) {
    $_SESSION['s_Vrsh'] = $_POST_['Vrsh'];
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
    $lang = 'rus';
    $_SESSION['s_lang'] = $lang;
}
if ($_POST['RegDispl_lang']) $_SESSION['RegDispl_lang'] = $_POST['RegDispl_lang'];
if (!isset($_SESSION['RegDispl_lang'])) $_SESSION['RegDispl_lang'] = "rus";

if ($_POST['RegDispl_style']) $_SESSION['RegDispl_style'] = $_POST['RegDispl_style'];
if (!isset($_SESSION['RegDispl_style'])) $_SESSION['RegDispl_style'] = "mono";

if ($_POST['RegDispl_items']) $_SESSION['RegDispl_items'] = $_POST['RegDispl_items'];
if (!isset($_SESSION['RegDispl_items'])) $_SESSION['RegDispl_items'] = "full";

?>
<html>
<head>
    <title> Русско-английский словарь</title>

    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cashe">
    <meta HTTP-EQUIV="Cashe-Control" CONTENT="no-cashe">

    <SCRIPT language="JavaScript1.2" SRC="style.js">
    </SCRIPT>


<body bgcolor="#e5f7f3" topmargin="1" leftmargin="0" marginheight="0" marginwidth="0">

<?

if ($Vrsh == "") {
    $Vrsh = '02-11';
}

//$LstSans_q = mysql_fetch_row(mysql_query("select it.lstsans from it WHERE trim(it.vcod)='$Vrsh' and id_src='$_SESSION['id_src']'")) or mysql_die() ;

$LstSans_q = "select it.lstsans from it WHERE trim(it.vcod)=? and id_src=?";
$stmt = $pdo->prepare($LstSans_q);
$stmt->execute([$Vrsh, $_SESSION['id_src']]);
$res = $stmt->fetch();
$LstSans_Ar = explode(";", $res[0]);

// Определение формата вывода - колич. колонок и их ширина

switch ($ShowLex & 14) {
    case 2:
        $Width_eng = "100%";
        break;
    case 4:
        $Width_rus = "100%";
        break;
    case 6:
        $Width_eng = "40%";
        $Width_rus = "60%";
        break;
    case 12:
        $Width_src = "20%";
        $Width_rus = "80%";
        break;
    case 14:
        $Width_eng = "30%";
        $Width_rus = "55%";
        $Width_src = "15%";
        break;
}

$script_edit = addslashes("http://" . $_SERVER["SERVER_NAME"] . str_replace("qvirsh", "edit",$_SERVER['SCRIPT_NAME']));
//$script_edit = addslashes($_SERVER["CHARSET_HTTP_METHOD"].$_SERVER["CHARSET_SERVER_NAME"].preg_replace("qvirsh","edit",$_SERVER['SCRIPT_NAME']));
//$script_edit = addslashes($_SERVER["CHARSET_HTTP_METHOD"].$_SERVER["CHARSET_SERVER_NAME"].$_SERVER['SCRIPT_NAME']);
$Hash = 0;
foreach ($LstSans_Ar as $ks=> $vs) {// Цикл по санскр. знач.
    if ($vs) {
        $Hash++;

        if ($_SESSION['RegDispl_style'] == "mono") {

            print_mono($vs, "wndEdit", "$script_edit", $Hash, 0);

        } else {
            print_list($vs, "wndEdit", "$script_edit", $Hash, 0);

        } // if ($_SESSION['RegDispl_style'] = "mono")
    } // if ($vs)
} // while (list($ks, $vs)
// } // if ($MW_q[2])
?>


</body>
</html>
