try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
    exit();
}
$fh = fopen('dishes.csv','rb');
$stmt = $db->prepare('INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?,?,?)');
while ((! feof($fh)) && ($info = fgetcsv($fh))) {
    // $info[0] �� �޴����̴�(dishes.csv ������ ù ��° �ʵ�).
    // $info[1] �� �����̴�(�� ��° �ʵ�).
    // $info[2] �� �ſ� ������(�� ��° �ʵ�).
    // �����ͺ��̽� ���̺� �ο� ����
    $stmt->execute($info);
    print "$info[0] ���� �Ϸ�\n";
}
// ���� �ݱ�
fclose($fh);
