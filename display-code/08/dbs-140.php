// ����, �Ϲ����� ����ǥ ó���� �Ѵ�.
$dish = $db->quote($_POST['dish_name']);
// ��������, �ۼ�Ʈ ��ȣ�� ���ٹ��� �տ� �������ø� ���δ�.
$dish = strtr($dish, array('_' => '\_', '%' => '\%'));
// ����, $dish�� �����ϰ� ���� ���ο� ������ �� �ִ�.
$db->exec("UPDATE dishes SET price = 1 WHERE dish_name LIKE $dish");
