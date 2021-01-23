function validate_form( ) {
    global $db;
    $input = array();
    $errors = array();

    // �� ������ ����� ��й�ȣ�� ��ġ�� ���� true�� �����ȴ�.
    $password_ok = false;

    $input['username'] = $_POST['username'] ?? '';
    $submitted_password = $_POST['password'] ?? '';

    $stmt = $db->prepare('SELECT password FROM users WHERE username = ?');
    $stmt->execute($input['username']);
    $row = $stmt->fetch();
    // ��ȯ�� �ο찡 ������, �������� �ʴ� ����ڸ��̴�.
    if ($row) {
        $password_ok = password_verify($submitted_password, $row[0]);
    }
    if (! $password_ok) {
        $errors[] = '�ùٸ� ����ڸ�� ��й�ȣ�� �Է����ּ���.';
    }

    return array($errors, $input);
}