// ��û �޼��忡 ���� ������ �Լ��� �����ϴ� ����
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// validate_form()�� ���� �޽��� �迭�� ��ȯ�ϸ� show_form()�� �����Ѵ�.
    list($form_errors, $input) = validate_form();
    if ($form_errors) {
        show_form($form_errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}