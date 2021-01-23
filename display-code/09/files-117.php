try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
    exit();
}

// dishes.txt ������ ���� ���� ����
$fh = fopen('dishes.txt','wb');

$q = $db->query("SELECT dish_name, price FROM dishes");
while($row = $q->fetch()) {
    // �� ���� dishes.txt�� ����
    // (�� �������� ���๮�� �߰�)
    fwrite($fh, "$row[0]�� ������ $row[1] \n");
}
fclose($fh);