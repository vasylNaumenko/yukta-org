<?

//session_name("yukta_org");
//session_start();
//header("Content-Type: text/html; charset=utf-8");
if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";
if ($_POST['SrchGramm']) {
    $_SESSION['gr_SrchGramm'] = $_POST['SrchGramm'];
    $SrchGramm = $_POST['SrchGramm'];
} elseif (isset($_SESSION['gr_SrchGramm'])) {
    $SrchGramm = $_SESSION['gr_SrchGramm'];
}

if ($_POST['Razdel']) {
    $_SESSION['gr_Razdel'] = $_POST['Razdel'];
    $Razdel = $_POST['Razdel'];
} elseif (isset($_SESSION['gr_Razdel'])) {
    $Razdel = $_SESSION['gr_Razdel'];
} else {
    $Razdel = 0;
}

if ($_POST['NumRows']) {
    $NumRows = $_POST['NumRows'];

} elseif ($_GET['NumRows']) {
    $NumRows = $_GET['NumRows'];
}


require("header.php");

?>


<?
//  if  (!$Razdel) {
//   $Razdel = 0;
//}

require("bgita/p/bhgit.php");
$pdo = Connect();

$lim = 40;

?>

    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <th class="head">
                <? echo $s_gr_tit; ?>
            </th>
        </tr>
    </table>


    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>

        <tr>
            <form name="f_Search" action="./gramm.php" method="POST" ENCTYPE="x-www-form-urlencoded">
                <input type="hidden" name="SrcGramm" value=1>

                <th class="form" WIDTH=8%></th>

                <th class="form" WIDTH=15%><? echo $str_SrchGramm; ?></th>
                <th class="form" WIDTH=10%>
                    <input type="text" size="20" name="SrchGramm" value=<? echo $SrchGramm; ?>>
                </th>
                <th class="form" WIDTH=7%>
                    <INPUT TYPE="submit" VALUE="<? echo $str_lex_srch; ?>">
                </th>
            </form>

            <th class="form" WIDTH=15%></th>
            <form name="f_View" action="./gramm.php" method="POST" ENCTYPE="x-www-form-urlencoded">
                <input type="hidden" name="ViewGramm" value=1>

                <th class="form" WIDTH=18%><? echo $str_ViewGramm; ?></th>
                <th class="form" WIDTH=10%>

                    <?
                    $Qstr = "SELECT * FROM gr_type ORDER BY gr_type.kod_type ";
                    $result = $pdo->query($Qstr);
                    ?>

                    <select name="Razdel" bgcolor="#e5f7f3" size="1">

                        <?
                        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
                            if ($row[0] == $Razdel) {
                                echo "<option selected value='$row[0]'>$row[1]";
                            } else {
                                echo "<option value='$row[0]'>$row[1]";
                            }
                        }  // while

                        ?>
                    </select>

                </th>
                <th class="form" WIDTH=9%>
                    <INPUT TYPE="submit" VALUE="<? echo $str_cont_fetch; ?>">
                </th>
                <th class="form" WIDTH=8%></th>

            </form>


        </tr>
        <tr>
            <td class="form"></td>
            <td COLSPAN=3 class="form">
                <? echo $s_lex_ex; ?> yasmai, *smai, yas*, *asma*, -te
            </td>

        </tr>
    </table>

    <SCRIPT LANGUAGE="JavaScript">
        <!--
        document.f_Search.SrchGramm.focus()
        //-->
    </SCRIPT>

    <hr>
<?
// Обработка запроса на поиск в таблицах или выбора раздела
$lim3 = $lim * 5;

