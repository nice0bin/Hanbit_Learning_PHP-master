$q = $db->query('SELECT dish_name, price FROM dishes');
// setFetchMode()�� �̿��ϸ�
// fetch()�� �ƹ��͵� ������ �ʿ䰡 ����.
$q->setFetchMode(PDO::FETCH_NUM);
while($row = $q->fetch()) {
    print implode(', ', $row) . "\n";
}