// ��Ű �������� ������ �� ��Ű�� �������� �ʴ´�.
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// ��Ű ���� Ȱ��ȭ
curl_setopt($c, CURLOPT_COOKIEJAR, true);

// ù ��° ��û���� ��Ű�� ����.
$res = curl_exec($c);
print $res;

// �� ��° ��û���� ù ��° ��û���� ���� ��Ű�� �ִ�.
$res = curl_exec($c);
print $res;