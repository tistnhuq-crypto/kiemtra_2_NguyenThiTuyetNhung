<h3>BÀI 2 :</h3>

<?php
try {
    // 1. Kết nối MySQL qua PDO
    $connection = new PDO("mysql:host=localhost;dbname=QLSP;charset=utf8mb4", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Tạo bảng products (nếu chưa có)
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        price DECIMAL(15,2),
        quantity INT
    )";
    $connection->exec($sql);

    // 3. Thêm dữ liệu sản phẩm 
    $connection->exec("TRUNCATE TABLE products");

    $connection->exec("INSERT INTO products (name, price, quantity) VALUES ('Quần Jeasn', 150000, 25)");
    $connection->exec("INSERT INTO products (name, price, quantity) VALUES ('Áo Thun', 300000, 52)");
    $connection->exec("INSERT INTO products (name, price, quantity) VALUES ('Chân Váy', 800000, 33)");

    // 4. Lấy tất cả sản phẩm từ database chuyển thành mảng kết hợp
    $sql = "SELECT * FROM products";
    $stmt = $connection->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 5. Hiển thị tất cả sản phẩm
    echo "<h2>Danh sách sản phẩm</h2>";
    foreach ($products as $product) {
        echo "Tên sản phẩm: " . $product["name"] . " | Giá: " . number_format($product["price"]) . " VNĐ | Số lượng: " . $product["quantity"] . "<br>";
    }

    // 6. Hàm tính tổng giá trị
    function Tinh_Tong($products) {
        $tong = 0;
        foreach ($products as $product) {
            $tong += $product["price"] * $product["quantity"];
        }
        return $tong;
    }

    // 7. Gọi hàm và hiển thị tổng giá trị
    $tongGiaTri = Tinh_Tong($products);
    echo "<h2>Tổng giá trị tất cả sản phẩm: " . number_format($tongGiaTri) . " VNĐ</h2>";

} catch (PDOException $e) {
    echo "Lỗi CSDL: " . $e->getMessage();
}
?>