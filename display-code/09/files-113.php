$filename = realpath("/usr/local/data/$_POST[user]");

// $filename�� /usr/local/data ������ �ִ��� Ȯ���ϱ�
if (('/usr/local/data/' == substr($filename, 0, 16)) &&
    is_readable($filename)) {
    print '����� ����: ' . htmlentities($_POST['user']) .': <br/>';
    print file_get_contents($filename);
} else {
    print "�������� �ʴ� ������Դϴ�.";
}
