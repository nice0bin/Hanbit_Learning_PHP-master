// �ռ� ������ ���ø� ���� �ҷ�����
$page = file_get_contents('page-template.html');

// ������ ���� ����
$page = str_replace('{page_title}', 'ȯ���մϴ�', $page);

// ��ħ���� �ʷϻ�, ���Ŀ��� �Ķ������� ������ ���� �ٲٱ�
if (date('H' >= 12)) {
    $page = str_replace('{color}', 'blue', $page);
} else {
    $page = str_replace('{color}', 'green', $page);
}

// ������ ���Ǻ����� ����� ����ڸ� ��������
$page = str_replace('{name}', $_SESSION['username'], $page);

// ��� ���
print $page;