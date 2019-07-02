<?

$DBHost = "localhost";
$DBUser = "root";
$DBPass = "";

$DBPath = "sqlite:db/database.db";

/**
 * @return PDO
 */
function Connect()
{
    global $DBPath;

    $pdo = new PDO('sqlite:db/database.db');
    // Set errormode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

   // if($pdo->sqliteCreateFunction("regexp", "preg_match", 2) === FALSE) exit("Failed creating function!");

    return $pdo;
}

function commonHeader($title)
{
    echo "<HTML><BODY BGCOLOR='#FFFFFF'>";
    echo "<TITLE>Бхагавад Гита - $title</TITLE>";
}

function commonFooter()
{
    echo "<br><br></font></center></body></html>";
}

function blueFont($text)
{
    echo "<font face='Arial' color='blue'>$text</font>";
}

function redFont($text)
{
    echo "<font face='Arial' color='red'>$text</font>";
}

function mysql_die($error = "")
{
    global $strError, $strSQLQuery, $strMySQLSaid, $strBack, $sql_query;

    echo "<b> $strError </b><p>";
    if (isset($sql_query) && !empty($sql_query)) {
        echo "$strSQLQuery: <pre>$sql_query</pre><p>";
    }
    if (empty($error))
//        echo $strMySQLSaid . mysql_error();
        echo $strMySQLSaid . " some error";
    else
        echo $strMySQLSaid . $error;
    echo "<br><a href=\"javascript:history.go(-1)\">Назад</a>";
    exit;
}

