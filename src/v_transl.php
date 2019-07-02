<?
session_name("yukta_org");
session_start();
//print_r($_POST);
//echo "<br>\n";
//print_r($_GET);
require("header.php");

require("bhgit.php");
$pdo = Connect();

if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";
if ($_POST['id_src']) {
    $_SESSION['id_src'] = $_POST['id_src'];
    $Qstr = "SELECT min(it.vcod) FROM it WHERE id_src=?";
    $stmt = $pdo->prepare($Qstr);
    $stmt->execute([$_SESSION['id_src']]);
    $res = $stmt->fetch();
    $_SESSION['v_tr_Glava'] = substr(trim($row[0]), 0, strpos(trim($row[0]), '-'));
}

if ($_POST['v_tr_mod']) {
    $_SESSION['v_tr_mod'] = $_POST['v_tr_mod'];
} else if (!$_SESSION['v_tr_mod']) $_SESSION['v_tr_mod'] = "sr";

if ($_POST['Glava']) {
    $_SESSION['v_tr_Glava'] = $_POST['Glava'];
    $Glava = $_POST['Glava'];
} elseif (isset($_SESSION['v_tr_Glava'])) {
    $Glava = $_SESSION['v_tr_Glava'];
} else {
    $Glava = "02";
}

?>
<SCRIPT LANGUAGE="JavaScript">
    <!--

    function OpenIPer(vc) {
        msgWindow = window.open("bgita/index.php?Vrsh=" + vc, "msg", "resizable=yes,status=yes")
    }

    //-->
</SCRIPT>

<?

// Дата обновления базы

$Qstr = "select param.date_refresh from param where param.kod=1 limit 1";
$row = $pdo->query($Qstr)->fetch();
$CDate = substr($row[0], 8, 2) . "/" . substr($row[0], 5, 2) . "/" . substr($row[0], 0, 4);
echo "<br>";
?>

<table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
    <tr>
        <td WIDTH=20% class="form">
        </td>
        <td WIDTH=15%>
        </td>
        <td class="form" WIDTH=30%>
            <?
            echo "<form name='f_ch_work' action='$php_self' method='POST' ENCTYPE='x-www-form-urlencoded'>";
            $Lst_src = "select * from scripts order by scripts.id_src";
            $stmt = $pdo->query($Lst_src);
            ?>
            <select name="id_src" class="wk" size="1" bgcolor="#e5f7f3" onChange="this.form.submit()">
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
                ?>
        </td>
        </form>
        <form name="f_v_tr" action="<? echo $php_self; ?>" method="POST" ENCTYPE="x-www-form-urlencoded">
            <td class="form" WIDTH=25% Style="text-align: left"><big>Глава:</big>
                <?
                //$Qstr = "SELECT LEFT(trim(it.vcod),locate('-',trim(it.vcod))-1) as gl FROM it WHERE id_src=? GROUP BY gl ORDER BY gl ";
                $Qstr = "SELECT it.vcod as gl FROM it WHERE id_src=? GROUP BY gl ORDER BY gl ";
                $stmt = $pdo->prepare($Qstr);
                $stmt->execute([$_SESSION['id_src']]);
                ?>

                <select name="Glava" bgcolor="#e5f7f3" size="1" onChange="this.form.submit()">

                    <?
                    $index = "";
                    while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                        $splitted = explode("-", $row[0]);
                        if ($splitted[0] != $index) {
                            $index = $splitted[0];
                            if ($index == $Glava) {
                                echo "<option selected value='$index'>$index";
                            } else {
                                echo "<option value='$index'>$index";
                            }
                        }
                    }
                    ?>
                </select>
            </td>
        </form>

        <td WIDTH=10%>
            <form name="f_v_tr_mod" action="<? echo $php_self; ?>" method="POST" ENCTYPE="x-www-form-urlencoded">
                <select name="v_tr_mod" bgcolor="#e5f7f3" size="1" onChange="this.form.submit()">
                    <option <? echo ($_SESSION['v_tr_mod'] == "sr") ? "selected" : "" ?> value='sr'>Санс.+ Рус.
                    <option <? echo ($_SESSION['v_tr_mod'] == "s") ? "selected" : "" ?> value='s'>Санскрит
                    <option <? echo ($_SESSION['v_tr_mod'] == "r") ? "selected" : "" ?> value='r'>Русский
                </select>
        </td>
        </form>
    </tr>

</table>
<br>

<hr size="1" width="100%">
<br>

<table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
    <tr>
        <th class="head">
            <?
            /*
            echo $str_cont_tit1;?>
            <? if ($Glava) {
             if (substr($Glava,0,1)=="0" || substr($Glava,0,2)=="00") {
            echo substr($Glava,-1).$str_cont_tit2;

             } else {
            echo "$Glava".$str_cont_tit2;

             }
            }
            // echo $str_cont_tit3;
            */
            ?>

        </th>
    </tr>

</table>

<?

if ($Glava == "") {
    $Glava = "%1";
}

switch ($_SESSION['v_tr_mod']) {
    case "sr":
        $Bstr = ", it.src, it.transl ";
        $Nbr = 2;
        break;
    case "s":
        $Bstr = ", it.src ";
        $Nbr = 1;
        break;
    case "r":
        $Bstr = ", it.transl ";
        $Nbr = 1;
        break;
    default:
        $Bstr = ", it.src, it.transl ";
        $Nbr = 2;
}

if ($Nbr == 2) {
    $Wdth = "40%";
} else {
    $Wdth = "100%";
}

//    $Qstr = "SELECT trim(it.vcod) as vc {$Bstr} FROM it WHERE LEFT(trim(it.vcod),locate('-',trim(it.vcod))-1)=?  and id_src=? ORDER BY vc";
$Qstr = "SELECT trim(it.vcod) as vc {$Bstr} FROM it WHERE it.vcod LIKE ?  and id_src=? ORDER BY vc";
$stmt = $pdo->prepare($Qstr);

$Glava = "$Glava-%";
$stmt->execute([$Glava, $_SESSION['id_src']]);

echo "<TABLE BORDER='0' CELLPADDING='2' CELLSPACING='6' WIDTH=100%>";
$light = true;
while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    echo "<tr>";
    if ($light) {
        echo "<td WIDTH=2%  class='b_l_left'>";
    } else {
        echo "<td WIDTH=2%  class='b_d_left'>";
    }
    echo substr($row[0], strrpos($row[0], "-") + 1);
    echo "</td>";

    if ($light) {
        echo "<td WIDTH=$Wdth class='b_l_left'>";
        $Cl = "class='oper_l'";
    } else {
        echo "<td WIDTH=$Wdth class='b_d_left'>";
        $Cl = "class='oper_d'";

    }
//               echo  "$row[1]";
    ?>
    <a <? echo $Cl; ?> href="javascript:OpenIPer('<? echo $row[0]; ?>')"
                       onMouseOver="self.status='Интерактивный перевод стиха <? echo $row[0]; ?>'; return true"><? echo $row[1]; ?></a>
    <?
    echo "</td>";
    if ($Nbr == 2) {
        if ($light) {
            echo "<td class='b_l_right'>";
        } else {
            echo "<td class='b_d_right'>";
        }
        echo "$row[2]";
        echo "</td>";
        echo "</tr>";
    }
    $light = !$light;
}    // while  ($row  =  mysql_fetch_row($result))

echo "</TABLE>";

?>
<hr>
<?
require "m_menu.php";
?>
