<?

session_name("yukta_org");
session_start();
header("Content-Type: text/html; charset=utf-8");
//print_r($_POST);
//echo "<br>\n";
//print_r($_GET);
require("bhgit.php");
$pdo = Connect();

require("lib.php");
require("lib_srch.php");
$ar_t_srch = array("sans" => 'в санскрите',
    "rus" => 'в русском',
    "eng" => 'в английском');


if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";

//['Srch_val'] => rtrt ['t_srch'] => eng
if (isset($_POST['t_srch']) and isset($_POST['Srch_val'])) {
    if (strlen(strip_tags($_POST['Srch_val'])) > 30) {
        $sln = 30;
    } else {
        $sln = strlen(strip_tags($_POST['Srch_val']));
    }
    $_SESSION['Srch_val'] = substr(strip_tags($_POST['Srch_val']), 0, $sln);
    $_SESSION['t_srch'] = $_POST['t_srch'];
    unset($_GET);
    unset($NumRows);

    switch ($_POST['t_srch']) {
        case "sans":
            $SrcSkr = $_SESSION['Srch_val'];   //$SrcSkr;
            unset($SrcRuss);
            unset($SrcEngl);
            break;
        case "rus":
            $SrcRuss = $_SESSION['Srch_val'];   //$SrcSkr;
            unset($SrcSkr);
            unset($SrcEngl);
            break;
        case "eng":
            $SrcEngl = $_SESSION['Srch_val'];   //$SrcSkr;
            unset($SrcSkr);
            unset($SrcRuss);
            break;

        default :
    }

}

if (isset($_POST['fltr_grp'])) {
    unset($_GET);
    unset($NumRows);
}

if ($_POST['GetSkr']) {         // информац с формы выбора нескольк слов
    $GetSkr = $_POST['GetSkr'];
    $NumRows = $_POST['NumRows'];
}
if ($_POST['Redraw']) {         // информац с формы выбора нескольк слов
    $NumRows = $_POST['NumRows'];
    unset($_GET);
}

if ($_GET['ks'] and !isset($_POST['Redraw']) and !isset($_POST['t_srch'])) {  // информац выбора одиночного слова
    $ks = $_GET['ks'];
    $NumRows = $_GET['NumRows'];
}

if ($_POST['RegDispl_lang']) $_SESSION['RegDispl_lang'] = $_POST['RegDispl_lang'];
if (!isset($_SESSION['RegDispl_lang'])) $_SESSION['RegDispl_lang'] = "rus";

if ($_POST['RegDispl_style']) $_SESSION['RegDispl_style'] = $_POST['RegDispl_style'];
if (!isset($_SESSION['RegDispl_style'])) $_SESSION['RegDispl_style'] = "mono";

if ($_POST['RegDispl_items']) $_SESSION['RegDispl_items'] = $_POST['RegDispl_items'];
if (!isset($_SESSION['RegDispl_items'])) $_SESSION['RegDispl_items'] = "full";

if (isset($_POST['fltr_grp'])) $_SESSION['fltr_grp'] = $_POST['fltr_grp'];

require("header.php");

// Индикация текущего колич. записей в таблицах


$Qstr = "select param.date_refresh from param where param.kod=1 limit 1";
$row = $pdo->query($Qstr)->fetch();
$CDat = substr($row[0], 8, 2) . "/" . substr($row[0], 5, 2) . "/" . substr($row[0], 0, 4);
echo "<br>";

$Qstr = "select count(*) from mw";
$row = $pdo->query($Qstr)->fetch();

$Qstr = "select count(*) from er";
$row1 = $pdo->query($Qstr)->fetch();
?>

    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <th class="head">
                <? echo $str_lex_tit; ?>
            </th>
        </tr>
        <td class="form">
        </td>
        </tr>
    </table>
<?
//  <hr size="1" width="90%">

$lim = 40;
echo "<br>";
echo "<table border='1' cellpadding='2' cellspacing='2' WIDTH=100%>";
echo "<tr>";
f_frm_srch();
f_frm_ch_gr_fltr();
echo "</tr>";

echo "<tr>";
echo "<th class='form'>";
f_hlp1();
echo "</th>";
echo "<th class='form'>";
setlocale(LC_TIME, "ru_RU.UTF-8");

