<?
session_name("yukta_org");
session_start();
if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] == "") $_SESSION['id_src'] = "bhgt";

require("./libglobals.php"); // $_POST, $_GET, $_FILES
require("./header.php");

require("../bhgit.php");
$pdo = Connect();

require("./lib1.php");
require('./f_lib.php');


$Qstr = "SELECT * FROM t_audit WHERE send IS NULL";
$result = $pdo->query($Qstr)->fetchAll();
$NeedSendCorr = count($result);
?>
    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <th class="head">
                <?
                echo "Работа с базой данных '" . $DB . "'";
                ?>
            </th>
        </tr>
        <tr>
        </tr>
    </table>


<?
if (!$sql_file || $sql_file == "") {

} else if ($SQL == "Go") {  // if (!$sql_file || $sql_file=="")

    $cfg['AllowUserDropDatabase'] = FALSE;  // show a 'Drop database' link to normal users
    $cfg['ExecTimeLimit'] = 3600;
    /**
     * Increases the max. allowed time to run a script
     */
    @set_time_limit($cfg['ExecTimeLimit']);


    $sql_query = isset($sql_query) ? $sql_query : '';
    if (empty($sql_file)) {
        $sql_file = 'none';
    }

    /**
     * Prepares the sql query
     */
// Gets the query from a file if required
    if ($sql_file != 'none') {
        if (file_exists($sql_file)
            && ((isset($sql_localfile) && $sql_file == $cfg['UploadDir'] . $sql_localfile) || is_uploaded_file($sql_file))) {

            // read from the normal upload dir
//     print_r($_FILES);  

//     if (preg_match("/sql/",$_FILES[name])) {
            if (preg_match("/\.sql$/", trim($s_sql_file))) {

                $sql_query = fread(fopen($sql_file, 'r'), filesize($sql_file));
            } else if (preg_match("/\.sqz$/", trim($s_sql_file))) {

                $sql_ar = gzfile($sql_file);
                $sql_query = implode("\n", $sql_ar);
            } else {  // Определение типа файла
                echo "Неопределенный тип файла";

            }


            if (get_magic_quotes_runtime() == 1) {
                $sql_query = stripslashes($sql_query);
            }
        } // end uploaded file stuff
    }
    $sql_query = trim($sql_query);
// Drop database is not allowed -> ensure the query can be run
    if (!$cfg['AllowUserDropDatabase']
        && preg_match('DROP[[:space:]]+(IF EXISTS[[:space:]]+)?DATABASE ', $sql_query)) {
        // Checks if the user is a Superuser
        // TODO: set a global variable with this information
        // loic1: optimized query
        echo "Удалять базы мы не будем ...";
        exit();
    }


    /**
     * Executes the query
     */
    if ($sql_query != '') {
        if (substr($sql_query, 0, 5) == '# g98') {

            $pieces = array();
            splitSqlFile($pieces, $sql_query, PMA_MYSQL_INT_VERSION);
            $pieces_count = count($pieces);

            // Runs queries
            $mult = TRUE;
            for ($i = 0; $i < $pieces_count; $i++) {
                $a_sql_query = $pieces[$i];
                $stmt = $pdo->prepare($a_sql_query);
                $stmt->execute();

                if ($stmt->rowCount() < 1) { // readdump failed
                    $my_die = $a_sql_query;
                    break;
                }
            } // end for
            f_set_fltr($lim, $DB);
            echo "Обработано " . $pieces_count . " инструкций.";

            unset($pieces);
        } else { // if ((Get_rank($user)=='гр' and substr($sql_query,2,1) == 'u')
            echo "Неправильный формат или предназначение файла $s_sql_file";
        } // if ((Get_rank($user)=='гр' and substr($sql_query,0,3) == '# u')
    } // if ($sql_query != '')

    if (isset($my_die)) {
        //   mysql_die();
    }  // if (isset($my_die))


} // 
?>
    <br><br>
    <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
        <tr>
            <th class="form" width=40%>
                Прием файлов обновлений базы,<br> скачанных из yukta.org.
            </th>
            <th class="form" width=20%>

            </th>
            <th class="form" width=40%>
                Отбор исправлений ошибок &nbsp;(<? echo $NeedSendCorr; ?>)<br> для отсылки на
                <a class="menu" href="mailto:yukta@yukta.org">yukta@yukta.org</a>
            </th>
        </tr>

        <tr>
            <form name="f_upload" method="post" action="index.php" enctype="multipart/form-data">
                <td>
                    <center>
                        <div style="margin-bottom: 5px">
                            <input type="file" name="sql_file" class="textfield"/><br/>
                            <input type="submit" name="SQL" value="Go"/>
                        </div>
                    </center>
                </td>
            </form>
            <td>

            </td>
            <?
            echo "<form name = 'f_dump' action='dump.php' method='POST' ENCTYPE='x-www-form-urlencoded'>";
            ?>
            <td>
                <center>
                    <?
                    if ($NeedSendCorr) {
                        ?>
                        <input name="dump_corr" type="submit" value="Подготовить для отправки">
                        <?
                    } else {
                        echo "Неотправленных корректировок нет";
                    }
                    ?>

                </center>
            </td>
            </form>
        </tr>

        <tr>
            <td>
                <center>
                    <small>
                        <br>( Файлы с названием <b>g98yymmdd_nn.gz</b>, <br>
                        где yy - год, mm - месяц, dd - день, nn - номер ).
                    </small>
                </center>
            </td>
            <td>

            </td>
            <td>
                <center>
                    <small>
                        <br>( Файлы с названием <b>u97yymmdd_nn.sql</b>, <br>
                        где yy - год, mm - месяц, dd - день, nn - номер ).
                    </small>

                </center>
            </td>
        </tr>

    </table>
    <br><br>
    <hr>

<?

require "m_menu.php";
?>