if ($_POST['SrcGramm']) {

    $VidPoiska = (substr($SrchGramm, 0, 1) == '*') + (substr($SrchGramm, 0, strlen($SrchGramm) - 1) == '*') * 2;
    $params = [];
    switch ($VidPoiska) {
        case 0:   //  нет "*" ни в начале ни в конце
            $SGr = $SrchGramm;                       // целиком |         в начале       |         в середине                   |       в конце выражения
//            $Strw = " WHERE (gr_tables.tablica REGEXP '^" . $SGr . "$|^" . $SGr . "[^A-za-zА-Яа-я]|[^A-za-zА-Яа-я]" . $SGr . "[^A-za-zА-Яа-я]|[^A-za-zА-Яа-я]" . $SGr . "$') OR
//                        (gr_tables.slovo REGEXP '^" . $SGr . "$|^" . $SGr . "[^A-za-zА-Яа-я]|[^A-za-zА-Яа-я]" . $SGr . "[^A-za-zА-Яа-я]|[^A-za-zА-Яа-я]" . $SGr . "$')";

            $Strw = " WHERE (gr_tables.tablica LIKE ? OR gr_tables.tablica LIKE ? 
            OR gr_tables.tablica LIKE ? OR gr_tables.tablica LIKE ?) OR
            (gr_tables.slovo LIKE ? OR gr_tables.slovo LIKE ? 
            OR gr_tables.slovo LIKE ? OR gr_tables.slovo LIKE ?)";
            $params = [
                " $SGr ", "% $SGr", "% $SGr %", " $SGr %",
                " $SGr ", "% $SGr", "% $SGr %", " $SGr %",
            ];
            break;
        case 1:   // "*" стоит в начале
            $SGr = substr($SrchGramm, 1, strlen($SrchGramm) - 1);
            //                      перед небуквенным символом      |       в конце выражения
//            $Strw = " WHERE gr_tables.tablica REGEXP '[A-za-zА-Яа-я]*" . $SGr . "[^A-za-zА-Яа-я]|[A-za-zА-Яа-я]*" . $SGr . "$'";
            $Strw = " WHERE gr_tables.tablica LIKE ?";
            $params = ["%$SGr"];
            break;
        case 2:   // "*" стоит в конце
            $SGr = substr($SrchGramm, 0, strlen($SrchGramm) - 1);
            //                   в начале             |   после небуквенного символа
//            $Strw = " WHERE gr_tables.tablica REGEXP '^" . $SGr . "[A-za-zА-Яа-я]*|[^A-za-zА-Яа-я]" . $SGr . "[A-za-zА-Яа-я]*'";
            $Strw = " WHERE gr_tables.tablica LIKE ?";
            $params = ["$SGr%"];
            break;
        case 3:   // "*" стоит и в начале и в конце
            $SGr = substr($SrchGramm, 1, strlen($SrchGramm) - 2);
            //
            $Strw = " WHERE gr_tables.tablica LIKE ?";
            $params = ["%$SGr%"];

            break;

    }

    $Qstr = "SELECT * FROM gr_tables $Strw order by gr_tables.kod_ind limit " . "$lim3";
    $stmt = $pdo->prepare($Qstr);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    $num_rows = count($result);
    ?>
    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <td class="form_Left">
                <?
                echo "$str_lex_fnd" . "$num_rows" . "$str_lex_mns";
                ?>
            </td>
        </tr>
    </table>
    <?

}  // if ($SrcGramm)

if ($_POST['ViewGramm']) {
// echo $Razdel;
    if ($Razdel > 0) {
        $Strw = " WHERE gr_tables.razdel ='$Razdel'";
    } else {
        $Strw = "";
    }
    $Qstr = "SELECT * FROM gr_tables $Strw order by gr_tables.kod_ind limit " . "$lim3";
    $stmt = $pdo->prepare($Qstr);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    $num_rows = count($result);
    ?>
    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <td class="form_Left">
                <?
                echo "$str_lex_fnd" . "$num_rows" . "$str_lex_mns";
                ?>
            </td>
        </tr>
    </table>
    <?

}  // if ($SrcGramm)


