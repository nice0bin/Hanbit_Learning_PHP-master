// [���� 9-1]�� ���� �ҷ�����
$page = file_get_contents('page-template.html');

// ������ ���� ����
$page = str_replace('{page_title}', 'Welcome', $page);

// ��ħ���� �ʷϻ�, ���Ŀ��� �Ķ������� ������ ���� �ٲٱ�
if (date('H' >= 12)) {
    $page = str_replace('{color}', 'blue', $page);
} else {
    $page = str_replace('{color}', 'green', $page);
}

// ������ ���Ǻ����� ����� ����ڸ� ��������
$page = str_replace('{name}', $_SESSION['username'], $page);

$result = file_put_contents('page.html', $page);
// file_put_contents()�� false �Ǵ� -1�� ��ȯ�ϴ��� Ȯ��
if (($result === false) || ($result == -1)) {
    print "HTML�� page.html�� ������ �� �����ϴ�.";
}
