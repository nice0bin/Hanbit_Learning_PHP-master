// ��û �޼��忡 ���� ������ �Լ��� �����ϴ� ����
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validate_form()) {
        process_form();
    } else {
        show_form();
    }
} else {
    show_form();
}

// ���� �����ϸ� �����ϴ� �Լ�
function process_form() {
    print $_POST['my_name']. "�� �ȳ��ϼ���.";
}

// ���� ǥ���ϴ� �Լ�
function show_form() {
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
    // my_name�� ���ڼ��� 3���� ������?
    if (strlen($_POST['my_name']) < 3) {
        return false;
    } else {
        return true;
    }
}