<?php
// 1. Định nghĩa hàm kiểm tra số nguyên tố
function isPrime($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

// 2. Hiển thị danh sách các số nguyên tố từ 1 đến 100
echo "Danh sách các số nguyên tố từ 1 đến 100:<br>";
for ($i = 1; $i <= 100; $i++) {
    if (isPrime($i)) {
        echo $i . " ";
    }
}
?>