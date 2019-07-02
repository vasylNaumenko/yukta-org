<?
session_name("yukta_org");
session_start();

require("../bhgit.php");
$pdo = Connect();

if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";
if ($_GET['id_src']) {
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
    $lang = 'rus';
    $_SESSION['s_lang'] = $lang;
}

?>
<HTML>
<HEAD>
    <TITLE>Change</TITLE>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cashe">
    <meta HTTP-EQUIV="Cashe-Control" CONTENT="no-cashe">

    <SCRIPT language="JavaScript1.2" SRC="style.js">
    </SCRIPT>


    <SCRIPT LANGUAGE="JavaScript">
        <!--

        function LnkRbotHash(Num) {
            parent.rbot.location.hash = Num
        }

        function OpenIPer(VObj) {
            var i
            var bstr

            i = VObj.selectedIndex
            bstr = VObj.options[i].text
            msgWindow = window.open("index.php?Vrsh=" + bstr, "msg", "width=640,height=480,resizable=yes,status=yes")
        }

        function Refresh_id_src(VObj) {

            var sleft = "ch_virsh.php?id_src="
            var srtop = "v_virsh.php?id_src="
            var srbot = "qvirsh.php?id_src="

            var i

//   i=VObj.selectedIndex + 1
            i = VObj.selectedIndex
            i = VObj.options[i].value

            parent.left.location = sleft.concat(i)
            parent.rtop.location = srtop.concat(i)
            parent.rbot.location = srbot.concat(i)

        }

        function Refresh_Frames(VObj) {

            var sleft = "ch_virsh.php?Vrsh="
            var srtop = "v_virsh.php?Vrsh="
            var srbot = "qvirsh.php?Vrsh="
//var i
//var bstr

            var i = VObj.selectedIndex
            var bstr = VObj.options[i].value

            parent.left.location = sleft.concat(bstr)
            parent.rtop.location = srtop.concat(bstr)
            parent.rbot.location = srbot.concat(bstr)

        }

        function Refresh_Chapt(VObj) {

            var sleft = "ch_virsh.php?Vrsh="
            var srtop = "v_virsh.php?Vrsh="
            var srbot = "qvirsh.php?Vrsh="
//var i
//var bstr

            var i = VObj.selectedIndex
            var bstr = VObj.options[i].text + "-01"

            parent.left.location = sleft.concat(bstr)
            parent.rtop.location = srtop.concat(bstr)
            parent.rbot.location = srbot.concat(bstr)

        }


        // -->
    </SCRIPT>


</HEAD>
<!--
<body bgcolor="#e5f7f3">
-->

<body class="skrlnk">

<TABLE WIDTH=100% height=1 BORDER=0 CELLPADDING=0 CELLSPACING=0>
    <TR>
        <TD>
            <!--Rating@Mail.ru COUNTER-->
            <script language="JavaScript">
                <!--
                d = document;
                a = '';
                a += ';r=' + escape(d.referrer)
                js = 10//-->
            </script>
            <script language="JavaScript1.1">
<!--
a+=';j='+navigator.javaEnabled()
js=11//-->







            </script>
            <script language="JavaScript1.2">
                <!--
                s = screen;
                a += ';s=' + s.width + '*' + s.height
                a += ';d=' + (s.colorDepth ? s.colorDepth : s.pixelDepth)
                js = 12//-->
            </script>
            <script language="JavaScript1.3">
<!--
js=13//-->







            </script>
            <script language="JavaScript">
                <!--
                d.write('<img src="http://top.list.ru/counter' +
                    '?id=291242;js=' + js + a + ';rand=' + Math.random() +
                    '" height=1 width=1>')
                if (js > 11) d.write('<' + '!-- ')//-->
            </script>
            <noscript>
                <img src="http://top.list.ru/counter?js=na;id=291242" height=1 width=1 alt="">
            </noscript>
            <script language="JavaScript">
                <!--
                if (js > 11) d.write('--' + '>')//-->
            </script><!--/COUNTER-->
        </TD>
    </TR>
</TABLE>


<?
echo "<TABLE cellpadding='0' cellspacing='0' border='0' width='100%' >";
echo "<tr>";
echo "<form action='<?echo $php_self;?>' method='POST' ENCTYPE='x-www-form-urlencoded'>";

