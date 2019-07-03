<?
session_name("yukta_org");
session_start();
//print_r($_POST);
//echo "<br>\n";
//print_r($_GET);
require("../bhgit.php");
$pdo = Connect();

$time_secur = 2; // колич часов блокировки подозрит адреса
$len_secur = 3000;  // макс длина принимаемого текста
$autf8_1251 = array(
    0x0D083, 0x0E2809A, 0x0D193, 0x0E2809E, 0x0E280A6, 0x0E280A0, 0x0E280A1, 0x0E282AC, 0x0E280B0, 0x0D089,
    0x0E280B9, 0x0D08A, 0x0D08C, 0x0D08B, 0x0D08F, 0x0D192, 0x0E28098, 0x0E28099, 0x0E2809C, 0x0E2809D,
    0x0E280A2, 0x0E28093, 0x0E28094, 0x0EFBFBD, 0x0E284A2, 0x0D199, 0x0E280BA, 0x0D19A, 0x0D19C, 0x0D19B,
    0x0D19F, 0x0C2A0, 0x0D08E, 0x0D19E, 0x0D088, 0x0C2A4, 0x0D290, 0x0C2A6, 0x0C2A7, 0x0D081,
    0x0C2A9, 0x0D084, 0x0C2AB, 0x0C2AC, 0x0C2AD, 0x0C2AE, 0x0D087, 0x0C2B0, 0x0C2B1, 0x0D086,
    0x0D196, 0x0D291, 0x0C2B5, 0x0C2B6, 0x0C2B7, 0x0D191, 0x0E28496, 0x0D194, 0x0C2BB, 0x0D198,
    0x0D085, 0x0D195, 0x0D197, 0x0D090, 0x0D091, 0x0D092, 0x0D093, 0x0D094, 0x0D095, 0x0D096,
    0x0D097, 0x0D098, 0x0D099, 0x0D09A, 0x0D09B, 0x0D09C, 0x0D09D, 0x0D09E, 0x0D09F, 0x0D0A0,
    0x0D0A1, 0x0D0A2, 0x0D0A3, 0x0D0A4, 0x0D0A5, 0x0D0A6, 0x0D0A7, 0x0D0A8, 0x0D0A9, 0x0D0AA,
    0x0D0AB, 0x0D0AC, 0x0D0AD, 0x0D0AE, 0x0D0AF, 0x0D0B0, 0x0D0B1, 0x0D0B2, 0x0D0B3, 0x0D0B4,
    0x0D0B5, 0x0D0B6, 0x0D0B7, 0x0D0B8, 0x0D0B9, 0x0D0BA, 0x0D0BB, 0x0D0BC, 0x0D0BD, 0x0D0BE,
    0x0D0BF, 0x0D180, 0x0D181, 0x0D182, 0x0D183, 0x0D184, 0x0D185, 0x0D186, 0x0D187, 0x0D188,
    0x0D189, 0x0D18A, 0x0D18B, 0x0D18C, 0x0D18D, 0x0D18E, 0x0D18F
);

function utf8_1251($s)
{

    global $autf8_1251;
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {
        $b = substr($s, $i, 1);

        if (ord($b) < 0x081) {
            $bb = $b;
        } elseif (ord($b) >= 0x0C0 && ord($b) < 0x0E0) {
//2 byte
            $bb = (ord($b) << 8) + ord(substr($s, ++$i, 1));
        } elseif (ord($b) < 0x0F0) {
// 3
            $bb = (ord($b) << 16) + (ord(substr($s, ++$i, 1)) << 8) + ord(substr($s, ++$i, 1));
        } else {
//4
        }

        $z = array_search($bb, $autf8_1251);

        if ($z) {
            $out .= chr($z + 0x081);
        } else {
            $out .= $bb;
        }
    }
    return $out;
}

