// ��Ű �������� �������� ��Ű�� �������� �ʴ´�.
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

// ù��° ��û�� ��Ű�� ����.
$res = curl_exec($c);
print $res;

// �� ��° ��û ���� ��Ű�� ����.
$res = curl_exec($c);
print $res;