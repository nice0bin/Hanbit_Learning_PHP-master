// ��Ű �׽�Ʈ ������ ��������
$c = curl_init('http://php7.example.com/cookie-server.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

// ��Ű�� 'saved.cookies' ���Ͽ� �����Ѵ�.
// ������ �� ���α׷� ���ϰ� ���� ��ο� ����ȴ�.
curl_setopt($c, CURLOPT_COOKIEJAR, __DIR__ . '/saved.cookies');

// ������ ����� 'saved.cookies' ������ ������ ���Ͽ��� ��Ű�� �ҷ��´�.
curl_setopt($c, CURLOPT_COOKIEFILE, __DIR__ . '/saved.cookies');

// ���Ͽ� ����� ��Ű�� ������ ��û ������
$res = curl_exec($c);
print $res;