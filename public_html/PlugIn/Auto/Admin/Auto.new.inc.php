<?php
//dezend by http://www.yunlu99.com/
if (!defined('ROOT_PATH')) {
	exit('EnableQ Security Violation');
}

$SQL = ' INSERT INTO ' . QUESTION_TABLE . ' SET questionName =\'' . $lang['new_a_qtn'] . $lang['question_type_17'] . '\',surveyID=\'' . $_GET['surveyID'] . '\',administratorsID=\'' . $_SESSION['administratorsID'] . '\',questionType=\'17\',orderByID=\'' . $theNewOrderByID . '\',baseID=\'' . $_POST['baseID'] . '\' ';
$DB->query($SQL);

?>
