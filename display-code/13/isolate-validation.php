function validate_form($submitted) {
    $errors = array();
    $input = array();

    $input['age'] = filter_var($submitted['age'] ?? NULL, FILTER_VALIDATE_INT);
    if ($input['age'] === false) {
        $errors[] = '���̸� ��Ȯ�ϰ� �Է����ּ���.';
    }

    $input['price'] = filter_var($submitted['price'] ?? NULL,
                                 FILTER_VALIDATE_FLOAT);
    if ($input['price'] === false) {
        $errors[] = '������ ��Ȯ�ϰ� �Է����ּ���.';
    }

    $input['name'] = trim($submitted['name'] ?? '');
    if (strlen($input['name']) == 0) {
        $errors[] = "�̸��� �Է����ּ���.";
    }

    return array($errors, $input);
}