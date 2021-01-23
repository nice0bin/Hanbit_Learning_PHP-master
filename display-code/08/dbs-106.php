try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ��� �޴� ����
    if ($make_things_cheaper) {
        $db->exec("DELETE FROM dishes WHERE price > 19.95");
    } else {
        // �Ǵ�, ��� �޴� ����
        $db->exec("DELETE FROM dishes");
    }
} catch (PDOException $e) {
    print "�����͸� ������ �� �����ϴ�: " . $e->getMessage();
}
