try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db->exec("INSERT INTO dishes (dish_size, dish_name, price, is_spicy)
                                   VALUES ('��', '���� ����', 2.50, 0)");
} catch (PDOException $e) {
    print "�����͸� ������ �� �����ϴ�: " . $e->getMessage();
}
