$page = file_get_contents('page-template.html');
// ���� ��ȣ�� �̿��� ���� ǥ����
if ($page === false) {
    print "���ø��� �ҷ��� �� �����ϴ�: $php_errormsg";
} else {
    // ... �̰����� ���ø� ó��
}
