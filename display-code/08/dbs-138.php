// ����, �Ϲ����� ����ǥ ó���� �Ѵ�.
$dish = $db->quote($_POST['dish_search']);
// ��������, �ۼ�Ʈ ��ȣ�� ���ٹ��� �տ� �������ø� ���δ�.
$dish = strtr($dish, array('_' => '\_', '%' => '\%'));
// ����, $dish�� �����ϰ� ���� ���ο� ������ �� �ִ�.
$stmt = $db->query("SELECT dish_name, price FROM dishes
                    WHERE dish_name LIKE $dish");