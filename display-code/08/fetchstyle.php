// ����Ű �迭�θ� ��������, ���� �����ϱ� ����.
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_NUM)) {
    print implode(', ', $row) . "\n";
}

// ��ü�� �ޱ�, ���� ������ �� �Ӽ��� �����ϴ� ����
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch(PDO::FETCH_OBJ)) {
    print "{$row->dish_name} has price {$row->price} \n";
}