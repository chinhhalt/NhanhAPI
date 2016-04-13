<title>NhanhAPI | Send order</title>
<?php
header('Content-type: text/html; charset=utf-8');

require_once '../src/NhanhService.php';

$data = array(
    "id" => 8935432,
    "trafficSource" => null,
    "accessDevice" => null,
    "depotId" => null,
    "status" => "New", // New | Confirmed
    "moneyTransfer" => null,
    "paymentId" => null,
    "paymentMethod" => null,
    "paymentGateway" => null,
    "paymentCode" => null,
    "carrierId" => 2, // carrierId get from get/shippingFee.php
    "carrierServiceId" => 23, // carrierServiceId get from get/shippingFee.php
    "codFee" => 15000,
    "shipFeeBy" => "Sender", // Receiver
    "shipFee" => 23000,
    "customerShipFee" => 38000,
    "deliveryDate" => "2015-05-30",
    "description" => "Giao hàng trong giờ hành chính",
    "autoSend" => null,
    "fromName" => null,
    "fromEmail" => null,
    "fromAddress" => null,
    "fromMobile" => null,
    "fromCityName" => null,
    "fromDistrictName" => null,
    "weight" => 900, // in gram
    "width" => null,
    "height" => null,
    "length" => null,
    "createdDateTime" => "2015-05-27 09:35:52",
    "customerName" => "Lucia",
    "customerMobile" => "0988666999",
    "customerEmail" => "lucia@example.com",
    "customerCityName" => "Hà Nội",
    "customerDistrictName" => "Quận Hai Bà Trưng",
    "customerAddress" => "51 Lê Đại Hành",
    "paymentGateway" => "Bảo Kim",
    "moneyTransfer" => 12000000,
    "productList" => array(
        array(
            "id" => 1541245,
            "idNhanh" => "", // use idNhanh if product is synchronized from Nhanh.vn
            "quantity" => 1,
            "code" => "SSGS2",
            "name" => "Samsung Galaxy S2",
            "importPrice" => 12000000,
            "price" => 13500000,
            "description" => 'Lấy màu trắng nếu không có màu đen'
        ),
        array(
            "id" => 1572134,
            "idNhanh" => "", // use idNhanh if product is synchronized from Nhanh.vn
            "quantity" => 1,
            "code" => "LM535",
            "name" => "Lumia 535",
            "importPrice" => 3000000,
            "price" => 3500000
        )
    )
);

// the storeId in e-commerce platforms, individual websites set $storeId = null;
// $storeId = 2335458;
$storeId = null;

$service = new NhanhService();
$response = $service->sendRequest(NhanhService::URI_ORDER_ADD, $data, $storeId);

if ($response->code) {
    echo "<h1>Success!</h1>";
} else {
    echo "<h1>Failed!</h1>";
    foreach ($response->messages as $message) {
        echo "<p>$message</p>";
    }
}