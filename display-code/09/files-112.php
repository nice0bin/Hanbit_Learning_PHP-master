// user���� ������ �����ϱ�
$user = str_replace('/', '', $_POST['user']);
// user���� .. �����ϱ�
$user = str_replace('..', '', $user);

if (is_readable("/usr/local/data/$user")) {
    print '����� ����: ' . htmlentities($user) .': <br/>';
    print file_get_contents("/usr/local/data/$user");
}