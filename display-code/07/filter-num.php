$ok = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
if (is_null($ok) || ($ok === false)) {
    $errors[] = '���̸� ��Ȯ�ϰ� �Է����ּ���.';
}