echo "<table border='0' cellpadding='2' cellspacing='2' WIDTH=100%>";
echo "<tr>";
echo "<td class='form_Left'><center>";
echo "База словаря на данный момент содержит $row[0] значений санскрита.";
echo "</center></td>";
echo "</tr>";
echo "<tr>";
echo "<td class='form_Left'><center>";
// echo "Последнее обновление ".strftime("%d %B %Y",strtotime (format_Date_RusToEng($CDat)));
echo "Последнее обновление " . $CDat;
echo "</center></td>";
echo "</tr>";
echo "</table>";

echo "</th>";
echo "</tr>";
echo "</table>";
echo "<br>";

?>
    <SCRIPT LANGUAGE="JavaScript">
        <!--
        document.f_srch.Srch_val.focus()
        //-->
    </SCRIPT>

<?

$lim3 = $lim * 5; // *5 - Значение наугад

if ($SrcEngl or $SrcRuss) {

    $searchPart = false;
    $searchString = "";
    if ($SrcEngl) {
        if (substr($SrcEngl, strlen($SrcEngl) - 1, 1) == "*") {
            $Engl1 = substr($SrcEngl, 0, strlen($SrcEngl) - 1);
//            $Strw = " WHERE er.eng REGEXP '[^A-Za-z]" . $Engl1 . "[A-Za-z]*|^" . $Engl1 . "[A-Za-z]*'";

            $SrcEngl = $Engl1;
            $Strw = " WHERE er.eng LIKE ?";
            $searchPart = true;

        } else {
//            $Strw = " WHERE er.eng REGEXP '[^A-Za-z]" . $SrcEngl . "[^A-Za-z]|^" . $SrcEngl . "[^A-Za-z]|[^A-Za-z]" . $SrcEngl . "$|^" . $SrcEngl . "$'";
            $Strw = " WHERE er.eng LIKE ?  OR er.eng LIKE ? OR er.eng LIKE ?";

        } // if (substr(

        $searchString = $SrcEngl;

    } else if ($SrcRuss) {
        if (substr($SrcRuss, strlen($SrcRuss) - 1, 1) == "*") {
            $Russ1 = substr($SrcRuss, 0, strlen($SrcRuss) - 1);
//            $Strw = " WHERE er.rus REGEXP '[^А-Яа-я]" . $Russ1 . "[А-Яа-я]*|^" . $Russ1 . "[А-Яа-я]*'";
            $SrcRuss = $Russ1;
            $Strw = " WHERE er.rus LIKE ?";

            $searchPart = true;
        } else {

            //    $Strw = " WHERE er.rus REGEXP '[^А-Яа-я]" . $SrcRuss . "[^А-Яа-я]|^" . $SrcRuss . "[^А-Яа-я]|[^А-Яа-я]" . $SrcRuss . "$|^" . $SrcRuss . "$'";
            $Strw = " WHERE er.rus LIKE ?  OR er.rus LIKE ? OR er.rus LIKE ?";
        } // if (substr(


        $searchString = $SrcRuss;
    } // if ($SrcEngl)

    $params = $searchPart ? ["%$searchString%"] : ["$searchString % ", "% $searchString %", "% $searchString"];
    $Qstr = "SELECT ecod FROM er {$Strw} limit " . "$lim3";

    $stmt = $pdo->prepare($Qstr);
    $stmt->execute($params);
    $Eng_Arr = $stmt->fetchAll();
    $num_rows = count($Eng_Arr);
    if ($num_rows > 0) {
        $_SESSION['s_EngArrStr'] = implode(";", $Eng_Arr);
        $Sans_Arr = [];

        //                $StrWhere1 = " WHERE ((gr.lst_er like '%;" . $ve . ";%') or (gr.lst_er like '%;" . $ve . ";') or (gr.lst_er like  ';" . $ve . ";%')) and (gr.s_ind = mw.scod)";
        $StrWhere1 = " WHERE ((gr.lst_er like ?) or (gr.lst_er like ?) or (gr.lst_er like ?)) and (gr.s_ind = mw.scod)";
        $Qstr = "SELECT gr.s_ind, mw.sans FROM gr, mw {$StrWhere1}  ORDER BY mw.sans limit " . "$lim";
        $stmt = $pdo->prepare($Qstr);

        foreach ($Eng_Arr as $ke => $ve) {
            if ($ve) {

                $stmt->execute(["%;$ve[0];%", "%;$ve[0];", ";$ve[0];%"]);
                $result = $stmt->fetchAll();

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        if (count($Sans_Arr) < $lim3) {
                            $Sans_Arr[$row[0]] = $row[1];
                        }
                    }
                } else
                    unset($_SESSION['s_SkrArrStr']); // if  ($num_rows > 0)
            } // if ($ve)
        } // while (list($ke, $ve)

        $num_rows = count($Sans_Arr);
    } // if ($num_rows
