<?

//session_name("yukta_org");
//session_set_cookie_params(60 * 60 * 24 * 10);
//session_start();

if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";


?>
<?
//header("Content-Type: text/html; charset=utf-8");
?>

<SCRIPT LANGUAGE="JavaScript">
    <!--

    function OpenIntr() {
        msgWindow = window.open("bgita/index.php", "msg", "width=640,height=480,resizable=yes,status=yes")
    }

    //-->
</SCRIPT>

<?

if ($_POST['lang']) {

    $_SESSION['s_lang'] = $_POST['lang'];
    $lang = $_POST['lang'];
//    var_dump($_SESSION['s_lang']);
} elseif (isset($_SESSION['s_lang'])) {
    $lang = $_SESSION['s_lang'];
} else {
    $lang = 'rus';
    $_SESSION['s_lang'] = $lang;
//    var_dump($_SESSION['s_lang']);
}

require("header.php");

?>
<?
require("bgita/p/bhgit.php");
$pdo = Connect();

$Qstr = "select param.date_refresh from param where param.kod=1 limit 1";
$row = $pdo->query($Qstr)->fetch();

$CDate = substr($row[0], 8, 2) . "/" . substr($row[0], 5, 2) . "/" . substr($row[0], 0, 4);
echo "<br>";

$Qstr = "select count(*) from mw";
$row = $pdo->query($Qstr)->fetch();

$Qstr = "select count(*) from er";
$row1 = $pdo->query($Qstr)->fetch();

$Qstr = "select count(*) from gr_tables";
$row2 = $pdo->query($Qstr)->fetch();

?>

<table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
    <tr>
        <TD width="15%"></TD>
        <th class="head" width="70%">
            <? echo $str_home_header; ?>
        </th>
        <TD width="15%" class="home_right">
            Версия<br>off-line 2.1
        </TD>

    </tr>
    <TD width="15"></TD>

    <td class="form">
        <? echo $s_h_h; ?>
    </td>
    <TD width="15"></TD>
    </tr>

</table>
<hr size="1" width="75%">


<TABLE cellpadding="0" cellspacing="0" border="0" width="100%">
    <TR>
        <TD class="form" width="15%">
        </TD>
        <TD class="body" width="70%">
            В настоящее время база сайта содержит лексику Бхагавад Гиты, "Йога сутры" Патанджали, Аштавакры, Ишопанишад
            и др. работ.<br>
            Ведется также разработка санскритских значений 'по алфавиту'.
        </TD>
        <TD width="15%" class="home_right">
        </TD>
    </TR>
    <TR>
        <TD class="form" width="15%">
        </TD>
        <TD class="body" width="70%">
            <br>

            <a class="skrlnk" href="srch_skr.php"><? echo $s_h_1; ?></a>
            <UL>
                <LI><? echo $s_h_1_1; ?>
                <LI><? echo $s_h_1_2; ?>
                <LI><? echo $s_h_1_3; ?>
                <LI><? echo $s_h_1_4_1; ?><? echo " {$row[0]} " ?><? echo $s_h_1_4_2; ?><? echo " {$row1[0]} " ?><? echo $s_h_1_4_3; ?>
            </UL>
            <p>
                <A class="skrlnk" href="gramm.php"> <? echo $s_h_2; ?>  </A>
            <UL>
                <? echo $s_h_2_h; ?> <? echo " {$row2[0]} " ?> <? echo $s_h_2_h_; ?>
                <? echo $s_h_2_1; ?>
                <A class="skrlnk" href="v_transl.php"><? echo $s_h_3; ?></A>
                <? echo $s_h_3_1; ?>
                <A class="skrlnk" href="javascript:OpenIntr()"><? echo $s_h_4; ?></A>
                <? echo $s_h_4_1; ?>
                <? echo $s_h_5; ?>
                <a class="menu" href="mailto:yukta@yukta.org">пишите</a>
        </TD>
        <TD width="15%" class="home_right">
        </TD>
    </TR>
    <tr>
        <TD width="15%" class="home_right">
        </TD>

        <TD width="70%" class="home_right">
        </TD>

        <TD width="15%" class="form">
            <? echo $s_upd . ' ' . $CDate; ?>
        </TD>
    </tr>

</TABLE>

<?
require("footer.php");

?>
