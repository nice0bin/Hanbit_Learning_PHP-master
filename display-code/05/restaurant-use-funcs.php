require 'restaurant-functions.php';

/* ���İ��� $25, ���ϱ� �ΰ��� 8.875%, ���ϱ� �� 20% */
$total_bill = restaurant_check(25, 8.875, 20);

/* ������ $30 */
$cash = 30;

print "���� ����� " . payment_method($cash, $total_bill);