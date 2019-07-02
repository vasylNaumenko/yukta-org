<SCRIPT LANGUAGE="JavaScript">
    <!--

    function OpenWndHelp() {
        msgWindow = window.open("help_srch.html", "msg", "resizable=yes,status=yes,scrollbars=yes")
    }

    //-->
</SCRIPT>

<?
function f_mess_korr_err()
{
    echo "<br><br>";
    echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
    echo "<tr>";
    echo "<th class='form' WIDTH=15%></th>";
    echo "<td class='form' WIDTH=70% style='color=red'>";
    echo "* Вы можете откорректировать найденную ошибку в словарной статье щелкнув по ней мышкой.";
    echo "</td>";
    echo "<th class='form' WIDTH=15%></th>";
    echo "</tr>";
    echo "</table>";

}

function f_rep_nomatch()
{
    echo " <table border='0' cellpadding='2' cellspacing='2' >";
    echo "<tr>";
    echo "<th class='form' WIDTH=10% ></th>";
    echo "<th class='form'>";
    echo "По Вашему запросу не найдено ни одного значения.";
    echo "</th>";
    echo "<th class='form' WIDTH=10% ></th>";
    echo "</tr>";
    echo "</table>";
}  // function


function f_rep_sans_means()
{
    $Skr_Arr = explode(";", $_SESSION['s_SkrArrStr']);
    $Hash = 0;

    $script_edit = addslashes("http://" . $_SERVER["SERVER_NAME"] . str_replace("srch_skr", "bgita/edit", $_SERVER['SCRIPT_NAME']));
//    $script_edit = addslashes("http://" . $_SERVER["SERVER_NAME"] . preg_replace("srch_skr", "bgita/edit", $_SERVER['SCRIPT_NAME']));
// $script_edit = addslashes($_SERVER["CHARSET_HTTP_METHOD"].$_SERVER["SERVER_NAME"].preg_replace("srch_skr","bgita/edit",$_SERVER['SCRIPT_NAME']));
    if ($Skr_Arr[0] > " " and count($Skr_Arr) > 0)  // Не пусто ли?
        foreach ($Skr_Arr as $kskr => $vskr) {
            $Hash++;
            if ($_SESSION['RegDispl_style'] == "mono") {
                print_mono($vskr, "wndEdit", "$script_edit", $Hash, 1);
            } else {
                print_list($vskr, "wndEdit", "$script_edit", $Hash, 1);
            } // if ($_SESSION['RegDispl_style'] = "mono")
        }
}

