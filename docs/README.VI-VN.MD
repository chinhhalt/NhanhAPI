# Tổng quan về hệ thống

## Giới thiệu

Nhanh.vn API cung cấp các giải pháp để đồng bộ dữ liệu sản phẩm, đơn hàng, tồn kho giữa Nhanh.vn và các hệ thống website khác. Các giải pháp này phù hợp cho cả các website bình thường (website của 1 cá nhân, công ty) và cả các sàn thương mại điện tử có nhiều gian hàng.

Thông tin sản phẩm có thể được đồng bộ từ các website về Nhanh.vn và ngược lại.
Nhanh.vn sẽ gửi cập nhật mỗi khi số tồn bị thay đổi, các website có thể cập nhật thông tin tồn kho cho từng sản phẩm để hiển thị số tồn chi tiết tại từng cửa hàng trên website, hoặc chặn việc đặt các sản phẩm đã hết hàng.
Thông tin đơn hàng có thể được đồng bộ từ các website về nhanh.vn để chủ gian hàng có thể xử lý việc xác nhận đơn hàng, nhặt hàng và đóng gói, vận chuyển cho khách, đối soát tiền vận chuyển với các hãng vận chuyển dựa trên nền tảng các tiện ích của Nhanh.vn. Hiện tại Nhanh.vn đã kết nối với nhiều hãng vận chuyển để hỗ trợ dịch vụ vận chuyển, giao hàng thu tiền hộ (COD) trên toàn Việt Nam.
Trong quá trình xử lý đơn hàng, mỗi khi trạng thái đơn hàng bị thay đổi, Nhanh.vn API sẽ gửi cập nhật cho các website, các website sẽ lưu trữ lại trạng thái này để hiện thị quá trình xử lý đơn hàng cho khách đã đặt hàng.
Các website có thể gửi thông tin đơn hàng sang Nhanh.vn API để tính phí vận chuyển chính xác, các website có thể hiển thị phí vận chuyển cho khách hàng mỗi khi khách hàng thêm sản phẩm vào giỏ hàng, hoặc ở bước thanh toán để khách biết được ngay tổng tiền cần thanh toán.

## Thuật ngữ

- **shippingWeight**: bao gồm cân nặng thực tế của sản phẩm và toàn bộ cân nặng của các phụ kiện và vỏ hộp đóng gói đi kèm. Shipping weight được sử dụng để tính phí vận chuyển của đơn hàng.
VD: Sản phẩm “Samsung Galaxy S2” nặng 300gr, Sản phẩm fullbox còn bao gồm 1 sạc (30gr), 1 tai nghe (10gr) and vỏ hộp đóng gói (30gr), vậy thì shippingWeight để tính phí vận chuyển sẽ là: 300 + 30 + 10 + 30 = 370 gr.

- **COD**: Cash on delivery (Collect on delivery) là 1 loại giao dịch mà người mua hàng sẽ trả tiền khi nhận được hàng. Nếu người mua không đồng ý thanh toán khi nhận hàng, đơn hàng sẽ được chuyển trả lại cho người bán. codFee tùy thuộc vào số tiền cần thu của đơn hàng.

- **shipFee**: Phí vận chuyển, được tính dựa vào trọng lượng đơn hàng, địa chỉ gửi hàng và địa chỉ nhận hàng.

- **customerShipFee**: Phí thu của khách, là mức phí mà website thông báo cho khách đặt hàng, thường sẽ lấy bằng shipFee + codFee. Tình huống website có chương trình miễn phí vận chuyển cho khách thì set customerShipFee = 0.

## Đăng kí sử dụng Nhanh.vn API

Xin vui lòng liên hệ **chukhanhvan@gmail.com** hoặc Skype: **chukhanhvan** để đăng kí 1 API account.
(Nhanh.vn đang hoàn thiện form đăng kí API.)

Một API account bao gồm:

Param | Data type (Max-length) | Description
-----|-----|-----
apiUsername | string(32)
secretKey | string(32) | dùng để tạo checksum

