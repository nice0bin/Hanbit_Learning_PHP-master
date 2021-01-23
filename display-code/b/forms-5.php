function print_array($ar) {
    print '<ul>';
    foreach ($ar as $k => $v) {
        if (is_array($v)) {
            print '<li>' . htmlentities($k) .':</li>';
            print_array($v);
        } else {
            print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
        }
    }
    print '</ul>';
}

/* �� �����͸� ó���ϴ� �κ��̹Ƿ�, $input �迭 ���
$_POST ������ ���� ����Ѵ�. */
function process_form() {
    print_array($_POST);
}