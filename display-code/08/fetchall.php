$q = $db->query('SELECT dish_name, price FROM dishes');
// $rows�� ���Ұ� 4���� �迭�̴�.
// �� ���Ҵ� �����ͺ��̽��� ������ �ο� �ϳ��� �ش��Ѵ�.
$rows = $q->fetchAll();
