try {
    $db = new PDO('mysql:host=localhost;dbname=restaurant','penguin','top^hat');
    // $db�� �̿��� �ڵ带 �̰��� �ۼ��Ѵ�.
} catch (PDOException $e) {
    print "�����ͺ��̽��� ������ �� �����ϴ�: " . $e->getMessage();
}
