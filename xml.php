<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)) . $ds;
require_once ("{$base_dir}models{$ds}model.php");

if (!isset($_SERVER['argv'][1])){
    die('not id');
}
$id = $_SERVER['argv'][1];
$data = new model();
$result_array = $data->select($id);

$dom = new domDocument("1.0", "utf-8");
$bill = $dom->createElement("BILL");
$dom->appendChild($bill);
foreach ($result_array as $data) {

$number = $dom->createElement("NUMBER", $data['intPaymentId']);
$company = $dom->createElement("COMPANY", $data['varName']);
$companyaddres = $dom->createElement("COMPANYADDRES", $data['varAddress']);
$summ = $dom->createElement("SUMM", $data['varSum']);
$billtext = $dom->createElement("BILLTEXT", $data['varPaymentText']);
$billinfo = $dom->createElement("BILLINFO");

$bill->appendChild($number);
$bill->appendChild($company);
$bill->appendChild($companyaddres);
$bill->appendChild($billinfo);
$billinfo->appendChild($summ);
$billinfo->appendChild($billtext);

}

$dom->save("bill.xml");