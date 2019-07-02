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

//commonHeader("Пословный перевод");
?>
<html>
<head>
    <title>Source & Transation</title>

    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cashe">
    <meta HTTP-EQUIV="Cashe-Control" CONTENT="no-cashe">

    <SCRIPT language="JavaScript1.2" SRC="style.js">
    </SCRIPT>

</HEAD>

<BODY bgcolor="#e5f7f3" topmargin="1" leftmargin="0" marginheight="0" marginwidth="0">

<?
$Query = "select * from it where vcod=? and id_src=?";
$stmt = $pdo->prepare($Query);
$stmt->execute([$Vrsh, $_SESSION['id_src']]);

echo "<TABLE BORDER='1' CELLPADDING='1' CELLSPACING='0'><TR>";

while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    echo "<tr>";
    echo "<td WIDTH=40% class='h_left'>";
    echo "$row[1]";
    echo "</td>";
    echo "<td WIDTH=60% class='h_right'>";
    echo "$row[2]";
    echo "</td>";
    echo "</tr>\n";
    if ($row[5]) {
        echo "<tr>";
        $Ar_gr = explode(":", $row[5]);

        echo "<td COLSPAN=2 class='h_sintax'>";
        echo "<TABLE BORDER='0' CELLPADDING='0' CELLSPACING='0' WIDTH=100%>";

        $light = true;
        $Hash = 0;

        foreach ($Ar_gr as $k => $v) {
            if ($v and $v > " ") {
                $Ar_val = explode(";", $v);

                if ($Ar_val[2] and $Ar_val[2] > " ") {
                    $Qstr = "SELECT * FROM it_gr WHERE it_gr.it_gr_cod=?";
                    $stmt1 = $pdo->query($Qstr);
                    $stmt1->execute([$Ar_val[2]]);
                    $row1 = $stmt1->fetch();

                    $Hash++;
                    echo "<tr>";
                    if ($light) {
                        echo "<td WIDTH=20% class='gr_l'>";
                        echo "$Ar_val[0]";
                    } else {
                        echo "<td WIDTH=20% class='gr_d'>";
                        echo "$Ar_val[0]";
                    }
                    echo "</td>";

                    if ($light) {
                        echo "<td WIDTH=20% class='gr_l'>";
                    } else {
                        echo "<td WIDTH=20% class='gr_d'>";
                    }
                    echo "$Ar_val[1]";
                    echo "</td>";

                    if ($light) {
                        echo "<td WIDTH=60% class='gr_l'>";
                    } else {
                        echo "<td WIDTH=60% class='gr_d'>";
                    }
                    echo "$row1[1]";
                    echo "</td>";

                    echo "</tr>";
                    $light = !$light;
                }                      // if ($Ar_val[2] and $Ar_val[2] > " ")
            }              // if ($v and $v>" ")
        }          // while (list($k, $v) = each ($Ar_lnk))
        echo "</TABLE>";

        echo "</td>";
        echo "</tr>\n";


    }

}

echo "</TABLE>";


?>
</body>
</html>
