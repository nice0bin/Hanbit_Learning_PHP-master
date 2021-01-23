session_start();

// �ֹ� �������� ���� �޴� ���
$products = [ 'cuke' => '��ģ �ػ�',
              'stomach' => '"����"',
              'tripe' => '���� �ҽ� ���â',
              'taro' => '������� �����',
              'giblets' => '��â �ұ� ����',
              'abalone' => '���� ȣ�� ����'];

// ���� �������� �������� ���� �κ��� ������ ����ȭ�� ����
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    process_form();
} else {
    // ���� ������� �ʾ����� ���� ǥ���Ѵ�.
    show_form();
}

function show_form() {
    global $products;

    // ���� ��ư �ϳ��� �����ϴ� ���̹Ƿ�
    // FormHelper�� ������� �ʰ� ���⿡�� ���� HTML�� ����Ѵ�.
    if (isset($_SESSION['quantities']) && (count($_SESSION['quantities'])>0)) {
        print "<p>�ֹ� ����:</p><ul>";
        foreach ($_SESSION['quantities'] as $field => $amount) {
            list($junk, $code) = explode('_', $field);
            $product = $products[$code];
            print "<li>$amount $product</li>";
        }
        print "</ul>";
        print '<form method="POST" action=' .
              htmlentities($_SERVER['PHP_SELF']) . '>';
        print '<input type="submit" value= "�ֹ� �Ϸ�" />';
        print '</form>';
    } else {
        print "<p>����� �ֹ� ������ �����ϴ�.</p>";
    }
    // �ֹ� �������� "order.php"�� ����ƴٰ� �����Ѵ�.
    print '<a href="order.php">�ֹ� �������� ���ư���</a>';
}

function process_form() {
    // ���ǿ��� �����͸� �����.
    unset($_SESSION['quantities']);
    print "<p>�ֹ����ּż� �����մϴ�.</p>";
}