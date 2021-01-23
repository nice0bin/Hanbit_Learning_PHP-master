try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ĥ���ҽ� ���� ������ �ſ�� �޴��� ��ģ��.
    // �� ���� �ο찡 �ݿ��Ǿ����� �� �ʿ� ������
    // exec()�� ��ȯ���� �ʿ����� �ʴ�.
    $db->exec("UPDATE dishes SET is_spicy = 1
             WHERE dish_name = 'ĥ���ҽ� ���� ����'");
    // ĥ���ҽ� �����͸� �ſ�� �޴��� ��ġ�� ������ �� ��� �ø���.
    $db->exec("UPDATE dishes SET is_spicy = 1, price=price * 2
             WHERE dish_name = 'ĥ���ҽ� ������'");
} catch (PDOException $e) {
    print "�����͸� ������ �� �����ϴ�: " . $e->getMessage();
}
