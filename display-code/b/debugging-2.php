function validate_form( ) {
    $input = array();
    $errors = array( );

    // ��� ���۸� Ȱ��ȭ
    ob_start();
    // ����� �����͸� ��� ����Ѵ�.
    var_dump($_POST);
    // ���ۿ� ����� ��� ����� �����´�.
    $output = ob_get_contents();
    // ��� ���۸��� ��Ȱ��ȭ �Ѵ�.
    ob_end_clean();
    // ����� �����͸� ���� �α׷� �����Ѵ�.
    error_log($output);

    // op�� �ʼ����̴�.
    $input['op'] = $GLOBALS['ops'][$_POST['op']] ?? '';
    if (! in_array($input['op'], $GLOBALS['ops'])) {
        $errors[] = '�����ڸ� �����ϼ���.';
    }
    // num1�� num2�� ���ڿ��� �Ѵ�.
    $input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num1']) || ($input['num1'] === false)) {
        $errors[] = 'ù ��° ���� �Է��ϼ���.';
    }

    $input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    if (is_null($input['num2']) || ($input['num2'] === false)) {
        $errors[] = '�� ��° ���� �Է��ϼ���.';
    }

    // 0���� ���� �� ����.
    if (($input['op'] == '/') && ($input['num2'] == 0)) {
        $errors[] = '0���� ���� �� �����ϴ�.';
    }

    return array($errors, $input);
}