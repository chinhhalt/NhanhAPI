<title>NhanhAPI | Get shipping fee</title>
<?php
/**
 * Code sample to get the shipping fee from Nhanh.vn
 */

header('Content-type: text/html; charset=utf-8');

require_once '../src/NhanhService.php';

$data = array(
    "fromCityName" => "TP. HCM",
    "fromDistrictName" => "Quận 3",
    "toCityName" => "Hà nội",
    "shippingWeight" => 3000, // 3000 gr = 3 kg
    "toDistrictName" => "Hoàn Kiếm",
    "codMoney" => 4950000
);
$service = new NhanhService();
$response = $service->sendRequest(NhanhService::URI_SHIPPING_FEE, $data);

if($response->code) {
	echo "<h1>Success!</h1>";
	echo "<table border='1' cellspacing='0' cellpadding='5'>";
	echo "<tr>";
	echo "<th>Carrier ID</th>";
	echo "<th>Carrier</th>";
	echo "<th>Carrier service ID</th>";
	echo "<th>Carrier service Name</th>";
	echo "<th>Service description</th>";
	echo "<th>Shipping fee</th>";
	echo "<th>COD fee</th>";
	echo "<th>Total fee</th>";
	echo "</tr>";
	foreach($response->data as $rate) {
		echo "<tr>";
		echo "<td>{$rate->carrierId}</td>";
		echo "<td>{$rate->carrierName}</td>";
		echo "<td>{$rate->serviceId}</td>";
		echo "<td>{$rate->serviceName}</td>";
		echo "<td>{$rate->serviceDescription}</td>";
		echo "<td>{$rate->shipFee}</td>";
		echo "<td>{$rate->codFee}</td>";
		echo "<td>". ($rate->shipFee + $rate->codFee) ."</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "<h1>Failed!</h1>";
	foreach ($response->messages as $message) {
		echo "<p>$message</p>";
	}
}