<title>NhanhAPI | Get tracking frame</title>
<?php
/**
 * Code sample to display tracking frame from Nhanh.vn
 */

header('Content-type: text/html; charset=utf-8');

require_once '../src/NhanhService.php';

$service = new NhanhService();

$merchantId = $service->getMerchantId();
$storeId = 528496;
$orderId = 816706;

$dataString = implode('', [
    'merchantId' => $merchantId,
    'storeId' => $storeId, // require for e-commerce platform
    'orderId' => $orderId // order id
]);

$checksum = $service->createChecksum($dataString);

$url = $service->getServer() . "/api/shipping/trackingframe?merchantId=$merchantId&storeId=$storeId&orderId=$orderId&checksum=$checksum";
?>
<iframe src="<?php echo $url ?>" width="800" height="600"></iframe>