<?php

    if (!empty($_GET)) {
        extract($_GET, EXTR_OVERWRITE);
    } else if (!empty($_GET)) {
        extract($_GET, EXTR_OVERWRITE);
    } // end if

    if (!empty($_POST)) {
        extract($_POST, EXTR_OVERWRITE);
    } else if (!empty($_POST)) {
        extract($_POST, EXTR_OVERWRITE);
    } // end if

    if (!empty($_FILES)) {
        while (list($name, $value) = each($_FILES)) {
            $$name = $value['tmp_name'];
            $s_sql_file = $value['name'];
        }
    } else if (!empty($HTTP_POST_FILES)) {
        while (list($name, $value) = each($HTTP_POST_FILES)) {
            $$name = $value['tmp_name'];
            $s_sql_file = $value['name'];
        }
    } // end if

    if (!empty($_SERVER) && isset($_SERVER['PHP_SELF'])) {
        $PHP_SELF = $_SERVER['PHP_SELF'];
    } else if (!empty($HTTP_SERVER_VARS) && isset($HTTP_SERVER_VARS['PHP_SELF'])) {
        $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];
    } // end if


?>
