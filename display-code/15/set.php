// $_POST['mo'], $_POST['dy'], $_POST['yr']
// �� �� ���� ������ ����� ��, ��, ���� ���̴�.
//
// $_POST['hr'], $_POST['mn']
// �� �� ���� ������ ����� �ð��� ���̴�.

// ���� $d�� ���� �ð��� �����ǰ�, setDate�� setTime�� ���� ���ŵȴ�.
$d = new DateTime();

$d->setDate($_POST['yr'], $_POST['mo'], $_POST['dy']);
$d->setTime($_POST['hr'], $_POST['mn']);

print $d->format('r');