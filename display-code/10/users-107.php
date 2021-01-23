function validate_form( ) {
    $input = array();
    $errors = array();
    // ���� ����ڿ� �ؽ� ��й�ȣ
    $users = array('alice' =>
        '$2y$10$N47IXmT8C.sKUFXs1EBS9uJRuVV8bWxwqubcvNqYP9vcFmlSWEAbq',
                   'bob' =>
        '$2y$10$qCczYRc7S0llVRESMqUkGeWQT4V4OQ2qkSyhnxO0c.fk.LulKwUwW',
                   'charlie' =>
        '$2y$10$nKfkdviOBONrzZkRq5pAgOCbaTFiFI6O2xFka9yzXpEBRAXMW5mYi');

    // ����ڸ��� �����ϴ��� Ȯ��
    if (! array_key_exists($_POST['username'], $users)) {
        $errors[ ] = '�ùٸ� ����ڸ�� ��й�ȣ�� �Է����ּ���.';
    }
    else {
    // ��й�ȣ�� ��ġ�ϴ��� Ȯ��
        $saved_password = $users[ $input['username'] ];
        $submitted_password = $_POST['password'] ?? '';
        if (! password_verify($submitted_password, $saved_password)) {
            $errors[ ] = '�ùٸ� ����ڸ�� ��й�ȣ�� �Է����ּ���.';
        }
    }

    return array($errors, $input);
}