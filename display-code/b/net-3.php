// 1970�� 1�� 1�� ���� ������� �帥 ��
$now = time();
setcookie('last_access', $now);
if (isset($_COOKIE['last_access'])) {
    // 1970�� 1�� 1�� ���� ������� �帥 �ʸ� �̿��� DateTime ��ü�� �����Ϸ���
    // �� ���� �տ� @�� ���δ�.
    $d = new DateTime('@'. $_COOKIE['last_access']);
    $msg = '<p>���������� �湮�� �ð�: ' .
         $d->format('g:i a') . ' on ' .
         $d->format('F j, Y') . '</p>';
} else {
    $msg = '<p>�� �������� ó�� �湮�ϼ̽��ϴ�.</p>';
}

print $msg;