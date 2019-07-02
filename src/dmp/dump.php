<?
session_name("yukta_org");
session_start();

require("../bhgit.php");
$pdo = Connect();

require('./lib1.php');
Global $lim;

$Qstr = "SELECT * FROM t_audit WHERE send IS NULL";
$result = $pdo->query($Qstr)->fetchAll();
if ($_POST['dump_corr'] and  count($result) > 0) {

    $Delete_after_dump = 0;
    $crlf = "\r\n";
    $ba = Array();
    @set_time_limit(3600);

    $fname = "u97" . date("ymd") . "_" . str_pad(time(), 2, "0", STR_PAD_LEFT) . ".sql";

    header("Content-disposition: filename=" . $fname);
    header("Content-type: application/octetstream");
    header("Pragma: no-cache");
    header("Expires: 0");
    $schema_create = "# u97 $crlf# Файл сгенерирован средой разработки yukta.org $crlf# $crlf";
    echo $schema_create;
    foreach ($result as $row) {
        echo "INSERT INTO t_correct set t_aud= '$row[1]', id_aud='$row[2]', v_aud='" . addslashes(stripslashes($row[3])) . "', ip='$row[4]', dat_edit='$row[5]', scod='$row[8]';$crlf";
        $ba[] = $row[0];
    } // while
    if ($Delete_after_dump) {
        $Qstr = "DELETE from t_audit WHERE acod IN (" . implode(",", $ba) . ")";
        $stmt = $pdo->prepare($Qstr);
        $stmt->execute();

        $Qstr = "OPTIMIZE TABLE t_audit";
        $stmt = $pdo->prepare($Qstr);
        $stmt->execute();
    } else {
        $Qstr = "UPDATE t_audit set send='$fname' WHERE acod IN (" . implode(",", $ba) . ")";
        $stmt = $pdo->prepare($Qstr);
        $stmt->execute();
    }

} else {// if (mysql_num_rows($result) > 0) {

    header("Location: index.php");
    exit;

}
?>
