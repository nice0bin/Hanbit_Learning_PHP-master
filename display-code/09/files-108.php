try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (Exception $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
    exit();
}

// dishes.txt ������ ���� ���� ����
$fh = fopen('/usr/local/dishes.txt','wb');
if (! $fh) {
    print "dishes.txt ������ �� �� �����ϴ�: $php_errormsg";
} else {
    $q = $db->query("SELECT dish_name, price FROM dishes");
    while($row = $q->fetch( )) {
        // �� ����d ishes.txt�� ����
        // (�� �������� ���๮�� �߰�)
        fwrite($fh, "$row[0]�� ������ $row[1] \n");
    }
    if (! fclose($fh)) {
        print "dishes.txt ������ ���� �� �����ϴ�: $php_errormsg";
    }
}