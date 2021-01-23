// setAttribute()�� �⺻���� �����ϸ�
// setFetchMode()�� fetch()�� �ƹ� ���� ���� �ʿ䰡 ����.
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch()) {
    print implode(', ', $row) . "\n";
}

$anotherQuery = $db->query('SELECT dish_name FROM dishes WHERE price < 5');
// $moreDishes�� �� ���� �迭�� ����Ű �迭�̴�.
$moreDishes = $anotherQuery->fetchAll();
