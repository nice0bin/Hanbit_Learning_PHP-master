$prices = array(5.95, 3.00, 12.50);
$total_price = 0;
$tax_rate = 1.08; // 8% �ΰ�����

foreach ($prices as $price) {
    error_log("[��: $total_price]");
    $total_price = $price * $tax_rate;
    error_log("[��: $total_price]");
}

printf('�� ���� (with tax): $%.2f', $total_price);