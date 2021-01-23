function validate_form() {
    $input = array();
    $errors = array();

    // ���ϸ��� �ùٸ��� Ȯ���Ѵ�.
    $input['file'] = trim($_POST['file'] ?? '');
    if (0 == strlen($input['file'])) {
        $errors[] = '���ϸ��� �Է����ּ���.';
    } else {
        // ��ü ���� ��ΰ�
        // �� ������ ���� ��Ʈ ������ �ִ��� Ȯ���Ѵ�.
        $full = $_SERVER['DOCUMENT_ROOT'] . '/' . $input['file'];
        // realpath() �� �̿��� .. ���ڿ��̳�
        // �ɺ��� ��ũ�� ��ȯ�Ѵ�.
        $full = realpath($full);
        if ($full === false) {
            $errors[] = "�ùٸ� ���ϸ��� �Է����ּ���.";
        } else {
            // f$ull ���� ���� ��Ʈ ���͸��� �����ϴ��� �˻��Ѵ�.
            $docroot_len = strlen($_SERVER['DOCUMENT_ROOT']);
            if (substr($full, 0, $docroot_len) != $_SERVER['DOCUMENT_ROOT']) {
                $errors[] = '���� ��Ʈ �ȿ� �ִ� ������ �Է����ּ���.';
            } else if (strcasecmp(substr($full, -5), '.html') != 0) {
                $errors[] = '���ϸ��� .html�� ������ �մϴ�.';
            } else {
                // �̻� ������i n$put�� ��ü ��θ�
                // process_form()�� �����Ѵ�.
                $input['full'] = $full;
            }
        }
    }

    return array($errors, $input);
}