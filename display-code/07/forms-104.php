$input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (! $input['email']) {
    $errors[] = '�ùٸ� �̸��� �ּҸ� �Է����ּ���.';
}
