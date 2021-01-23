<?php
// �����ͺ��̽� ����
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    die("������ �� �����ϴ�: " . $e->getMessage());
}
// DB ������ ���� ����
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// �迭 ������� ��������
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// �����ͺ��̽����� �޴����� �迭�� �����´�.
$dish_names = array( );
$res = $db->query('SELECT dish_id,dish_name FROM dishes');
foreach ($res->fetchAll() as $row) {
    $dish_names[ $row['dish_id'] ] = $row['dish_name'];
}
$res = $db->query('SELECT * FROM customers ORDER BY phone DESC');
$customers = $res->fetchAll();
if (count($customers) == 0) {
    print "���� �������� �ʽ��ϴ�.";
} else {
    print '<table>';
    print '<tr><th>ID</th><th>�̸�</th><th>��ȭ��ȣ</th><th>�ܰ� �޴�</th></tr>';
    foreach ($customers as $customer) {
        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
               $customer['customer_id'],
               htmlentities($customer['customer_name']),
               $customer['phone'],
               $dish_names[$customer['favorite_dish_id']]);
    }
    print '</table>';
}
?>