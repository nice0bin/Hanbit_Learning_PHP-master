try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
    exit();
}

// ���� ���� CSV ���� ����
$fh = fopen('dish-list.csv','wb');

$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    // CSV ���� ���ڿ��� $row�� ������ ����
    // fputcsv() �Լ��� �� ���� ���� ���ڸ� ���Ѵ�.
    fputcsv($fh, $row);
}
fclose($fh);