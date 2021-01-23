function validate_form() {
    $errors = array();
    $input = array();

    $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    if (is_null($input['age']) || ($input['age'] === false)) {
        $errors[] = '���̸� ��Ȯ�ϰ� �Է����ּ���.';
    }

    $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if (is_null($input['price']) || ($input['price'] === false)) {
        $errors[] = '������ ��Ȯ�ϰ� �Է����ּ���.';
    }

    // $_POST['name']�� �������� �ʾ��� ��츦 ����� �� ���� �����ڸ� ����Ѵ�.
    $input['name'] = trim($_POST['name'] ?? '');
    if (strlen($input['name']) == 0) {
        $errors[] = "�̸��� �Է����ּ���.";
    }

    return array($errors, $input);
}