<?php
//dezend by http://www.yunlu99.com/
function export($type)
{
	global $DB;
	global $lang;
	$_obf__WwKzYz1wA__ = '';
	$_obf_YfrY8VEd = '"操作时间"';
	$_obf_YfrY8VEd .= ',"操作人动作"';
	$_obf_YfrY8VEd .= ',"操作人"';
	$_obf_YfrY8VEd .= "\r\n";
	$_obf__WwKzYz1wA__ .= $_obf_YfrY8VEd;

	if ($_SESSION['offLogSQL'] == '') {
		$_obf_xCnI = ' SELECT * FROM ' . ANDROID_LOG_TABLE . ' WHERE logId =0 ';
	}
	else {
		$_obf_xCnI = base64_decode($_SESSION['offLogSQL']);
	}

	$_obf_3I8RfSDT = $DB->query($_obf_xCnI);

	while ($_obf_9WwQ = $DB->queryArray($_obf_3I8RfSDT)) {
		$_obf__WwKzYz1wA__ .= '"' . date('Y-m-d H:i:s', $_obf_9WwQ['actionTime']) . '"';
		$_obf__WwKzYz1wA__ .= ',"' . qshowexportquotechar($_obf_9WwQ['actionMess']) . '"';
		$_obf__WwKzYz1wA__ .= ',"' . $_obf_9WwQ['nickName'] . '"';
		$_obf__WwKzYz1wA__ .= "\r\n";
	}

	unset($_SESSION['offLogSQL']);
	return $_obf__WwKzYz1wA__;
}

if ((ob_get_length() === false) && !ini_get('zlib.output_compression') && (ini_get('output_handler') != 'ob_gzhandler') && (ini_get('output_handler') != 'mb_output_handler')) {
	ob_start('ob_gzhandler');
}

define('ROOT_PATH', '../');
require_once ROOT_PATH . 'Entry/Global.setup.php';
require_once ROOT_PATH . 'Functions/Functions.mgt.inc.php';
require_once ROOT_PATH . 'Functions/Functions.string.inc.php';
include_once ROOT_PATH . 'Lang/CN/Lang.mgt.inc.php';
_checkroletype('1|6');
ob_start();
$logsList = export('Logs');
header('Pragma: no-cache');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Type: application/octet-stream;charset=utf8');
header('Content-Disposition: attachment; filename=OfflineLogsList_' . date('Y-m-d') . '.csv');
echo $logsList;
exit();

?>