function f_rep_srched_sans($Sans_Arr, $num_rows)
{
    echo " <table border='0' cellpadding='2' cellspacing='2' >";
    echo "<tr>";
    echo "<th class='form' WIDTH=10% ></th>";
    echo "<th class='form'>";
//   echo "$str_lex_fnd".$num_rows;
    echo "Найдено значений: $num_rows. ";
    if ($num_rows > 40) {
//    echo "$str_lex_mns";
        echo "Вы можете выбрать до 40 значений.";
    }
    echo "</th>";
    echo "<th class='form' WIDTH=10% ></th>";
    echo "</tr>";
    echo "</table>";


    ?>
    <form name="f_getskr" action="./srch_skr.php" method="POST" ENCTYPE="x-www-form-urlencoded">
        <input type="hidden" name="GetSkr" value=1>
        <input type="hidden" name="NumRows" value="<? echo $num_rows ?>">
        <table border="0" cellpadding="2" cellspacing="2">

            <?
            $light = true;
            $Cnt = 1;
            uasort($Sans_Arr, "strcasecmp");
            reset($Sans_Arr);
            foreach ($Sans_Arr as $ks => $vs) {
                if ($vs) {
                    echo "<tr>";
                    if ($light) {
                        echo "<td WIDTH=10% class='b_l_left'>";
                    } else {
                        echo "<td WIDTH=10% class='b_d_left'>";
                    }
                    echo "$Cnt";
                    echo "</td>";

                    if ($light) {
                        echo "<td class='b_l_left'>";
                    } else {
                        echo "<td class='b_d_left'>";
                    }

//   echo "<input type='checkbox' name='$Cnt' value='$ks'>";
                    echo "<input type='checkbox' name='chk[]' value='$ks'>";

                    if ($light) {
                        echo "<a name='$Cnt'  class='oper_l' href='srch_skr.php?NumRows=1&ks=$ks'>$vs</a>";
                    } else {
                        echo "<a name='$Cnt'  class='oper_d' href='srch_skr.php?NumRows=1&ks=$ks'>$vs</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                    $light = !$light;
                    $Cnt++;
                } // if ($vs)
            }  //  while  ($row  =  mysql_fetch_row($result))
            ?>
        </table>
        <br>
        <hr size="1" width="98%">
        <table border="0" cellpadding="2" cellspacing="2">
            <tr>
                <th class="form" WIDTH=15%></th>
                <th class="form" WIDTH=20%>
                    <INPUT TYPE="submit" VALUE="Показать">
                </th>
            </tr>
        </table>
    </form>

    <?

}  // function f_rep_srched_sans()


function f_hlp1()
{
//  <hr size="1" width="90%">
    echo "<table border='0' cellpadding='2' cellspacing='2' WIDTH=100%>";
    echo "<tr>";
    echo "<td class='form_Left' WIDTH=30%>";
    echo "</td>";
    echo "<td class='form' WIDTH=40%>";
    echo "<INPUT TYPE='submit' class='sky8' VALUE='Помощь' onClick='OpenWndHelp()'>";
    echo "</td>";
    echo "<td class='form_Left' WIDTH=30%>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}

function f_hlp1__()
{
//  <hr size="1" width="90%">

    ?>

    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <td class="form_Left" WIDTH=5%>
                <? echo $s_lex_ex; ?>
            </td>
            <td class="form_Left" WIDTH=10%>
                %krt%
            </td>
            <td class="form_Left" WIDTH=85%>
                - akRta, akRtabuddhi, AkRti, duSkRta, karmakRt, kRt, ...

            </td>
        </tr>
        <tr>
            <td class="form_Left">

            </td>
            <td class="form_Left">
                k_ta%
            </td>
            <td class="form_Left">
                - katara, kAtara, kAtaram, kRta, kRtakRtya, kUTa, ...

            </td>
        </tr>

    </table>

    <?
}


function f_hlp2()
{
    ?>

    <table border="0" cellpadding="2" cellspacing="2" width='100%'>
        <tr>
            <th class="form" WIDTH=15%></th>
            <td class="form" STYLE="text-align: left" WIDTH=70%>

                Убедитесь, что Вы правильно вводите маску для поиска:
                <ul>
                    <li> в поле <b>Русский</b> вводится русское слово (например, 'счастье'), если Вы желаете
                        получить список санскритских значений, в переводе которых это слово встречается;<br>
                    <li> в поле <b>Английский</b> вводится английское слово (например, 'fitness'), если Вы желаете
                        получить список санскритских значений, в переводе которых это слово встречается;<br>
                    <li> в поле <b>Санскрит</b> вводится санскритское значение <b>с использованием
                            транслитерации Harvard-Kyoto (HK)</b>. (Весь алфавит санскрита в HK - справа от кнопок
                        'Поиск');
                    <li> Наиболее характерные ошибки при вводе маски поиска в поле <b>Санскрит</b>:<br>

                        <table border="1" cellpadding="5" cellspacing="1" width='100%'>
                            <tr>
                                <th class="form" WIDTH=40%>Неправильно</th>
                                <th class="form" WIDTH=60%>Правильно</th>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    корова
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    Это значение нужно вводить в поле <b>Русский</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    сура
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    sura
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    aacaarya
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    AcArya или просто acarya
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    adhii
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    adhI или просто adhi
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    sankhya
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    saMkhya или sa_khya
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    bhuuta
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    bhUta или просто bhuta
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    krit
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    kRt или просто krt
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    chandra
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    candra
                                </td>
                            </tr>
                            <tr>
                                <td class="form" STYLE="text-align: left">
                                    ichchhaa
                                </td>
                                <td class="form" STYLE="text-align: left">
                                    icchA
                                </td>
                            </tr>

                        </table>
                    <li> Если Вы знаете HK не очень хорошо и сомневаетесь, правильно ли ввели
                        маску для поиска, введите нижнее подчеркивание '_' вместо сомнительной буквы.
                        Например, чтобы найти значение saGga можно ввести sa_ga . В этом случае будут найдены
                        saGga и sarga. Также можно ввести sa%ga - будут найдены все значения
                        с начальным слогом sa- и конечным -ga (saGga, sAMkhyayoga, saMsAramArga, saMyoga, ...);


                </ul>
            </td>
            <th class="form" WIDTH=15%></th>
        </tr>
        <tr>
            <th class="form" WIDTH=15%></th>
            <td class="form" STYLE="text-align: left" WIDTH=70%>

                Сейчас база сайта содержит, в основном, лексику Бхагавад Гиты и Йога сутры. Ведется разработка лексики
                "Аштавакра сутры".<br>
                Если у Вас есть желание принять участие в разработке значений для этих и других работ, интересующих Вас,
                -
                <A class="menu" href="cont.php">пишите</A>.<br><br>
            </td>
            <th class="form" WIDTH=15%></th>
        </tr>
    </table>

    <?
} // function f_hlp2()

function f_frm_srch()
{
    global $ar_t_srch;
//  echo "<form name = 'f_srch' action='$_SERVER[php_self]' method='POST' ENCTYPE='x-www-form-urlencoded'>";
    echo "<form name = 'f_srch' action='srch_skr.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";

    echo "<th class='form' WIDTH=50%>Найти&nbsp;&nbsp;";
    echo "<input type='text' size = '20' name='Srch_val' value='{$_SESSION['Srch_val']}'>";
  echo "&nbsp;&nbsp;<select name='t_srch' size='1' bgcolor='#e5f7f3'>";
    foreach ($ar_t_srch as $ks=> $vs) {
        if ($_SESSION['t_srch'] == $ks) {
          echo "<option selected value='$ks'>$vs";
      } else {
          echo "<option value='$ks'>$vs";
      }
  }
  echo "</select>";
  echo "&nbsp;&nbsp;<INPUT TYPE='submit' name='go_srch' class='sky8' VALUE='Искать'>";
  echo "</th>";
  echo "</form>";

} // function f_frm_srch()

// -------------------------------------------
function format_Date_RusToEng($Date_rus)
{
    if (preg_match("/^(\d\d)(-|\.|\,)(\d\d)(-|\.|\,)(\d\d\d\d)$/", $Date_rus, $d_f)) {
        //                   1       2      3     4          5
    }
    return $d_f[5] . "-" . $d_f[3] . "-" . $d_f[1];
}

function f_frm_ch_gr_fltr()
{
    global $pdo;
// echo "<form action='$SERVER[php_self]' method='POST' ENCTYPE='x-www-form-urlencoded'>";
    echo "<form action='srch_skr.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";

    echo "<th class='form' WIDTH=50%>Список всех значений:&nbsp;&nbsp; ";

    $stmt = $pdo->prepare("select t_fltr.* from t_fltr order by num");
    $stmt->execute();

    echo "<select name='fltr_grp' size='1' bgcolor='#e5f7f3'>";

    while ($row1 = $stmt->fetch(PDO::FETCH_LAZY)) {
        // нужно первое значение группы
        $pos = strpos($row1[1], ",");
        if ($pos === false) {
            $sc = $row1[1]; // всего одно значение в данной группе
            $sc1 = "";      // последнего значения в группе нет
        } else {
            $sc = substr($row1[1], 0, $pos); // первое значение группы

            $pos = strrpos(trim($row1[1]), ",");
            $sc1 = substr(trim($row1[1]), $pos + 1, strlen(trim($row1[1])));

        }

        $bsm = $pdo->query("select mw.sans from mw where scod=" . $sc)->fetch();

        if ($sc1 > "") {
            $lsm = $pdo->query("select mw.sans from mw where scod=" . $sc1)->fetch();
        } else {
            $lsm = "";
        }
        $bgs = substr($bsm[0], 0, 7) . ((strlen($bsm[0]) < 7) ? '   ' : '...') . " - " . substr(str_pad($lsm[0], 7, " "), 0, 7) . ((strlen($lsm[0]) < 7) ? '   ' : '...');
        if ($_SESSION['fltr_grp'] == $row1[0]) {
//    echo "<option selected value='$row1[0]'>$row1[0]_$bgs";
            echo "<option selected value='$row1[0]'>$bgs";
        } else {
//    echo "<option value='$row1[0]'>$row1[0]_$bgs";
            echo "<option value='$row1[0]'>$bgs";
        }
    }
    echo "</select>";

    echo "<INPUT name 'fltr_gr' TYPE='submit' class='sky8' VALUE='Показать'>";
    echo "</th>";
    echo "</form>";
}

function f_frm_reg_displ($NumRows)
{
    echo "<Center>";
    echo "<hr size='1' width=90%>";
//  echo "Режим отображения значений: ";
    echo "<table border='0' cellpadding='2' cellspacing='3'>";
    echo "<tr><td class='skrlnk_'>Режим отображения значений:";
    echo "</td>";
    echo "<form action='srch_skr.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";
    echo "<input type='hidden' name='Redraw' value='1'>";
    echo "<input type='hidden' name='NumRows' value='$NumRows'>";
    echo "<td class='skrlnk_'>&nbsp;&nbsp;&nbsp;Вид:";
    echo "</td>";
    echo "<td class='skrlnk_' STYLE='text-align: center'>";
    echo "<select  name='RegDispl_style' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
    echo "<option " . (($_SESSION['RegDispl_style'] == "mono") ? "selected" : "") . " value='mono'>Моно";
    echo "<option " . (($_SESSION['RegDispl_style'] == "list") ? "selected" : "") . "  value='list'>Список";
    echo "</select>";
    echo "</td>";
    echo "</form>";
    echo "<form action='srch_skr.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";
    echo "<input type='hidden' name='Redraw' value='1'>";
    echo "<input type='hidden' name='NumRows' value='$NumRows'>";
    echo "<td class='skrlnk_'>&nbsp;&nbsp;&nbsp;Содерж.:";
    echo "</td>";
    echo "<td class='skrlnk_' STYLE='text-align: right'>";
    echo "<select  name='RegDispl_items' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
    echo "<option " . (($_SESSION['RegDispl_items'] == "full") ? "selected" : "") . " value='full'>Все";
    echo "<option " . (($_SESSION['RegDispl_items'] == "no_src") ? "selected" : "") . "  value='no_src'>Без ссыл.";
    echo "<option " . (($_SESSION['RegDispl_items'] == "no_gr") ? "selected" : "") . "  value='no_gr'>Без грам.";
    echo "<option " . (($_SESSION['RegDispl_items'] == "no_src_gr") ? "selected" : "") . "  value='no_src_gr'>Значен.";
    echo "</select>";
    echo "</td>";
    echo "</form>";
    echo "<form action='srch_skr.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";
    echo "<input type='hidden' name='Redraw' value='1'>";
    echo "<input type='hidden' name='NumRows' value='$NumRows'>";
    echo "<td class='skrlnk_'>&nbsp;&nbsp;&nbsp;Язык:";
    echo "</td>";
    echo "<td class='skrlnk_' STYLE='text-align: center'>";
    echo "<select  name='RegDispl_lang' class='reg' bgcolor='#e5f7f3' size='1'  onChange='this.form.submit()'>";
    echo "<option " . (($_SESSION['RegDispl_lang'] == "rus") ? "selected" : "") . " value='rus'>Рус.";
    echo "<option " . (($_SESSION['RegDispl_lang'] == "eng") ? "selected" : "") . "  value='eng'>Анг.";
    echo "<option " . (($_SESSION['RegDispl_lang'] == "all") ? "selected" : "") . "  value='all'>Оба";
    echo "</select>";
    echo "</td></tr>";
    echo "</form>";
    echo "</table>";
    echo "<hr size='1' width=90%>";
//  echo "<hr>";
    echo "</Center>";


}

?>