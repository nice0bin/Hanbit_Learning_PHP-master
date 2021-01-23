try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
    exit();
}

// �� Ŭ���̾�Ʈ�� ���� ������ "dishes.csv"��� CSV ���Ϸ� �����ϱ�
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dishes.csv"');

// ��� ��Ʈ���� ���� ���� �ڵ� ����
$fh = fopen('php://output','wb');

// �����ͺ��̽��κ��� ������ �������� ����ϱ�
$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetch(PDO::FETCH_NUM)) {
    fputcsv($fh, $row);
}