try {
    // �����ͺ��̽� ����
    $db = new PDO('sqlite:/tmp/restaurant.db');
    // DB ������ ���� ����
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->query('SELECT * FROM dishes ORDER BY price');
    $dishes = $stmt->fetchAll();
    if (count($dishes) == 0) {
        $html = '<p>�߰ߵ� �޴��� �����ϴ�.</p>';
    } else {
        $html = "<table>\n";
        $html .= "<tr><th>�޴���</th><th>����</th><th>�ʱ�</th></tr>\n";
        foreach ($dishes as $dish) {
            $html .= '<tr><td>' .
                  htmlentities($dish['dish_name']) . '</td><td>$' .
                  sprintf('%.02f', $dish['price']) . '</td><td>' .
                  ($dish['is_spicy'] ? 'Yes' : 'No') . "</td></tr>\n";
        }
        $html .= "</table>";
    }
} catch (PDOException $e) {
    $html = "�޴��� ������ �� �����ϴ�: " . $e->getMessage();
}
print $html;