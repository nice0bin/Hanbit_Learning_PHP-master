/* �� �����͸� ó���ϴ� �κ��̹Ƿ�, $input �迭 ���
$_POST ������ ���� ����Ѵ�. */
function process_form() {
    print '<ul>';
    foreach ($_POST as $k => $v) {
        print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
    }
    print '</ul>';
}