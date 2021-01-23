// ��û �޼��忡 ���� ������ �Լ��� �����ϴ� ����
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate_form()�� ���� �޽��� �迭�� ��ȯ�ϸ� show_form()�� �����Ѵ�
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    } else {
        process_form();
    }
} else {
    show_form();
}

// ���� �����ϸ� �����ϴ� �Լ�
function process_form() {
    print $_POST['my_name']. "�� �ȳ��ϼ���.";
}

// ���� ǥ���ϴ� �Լ�
function show_form($errors = array()) {
    // ���� �޽����� ���޹����� ����Ѵ�.
    if ($errors) {
        print '���� �׸��� �������ּ���.: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }

    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
�̸�: <input type="text" name="my_name">
<br>
<input type="submit" value="�λ�">
</form>
_HTML_;
}

// �� ������ �˻�
function validate_form() {
    // ���� �޽����� ���� �� �迭 ����
    $errors = array();

    // �̸��� �ʹ� ª���� ���� �޽��� �߰�
    if (strlen($_POST['my_name']) < 3) {
        $errors[ ] = '�̸��� 3���� �̻� �Է����ּ���.';
    }

    // (�� �迭�� ���� �ִ�) ���� �޽��� �迭 ��ȯ
    return $errors;
}