// выбор из найденных значений для отображения
if ($num_rows > 0) {

//  Отчет о  найденных грамматических единицах
    ?>

    <form name="f_getgram" action="./gramm.php" method="POST" ENCTYPE="x-www-form-urlencoded">

        <input type="hidden" name="GetGram" value=1>
        <input type="hidden" name="NumRows" value="<? echo $num_rows ?>">

        <table border="0" cellpadding="2" cellspacing="2">
            <?
            // Подготовка вспомогат массивов
            $Qstr = "SELECT * FROM gr_type order by gr_type.kod_type";
            $result1 = $pdo->query($Qstr);
            $Type_Arr = Array();
            while ($row1 = $result1->fetch(PDO::FETCH_LAZY)) {
                $Type_Arr[$row1[0]] = $row1[1];
            } // while
            $Qstr = "SELECT * FROM gr_tip_razd order by gr_tip_razd.kodtip";
            $result1 = $pdo->query($Qstr);
            $TRazd_Arr = Array();
            while ($row1 = $result1->fetch(PDO::FETCH_LAZY)) {
                $TRazd_Arr[$row1[0]] = $row1[1];
            } // while


            $light = true;
            $Cnt = 1;

            foreach ($result as $row) {
                echo "<tr>";
                if ($light) {
                    echo "<td WIDTH=4% class='b_l_left'>";
                } else {
                    echo "<td WIDTH=4% class='b_d_left'>";
                }
                echo "$Cnt";
                echo "</td>";

                if ($light) {
                    echo "<td WIDTH=15% class='b_l_left'>";
                } else {
                    echo "<td WIDTH=15% class='b_d_left'>";
                }
                echo $Type_Arr[$row[1]];
                echo "</td>";

                if ($light) {
                    echo "<td WIDTH=15% class='b_l_left'>";
                } else {
                    echo "<td WIDTH=15% class='b_d_left'>";
                }
                echo $TRazd_Arr[$row[2]];
                echo "</td>";

                if ($light) {
                    echo "<td class='b_l_left'>";
                } else {
                    echo "<td class='b_d_left'>";
                }
                ?>
                <input type="checkbox" name="<? echo $Cnt; ?>" value="<? echo $row[0]; ?>">

                <?
// echo $vs
                if ($light) {
                    echo "<a name='$Cnt'  class='oper_l' href='gramm.php?NumRows=1&ks=$row[0]'>$row[3]</a>";
                } else {
                    echo "<a name='$Cnt'  class='oper_d' href='gramm.php?NumRows=1&ks=$row[0]'>$row[3]</a>";
                }
                echo "</td>";
                echo "</tr>";
                $light = !$light;
                $Cnt++;
            }  //  while  ($row  =  mysql_fetch_row($result))
            ?>

        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="2">
            <tr>
                <th class="form" WIDTH=30%></th>
                <th class="form" WIDTH=20%>
                    <INPUT TYPE="submit" VALUE="<? echo $str_lex_fetch; ?>">
                </th>
                <th class="form" WIDTH=50%>
                </th>
            </tr>


        </table>

    </form>
    <hr>
    <?
} // if ($num_rows>0)

// отображение отобранных значений