// -----------
function f_secure($Sstr)
{
    return (!isset($Sstr) or strip_tags($Sstr) == $Sstr) ? 1 : 0;
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML>
<HEAD>
    <TITLE>Прием корректировки ошибок</TITLE>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
    <meta name="Keywords"
          CONTENT="ОСОЗНАНИЕ ЕДИНСТВО САНСКРИТ АНГЛО РУССКИЙ СЛОВАРЬ Sanscrit-Russian-English DICTIONARY БХАГАВАД ГИТА ПЕРЕВОД С САНСКРИТА ЕДИНСТВО UNITY ">
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cashe">
    <meta HTTP-EQUIV="Cashe-Control" CONTENT="no-cashe">
    <SCRIPT language="JavaScript1.2" SRC="style.js">
    </SCRIPT>
</HEAD>
<BODY BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="background: #e5f7f3 ">


<?
echo "<br>";
echo " <table border='0' cellpadding='2' cellspacing='2' WIDTH=100% HEIGHT='100%'>";
echo "<tr>";
echo "<td class='form'></td>";
echo "<td class='form'><hr></td>";
echo "<td class='form'></td>";
echo "</tr>";
echo "<tr>";
echo "<td WIDTH=20% class='form'></td>";
echo "<th WIDTH=60% class='form'>";

if (isset($_POST['Edit_mist']) and isset($_POST['fedit']) and
    isset($_POST['regim']) and isset($_POST['cod']) and isset($_POST['scod']) and isset($_POST['rem-ip'])) {

// проверка на попытку записать html теги или большую длину строки
    if (f_secure($_POST['fedit']) and (strlen($_POST['fedit']) < $len_secur and
            f_secure($_POST['regim']) and f_secure($_POST['cod']) and f_secure($_POST['scod']) and
            f_secure($_POST['rem-ip']))) {

// проверка адреса - есть ли в черном списке?


        $Qstr = "SELECT ip,cnt, date  from ip_secur Where ip = :ip and cnt > 5";
//        $Qstr = "SELECT * from ip_secur Where ip = {trim($_POST['rem-ip'])} and cnt > 5 and DATE_ADD(date, INTERVAL $time_secur HOUR) > Now()";
        $stmt = $pdo->prepare($Qstr);
        $stmt->execute([":ip" => trim($_POST['rem-ip'])]);
        $result = $stmt->fetchAll();
        $num = 0;
        if (count($result) > 0) {
            $timeNow = time();
            foreach ($result as $row) {
                if (strtotime($row[2]) + 60 * $time_secur > $timeNow) {
                    $num++;
                }
            }
        }

        if ($num < 1) {
            $Bstr = stripslashes($_POST['fedit']);
            $Qstr = "INSERT INTO t_audit(t_aud, id_aud, v_aud, ip, dat_edit, scod) VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($Qstr);
            $params = [$_POST['regim'], $_POST['cod'], addslashes($Bstr), $_POST['rem-ip'], date("Y-m-d H:i:s", time()), $_POST['scod']];
            $stmt->execute($params);
            echo "<center>Спасибо!<br>Ваша корректировка сохранена во временной таблице.<br>  Вы можете сформировать файл с корректировками на странице 'Обновление' и отправить его на yukta@yukta.org редактору проекта.<br><br>Счастья Вам!";

            //   regim 6 - gr_rus, 8 - gr_en, 9 - er_en, 10 - er_rus, 11 - er_src
            $params_config = [
                6 => ["gr", "gr_ind", "gr"],
                8 => ["gr", "gr_ind", "gr_e"],
                9 => ["er", "ecod", "eng"],
                10 => ["er", "ecod", "rus"],
            ];

            $mode = $_POST['regim'];
            if (!isset($params_config[$mode])) {
                echo "<center>Warning: mode {$mode} not set. В этом режиме информация в базе данных пока не может быть сохранена.";
            } else {
                $params = $params_config[$mode];
                $Qstr = "UPDATE {$params[0]} SET {$params[2]} = ? WHERE {$params[1]} = ?";
                $stmt = $pdo->prepare($Qstr);
                $stmt->execute([$Bstr, $_POST['cod']]);
            }
        } else { // if  ($num < 1)
            echo "<center>Ваш ip заблокирован из-за многократной передачи некорректной информации";
        }
    } else {    // if (f_secure($_POST['fedit']) нарушение безопасности
        echo "<center>Информация не принята из-за некорректности содержания.";
        $Qstr = "SELECT cnt from ip_secur Where ip = '" . trim($_POST['rem-ip']) . "'";
        $result = $pdo->query($Qstr);
        $num = $result->rowCount();

        $cnt = 1;
        if ($num > 0) {
            $row = $result->fetch();
            $cnt = $row[0] + 1;
        }
        $Qstr = "REPLACE INTO ip_secur set ip= ?, cnt = ?, date=Now()";
        $stmt = $pdo->prepare($Qstr);
        $params = [trim($_POST['rem-ip']), $cnt];
        $stmt->execute($params);
    }           // if (f_secure($_POST['fedit'])
}         // if (isset($_POST['Edit_mist'])

//phpinfo();
echo "</th>";
echo "<td WIDTH=20% class='form'></td>";
echo "</tr>";
echo "<tr>";
echo "<td class='form'></td>";
echo "<td class='form'><hr></td>";
echo "<td class='form'></td>";
echo "</tr>";
echo "<tr>";
echo "<td class='form'></td>";
echo "<td class='form'><br>";
?>
<form method="POST" ENCTYPE="x-www-form-urlencoded">
    <INPUT TYPE="submit" onclick="window.close()" VALUE="Ok">
</form>
<?
echo "</td>";
echo "<td class='form'></td>";
echo "</tr>";
echo " </table>";
?>


</body>
</html>