// echo "$str_lex_fnd"."$num_rows"."$str_lex_mns";
}  // if ($SrcEngl or $SrcRuss)

if (isset($SrcSkr) or isset($_POST['fltr_grp'])) {
    f_set_patern_stat($SrcSkr);
    $_SESSION['s_EngArrStr'] = "";
    $SrcSkrString = str_replace("*", "%", $SrcSkr);

    if (isset($SrcSkr)) { //search
//        $Strw = " WHERE mw.sans like '" . str_replace("*", "%", $SrcSkr) . "'";
        $Strw = " WHERE mw.sans LIKE ?";
    } else { //words list
        $Qstr = "SELECT t_fltr.lst_scod FROM t_fltr WHERE t_fltr.num='{$_POST['fltr_grp']}'";
        $row = $pdo->query($Qstr)->fetch();
        $Strw = " WHERE mw.scod in ($row[0])";
    }

    $Qstr = "SELECT scod, sans FROM mw {$Strw} order by sans limit " . "$lim3";
    $stmt = $pdo->prepare($Qstr);

    if (isset($SrcSkr)) {
        $stmt->execute([$SrcSkrString]);
    } else {
        $stmt->execute();
    }

    $result = $stmt->fetchAll();
    $Sans_Arr = [];
    $num_rows = count($result);
    if ($num_rows > 0) {
        foreach ($result as $row) {
            $Sans_Arr[$row[0]] = $row[1];
        } // while
    } else unset($_SESSION['s_SkrArrStr']);
// if  ($num_rows > 0)

}  // if ($SrcSkr)

if ($num_rows > 0) {
//  Отчет о  найденных санскритских словах
    $act = "dspl_src";
// echo "$str_lex_fnd"."$num_rows"."$str_lex_mns";
} else {    // if ($num_rows>0)
    if (isset($_POST['Srch_val'])) {
//  $act = "dspl_src_hlp";
        f_rep_nomatch();
    }
}   // if ($num_rows>0)

// Информация с отобранными после поиска значениями
if ($NumRows) {
// unset($_SESSION['s_SkrArrStr']);
    $IsSel = 0;
    if (isset($ks)) {   // Прямая ссылка на одно санскр. слово
        $_SESSION['s_SkrArrStr'] = $ks;
        $IsSel = 1;
    } else {
        if (isset($_POST['chk'])) {
            $_SESSION['s_SkrArrStr'] = implode(";", $_POST['chk']);
            $IsSel = 1;
        }
    } // if ($ks)
    if ($IsSel == 1) {
        $act = "dspl_ch"; //отображать отобранные значения
    } else {
        $act = "dspl_no_ch";
    }

}  // if ($NumRows )

// обновить после смены режима отображения
if (isset($_POST['Redraw']) and isset($_SESSION['s_SkrArrStr']) and isset($_POST['NumRows'])) {//  f_rep_sans_means();
    $act = "dspl_ch";
}


switch ($act) {
    case "dspl_ch":
        f_frm_reg_displ($_POST['NumRows']);
        f_rep_sans_means();
        f_mess_korr_err();
        break;
    case "dspl_src":
        f_rep_srched_sans($Sans_Arr, $num_rows);
        echo "<hr>";
        break;
    case "dspl_src_hlp":
        f_hlp2();
        break;

    default :
}


//require "m_menu.php";
/*
<br><br>
 <table border="0" cellpadding="2" cellspacing="2" width='100%' >
  <tr>
  <th class="form" WIDTH=15%></th>
  <td class="form" WIDTH=70% style="color=red">
   * Вы можете откорректировать найденную ошибку в словарной статье щелкнув по ней мышкой.
  </td>
  <th class="form" WIDTH=15%></th>
  </tr>
 </table>
*/
?>