if ($NumRows) {

    $IsSel = 0;
    $StrWhere = " gr_tables.kod_ind in (";
    if ($_GET['ks']) {   // Прямая ссылка на одно санскр. слово
        $StrWhere .= $_GET['ks'];
        $IsSel = 1;

    } else {
        for ($i = 1; $i <= $NumRows; $i++) {
            if ($_POST[$i]) {
                $IsSel = 1;
                $StrWhere .= $_POST[$i];
                if ($i < $NumRows)
                    $StrWhere .= ",";
            }
        }   // for ($i = 1; $i <= $NumRows; $i++)
    } // if ($ks)

    if ($IsSel) {       //выбрано хотя бы одно слово - вывод на экран
        if (substr($StrWhere, strlen($StrWhere) - 1, 1) == ",")
            $StrWhere = substr($StrWhere, 0, strlen($StrWhere) - 1);
        $StrWhere .= ") ";


        $Qstr = "SELECT * FROM gr_tables WHERE $StrWhere ORDER BY gr_tables.kod_ind limit " . "$lim";
        $result = $pdo->query($Qstr);

// Подготовка вспомогат. массивов
        $Qstr = "SELECT * FROM gr_type order by gr_type.kod_type";
        $result1 = $pdo->query($Qstr);
        $Type_Arr = Array();
        while ($row1 = $result1->fetch(PDO::FETCH_LAZY)) {
            $Type_Arr[$row1[0]] = $row1[1];  // названия разделов
        } // while

        $Qstr = "SELECT * FROM gr_tip_razd order by gr_tip_razd.kodtip";
        $result1 = $pdo->query($Qstr);
        $TRazd_Arr = Array();
        while ($row1 = $result1->fetch(PDO::FETCH_LAZY)) {
            $TRazd_Arr[$row1[0]][0] = $row1[1];    // названия подтипов разделов
            $TRazd_Arr[$row1[0]][1] = $row1[2];    // описания подтипа
        } // while

        $Qstr = "SELECT gr_tables.tablica FROM gr_tables where gr_tables.razdel = 5";
        $result1 = $pdo->query($Qstr);
        $row1 = $result1->fetch();
        $Sklon_Arr = explode("&", $row1[0]);


        $light = true;

// echo "<TABLE BORDER='1' CELLPADDING='2' CELLSPACING='0' WIDTH=100%>";

        while ($row = $result->fetch(PDO::FETCH_LAZY)) {
//   echo  "<tr>";
//     if ($light) {
//        echo  "<td WIDTH=100% class='b_tabl '>";        // b_l_left
//     } else {
//        echo  "<td WIDTH=100% class='b_tabl '>";              // b_d_left
//     } 
            if ($row[1] == 5) {
                $table_ar = explode("&", $row[4]);
            } else {
                $table_ar = explode(";", $row[4]);
            }
//   echo count($table_ar);
            if ($row[1] == 4 and count($table_ar) == 18) { // Спряж. глаголов
                echo "<TABLE BORDER='1' CELLPADDING='2' CELLSPACING='0' WIDTH=100%>";
                echo "<tr>";
                echo "<th COLSPAN=8>";
                echo "<br><B>" . $Type_Arr[$row[1]] . ". " . $TRazd_Arr[$row[2]][0];
                echo "<br><br>";
                echo $row[3];
                echo "</B></th></tr>";
                echo "<tr><th>&nbsp</th>";
                echo "<th COLSPAN=3>";
                echo "Parasmaipada<br> - действие по отношению к другому";
                echo "</th><th COLSPAN=3>";
                echo "Atmanepada<br> - действие по отношению к себе";
                echo "</th><th>&nbsp</th></tr>";
                echo "<tr><th>&nbsp</th>";
                echo "<th> Единст. число </th>";
                echo "<th> Двойст. число </th>";
                echo "<th> Множ. число </th>";
                echo "<th> Единст. число </th>";
                echo "<th> Двойст. число </th>";
                echo "<th> Множ. число </th>";
                echo "<th>&nbsp</th></tr>";

                echo "<tr><th>1-е лицо</th>";
                echo "<td class='b_tabl'>" . $table_ar[0] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[1] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[2] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[9] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[10] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[11] . "&nbsp</td>";
                echo "<th>1-е лицо</th>";
                echo "</tr>";

                echo "<tr><th>2-е лицо</th>";
                echo "<td class='b_tabl'>" . $table_ar[3] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[4] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[5] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[12] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[13] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[14] . "&nbsp</td>";
                echo "<th>2-е лицо</th>";
                echo "</tr>";

                echo "<tr><th>3-е лицо</th>";
                echo "<td class='b_tabl'>" . $table_ar[6] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[7] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[8] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[15] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[16] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[17] . "&nbsp</td>";
                echo "<th>3-е лицо</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th COLSPAN=8><br><B>" . $TRazd_Arr[$row[2]][0] . ":</B> ";
                echo $TRazd_Arr[$row[2]][1];
                echo "<br><br>";
                echo "</th></tr>";
                echo "<tr>";
                echo "<th class='small' COLSPAN=8>";
                echo "Источник: " . $row[5];
                echo "</th></tr>";
                echo "</TABLE>";

            } elseif (count($table_ar) == 24) { // Склонение сущ, местоим, числит

                echo "<TABLE BORDER='1' CELLPADDING='4' CELLSPACING='0' WIDTH=100%>";
                echo "<tr>";
                echo "<th COLSPAN=6>";
                echo "<br><B>" . $Type_Arr[$row[1]];
                echo "<br><br>";
                echo $row[3];
                echo "</B></th></tr>";

                echo "<tr><th>Падеж</th><th>Един. число</th>";
                echo "<th>";
                echo "Двойств. число";
                echo "</th><th>";
                echo "Множ. число";
                echo "</th>";
                echo "<th>";
                echo "На какие вопросы отвечает";
                echo "</th>";
                echo "<th>";
                echo "Примеры склонения";
                echo "</th></tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[1] . " " . $Sklon_Arr[0] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[0] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[1] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[2] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[2] . "</th>";
                echo "<th>" . $Sklon_Arr[3] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[5] . " " . $Sklon_Arr[4] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[3] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[4] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[5] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[6] . "</th>";
                echo "<th>" . $Sklon_Arr[7] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[9] . " " . $Sklon_Arr[8] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[6] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[7] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[8] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[10] . "</th>";
                echo "<th>" . $Sklon_Arr[11] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[13] . " " . $Sklon_Arr[12] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[9] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[10] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[11] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[14] . "</th>";
                echo "<th>" . $Sklon_Arr[15] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[17] . " " . $Sklon_Arr[16] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[12] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[13] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[14] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[18] . "</th>";
                echo "<th>" . $Sklon_Arr[19] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[21] . " " . $Sklon_Arr[20] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[15] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[16] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[17] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[22] . "</th>";
                echo "<th>" . $Sklon_Arr[23] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[25] . " " . $Sklon_Arr[24] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[18] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[19] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[20] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[26] . "</th>";
                echo "<th>" . $Sklon_Arr[27] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $Sklon_Arr[29] . " " . $Sklon_Arr[28] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[21] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[22] . "&nbsp</td>";
                echo "<td class='b_tabl'>" . $table_ar[23] . "&nbsp</td>";
                echo "<th>" . $Sklon_Arr[30] . "&nbsp</th>";
                echo "<th>" . $Sklon_Arr[31] . "</th>";
                echo "</tr>";


                echo "<tr>";
                echo "<th COLSPAN=6>";
                echo " ";
                echo "<br><br>";
                echo "</th></tr>";
                echo "<tr>";
                echo "<th class='small' COLSPAN=6>";
                echo "Источник: " . $row[5];
                echo "</th></tr>";
                echo "</TABLE>";


            } elseif ($row[1] == 5 and count($table_ar) == 32) { // Описание склонений

                echo "<TABLE BORDER='1' CELLPADDING='2' CELLSPACING='0' WIDTH=100%>";
                echo "<tr>";
                echo "<th COLSPAN=4>";
                echo "<br><B>" . $Type_Arr[$row[1]];
                echo "</B><br><br>";
                echo $row[3];
                echo "</th></tr>";

                echo "<tr><th>Англ. название</th>";
                echo "<th>";
                echo "Русское название";
                echo "</th><th>";
                echo "На какие вопросы отвечает";
                echo "</th>";
                echo "<th>";
                echo "Примеры";
                echo "</th></tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[0] . "</th>";
                echo "<th>" . $table_ar[1] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[2] . "</td>";
                echo "<th>" . $table_ar[3] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[4] . "</th>";
                echo "<th>" . $table_ar[5] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[6] . "</td>";
                echo "<th>" . $table_ar[7] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[8] . "</th>";
                echo "<th>" . $table_ar[9] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[10] . "</td>";
                echo "<th>" . $table_ar[11] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[12] . "</th>";
                echo "<th>" . $table_ar[13] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[14] . "</td>";
                echo "<th>" . $table_ar[15] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[16] . "</th>";
                echo "<th>" . $table_ar[17] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[18] . "</td>";
                echo "<th>" . $table_ar[19] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[20] . "</th>";
                echo "<th>" . $table_ar[21] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[22] . "</td>";
                echo "<th>" . $table_ar[23] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[24] . "</th>";
                echo "<th>" . $table_ar[25] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[26] . "</td>";
                echo "<th>" . $table_ar[27] . "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<th>" . $table_ar[28] . "</th>";
                echo "<th>" . $table_ar[29] . "</th>";
                echo "<td class='b_tabl'>" . $table_ar[30] . "&nbsp</td>";
                echo "<th>" . $table_ar[31] . "</th>";
                echo "</tr>";


                echo "<tr>";
                echo "<th COLSPAN=4>";
                echo " ";
                echo "<br><br>";
                echo "</th></tr>";
                echo "<tr>";
                echo "<th class='small' COLSPAN=4>";
                echo "Источник: " . $row[5];
                echo "</th></tr>";
                echo "</TABLE>";


            } else {   // вывод неформатированных разделов

                echo "<TABLE BORDER='0' CELLPADDING='2' CELLSPACING='0' WIDTH=100%>";
                echo "<tr>";
                echo "<th COLSPAN=3>";
                echo "<br><B>" . $Type_Arr[$row[1]] . ". " . $TRazd_Arr[$row[2]][0];
                echo "<br><br>";
//        echo $row[3];
                echo "</B></th></tr>";

                echo "<tr><th WIDTH=5%> &nbsp</th>";
//        echo "<td class='b_d_left'>";
                echo "<td class='gram'>";
                echo $row[4];
                echo "</td>";
                echo "<th WIDTH=5%>&nbsp</th></tr>";


                echo "<tr>";
                echo "<th COLSPAN=3><br>";
                if ($TRazd_Arr[$row[2]][0]) {
                    echo "<B>" . $TRazd_Arr[$row[2]][0] . ":</B> ";
                    echo $TRazd_Arr[$row[2]][1];
                }
                echo "<br>";
                echo "</th></tr>";

                echo "<tr>";
                echo "<th class='small' COLSPAN=3>";
                echo "Источник: " . $row[5];
                echo "</th></tr>";
                echo "</TABLE>";

            }  // else
//    echo  "</td></tr>";
            $light = !$light;
            echo "<br>";

        }
//echo "</TABLE>";

    }  // if ($IsSel) - выбрано хотя бы одно слово

    echo "<hr>";

}  // if ($NumRows )


require "m_menu.php";


?>