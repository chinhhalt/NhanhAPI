# Overview

## Introduction

Nhanh.vn API provides a set of solutions to synchronize the data of products, orders, inventory between Nhanh.vn and other websites. These solutions are suitable for both small websites as well as e-commerce platforms supporting multiple stores.

Product information can be sent from external websites to Nhanh.vn and vice versa.
An inventory update will be sent to the merchant website each time the quantity is changed on Nhanh.vn. The merchant website can listen to these inventory updates from Nhanh.vn API to update its stores’ inventory records accordingly, thus prevent orders on out-of-stock items.
Order information can be sent to Nhanh.vn via the API, so that the store manager can handle the entire process of order confirmation, picking and packing of goods, delivery to customers, payment checking with shipping carriers entirely on Nhanh.vn platform. Nhanh.vn is connected with multiple carriers to support shipping services, including cash-on-delivery (COD) nationwide.
Each time the order status is changed, Nhanh.vn API can send an order status update back to your website via your configured URL.
The merchant website can send unconfirmed order information to Nhanh.vn API to calculate the exact shipping fee, so that the website can display the shipping fee each time customers add a product into their shopping cart or during checkout steps.

## Glossaries

- **shippingWeight**: includes the actual weight of the product and the weight of all the accessories as well as packaging. Shipping weight is used to calculate the shipping fee.
e.g. Product “Samsung Galaxy S2” weighs 300gr, The fullbox includes a charger (30gr), a headphone (10gr) and the packaging box (30gr). Hence the shippingWeight is: 300 + 30 + 10 + 30 = 370 gr.

- **COD**: Cash on delivery (Collect on delivery) is a type of transaction in which payment for a good is made at the time of delivery. If the purchaser does not make payment when the good is delivered, then the good will be returned to the seller. codFee depending on the amount to collect the order.

- **shipFee**: shipping fee (or transport costs), which are calculated based on the weight of order, pickup address and delivery address.

- **customerShipFee**: is the fee that website display to customer, usually taken by shipFee + codFee. When website has promotion to free shipping fee for customer, you set customerShipFee = 0.

## Register to use Nhanh.vn API

Please contact **chukhanhvan@gmail.com** to get an API account.
    (or Skype: **chukhanhvan**).

The register form will be available soon.

An API account includes:

Param |     Data type (Max-length) | Description
------| -----------------------------|------------
apiUsername | string(32) |
secretKey | string(32) | used to create the checksum

# Request, Response

## Environment

- Testing domain: http://dev.nhanh.vn
- Production domain: https://graph.nhanh.vn

## Request

- RESTful applications use HTTP requests to post data. The POST params include:

Param | Data type (Max-length) | Description
------| -----------------------|------------
version | string(10) | The current version is 1.0
storeId | string(20) | Required if the merchant is an e-commerce platforms that have multiple stores.
apiUsername | string(32) | 
data | string | The JSON encoded string of an array (the structure of data array will be explained in detail each request below).
checksum | string(32) | Each request must have a checksum to validate the data. See How to create the checksum below

## Response

- The response is a JSON encoded string, which decodes into the following:<br>
{<br>
		code: 1 | 0, // 1 == success, 0 == failed (has errors)
        
		messages: { // if the status == 0 the server will return error messages
        
			error code => message 1,
            
			error code => message 2
            
				...
},

data: {

	// structure will be explained in detail each request below
    
}