$Lst_src = "select * from scripts order by scripts.id_src";
$stmt = $pdo->query($Lst_src);
?>
<td class="skrlnk">
    <select name="id_src" size="1" bgcolor="#e5f7f3" onChange="Refresh_id_src(this)">

        <?
        while ($row1 = $stmt->fetch(PDO::FETCH_LAZY)) {
            $Bstr = trim($row1[1]);
            if ($_SESSION['id_src'] == $row1[0]) {
                echo "<option selected value='$row1[0]'>$Bstr";
            } else {
                echo "<option value='$row1[0]'>$Bstr";
            }
        }
        echo "</select>";

        echo "</td>";
        echo "</form>";
        echo "</tr>";
        echo "</TABLES>";

        if ($lang == 'rus') {
            require "../lang/rus1.php";
        } else {
            require "../lang/engl.php";
        }

        $Glava = substr(trim($Vrsh), 0, strpos(trim($Vrsh), '-'));

        echo "<form action='./ch_virsh.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";
        $LstVirsh = "select it.vcod from it WHERE id_src=? order by it.vcod";
        $stmt = $pdo->prepare($LstVirsh);
        $stmt->execute([$_SESSION['id_src']]);
        ?>

        <TABLE cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="skrlnk" COLSPAN=2>
                    <? echo ($lang == 'rus') ? 'Стих:' : 'Virsh:' ?>
                </td>
            </tr>
            <tr>
                <td class="skrlnk" COLSPAN=2>
                    <select name="Vrsh" size="1" bgcolor="#e5f7f3" onChange="OpenIPer(this)">
                        <?
                        while ($row1 = $stmt->fetch(PDO::FETCH_LAZY)) {
                            if ($Vrsh == $row1[0]) {
                                echo "<option selected value='$row1[0]'> $row1[0] ";
                            } else {
                                echo "<option value='$row1[0]'> $row1[0] ";
                            }
                        }
                        echo "</select>";
                        echo "</td></tr>";
                        // echo "</table>";

                        echo "</form>";

                        // <TABLE cellpadding="0" cellspacing="0" border="0" width="100%"  >
                        ?>
            <tr>
                <form name="f_ch_chapt" action="d_cvirsh.php" method="POST" ENCTYPE="x-www-form-urlencoded">
                    <?
                    echo "<input type='hidden' name='Vrsh' value='$Vrsh'>";
                    echo "<input type='hidden' name='id_src' value='$id_src'>";
                    echo "<td class='skrlnk'>";

                    //$Qstr = "SELECT SUBSTRING_INDEX(trim(it.vcod), '-', 1) as gl FROM it WHERE it.id_src='$_SESSION['id_src']' GROUP BY gl ORDER BY gl ";
                    $Qstr = "SELECT trim(it.vcod) as gl FROM it WHERE it.id_src=? GROUP BY gl ORDER BY gl ";
                    $stmt = $pdo->prepare($Qstr);
                    $stmt->execute([$_SESSION['id_src']]);
                    ?>
                    <select name="Glava" bgcolor="#e5f7f3" size="1" onChange="Refresh_Chapt(this)">
                        <?
                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                            if ($row[0] == $Glava) {
                                echo "<option selected value='$row[0]'>$row[0]";
                            } else {
                                echo "<option value='$row[0]'>$row[0]";
                            }
                        }

                        echo "</td>";
                        echo "</select>";
                        echo "</form>";

                        //$LstVirsh=mysql_query("select it.vcod from it where it.id_src='$_SESSION['id_src']' and SUBSTRING_INDEX(trim(it.vcod), '-', 1)='$Glava' order by it.vcod") or mysql_die();

                        $Qstr = "SELECT trim(it.vcod) FROM it WHERE it.vcod LIKE ? and id_src= ? ORDER BY vcod";
                        $stmt = $pdo->prepare($Qstr);

                        $Glava = "$Glava-%";
                        $stmt->execute([$Glava, $_SESSION['id_src']]);

                        ?>
                        <form action="d_cvirsh.php" method="POST" ENCTYPE="x-www-form-urlencoded">
                            <td class="skrlnk">
                                <select name="NmVirsh" size="1" bgcolor="#e5f7f3" onChange="Refresh_Frames(this)">

                                    <?
                                    while ($row1 = $stmt->fetch(PDO::FETCH_LAZY)) {
                                        $bst = substr(trim($row1[0]), strpos(trim($row1[0]), '-') + 1, strlen(trim($row1[0])));
                                        if ($Vrsh == $row1[0]) {
                                            echo "<option selected value='$row1[0]'> $bst ";
                                        } else {
                                            echo "<option value='$row1[0]'> $bst ";
                                        }
                                    }
                                    echo "</select>";

                                    echo "</td>";
                                    echo "</form>";

                                    echo "</tr>";
                                    echo "</table>";
                                    echo "<hr>";


                                    //$LstSans_q = mysql_fetch_row(mysql_query("select it.lstsans from it WHERE trim(it.vcod)='$Vrsh' and id_src='$_SESSION['id_src']'")) or mysql_die() ;
                                    $LstSans_q = "select it.lstsans from it WHERE trim(it.vcod)=? and id_src=?";
                                    $stmt = $pdo->prepare($LstSans_q);
                                    $stmt->execute([$Vrsh, $_SESSION['id_src']]);
                                    $res = $stmt->fetch();
                                    $LstSans_Ar = explode(";", $res[0]);

                                    $Hash = 0;
                                    ?>

                                    <TABLE cellpadding="0" cellspacing="0" border="0">

                                        <?
                                        foreach ($LstSans_Ar as $k => $v) {
                                            if ($v) {
                                                $Hash++;
                                                $Sans_q = $pdo->query("select mw.sans from mw WHERE mw.scod='$v'")->fetch();
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a class="skrlnk"
                                                           href="javascript:LnkRbotHash(<? echo $Hash; ?>)"><? echo $Sans_q[0]; ?></a>
                                                    </td>
                                                </tr>
                                                <?
                                            } //if ($v)
                                        }  //while  ($row  =  mysql_fetch_row($result))
                                        ?>
                                    </table>
                                    <hr>
                                    <?
                                    echo "<table border='0' cellpadding='2' cellspacing='3' width='100%'>";
                                    echo "<form action='./qvirsh.php' method='POST' ENCTYPE='x-www-form-urlencoded' target='rbot'>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>Вид:";
                                    echo "</td></tr>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>";
                                    echo "<select  name='RegDispl_style' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
                                    echo "<option " . (($_SESSION['RegDispl_style'] == "mono") ? "selected" : "") . " value='mono'>Моно";
                                    echo "<option " . (($_SESSION['RegDispl_style'] == "list") ? "selected" : "") . "  value='list'>Список";
                                    echo "</select>";
                                    echo "</td></tr>";
                                    echo "</form>";
                                    echo "<tr><td class='skrlnk_'><hr></td></tr>";
                                    echo "<form action='./qvirsh.php' method='POST' ENCTYPE='x-www-form-urlencoded' target='rbot'>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>Содерж.:";
                                    echo "</td></tr>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>";
                                    echo "<select  name='RegDispl_items' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
                                    echo "<option " . (($_SESSION['RegDispl_items'] == "full") ? "selected" : "") . " value='full'>Все";
                                    echo "<option " . (($_SESSION['RegDispl_items'] == "no_src") ? "selected" : "") . "  value='no_src'>Без ссыл.";
                                    echo "<option " . (($_SESSION['RegDispl_items'] == "no_gr") ? "selected" : "") . "  value='no_gr'>Без грам.";
                                    echo "<option " . (($_SESSION['RegDispl_items'] == "no_src_gr") ? "selected" : "") . "  value='no_src_gr'>Значен.";
                                    echo "</select>";
                                    echo "</td></tr>";
                                    echo "</form>";
                                    echo "<tr><td class='skrlnk_'><hr></td></tr>";
                                    echo "<form action='./qvirsh.php' method='POST' ENCTYPE='x-www-form-urlencoded' target='rbot'>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>Язык:";
                                    echo "</td></tr>";
                                    echo "<tr><td class='skrlnk_' STYLE='text-align: center'>";
                                    echo "<select  name='RegDispl_lang' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
                                    echo "<option " . (($_SESSION['RegDispl_lang'] == "rus") ? "selected" : "") . " value='rus'>Рус.";
                                    echo "<option " . (($_SESSION['RegDispl_lang'] == "eng") ? "selected" : "") . "  value='eng'>Анг.";
                                    echo "<option " . (($_SESSION['RegDispl_lang'] == "all") ? "selected" : "") . "  value='all'>Оба";
                                    echo "</select>";
                                    echo "</td></tr>";
                                    echo "</form>";

                                    echo "</table>";
                                    echo "<hr>";
                                    ?>
                                    <br><br>
                                    <table border="0" cellpadding="2" cellspacing="2" width='100%'>
                                        <tr>
                                            <th class="form" WIDTH=5%></th>
                                            <td class="form" WIDTH=90% style="color=red">
                                                * Вы можете откорректировать найденную ошибку в словарной статье щелкнув
                                                по ней мышкой.
                                            </td>
                                            <th class="form" WIDTH=5%></th>
                                        </tr>
                                    </table>

</body>
</HTML>