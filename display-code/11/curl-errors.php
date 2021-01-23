// �������� ���� API�� ���Ƿ� ����
$c = curl_init('http://api.example.com');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($c);
// ���� ���ο� ������� ���� ������ ��� ��������
$info = curl_getinfo($c);

// ���ӿ� ������ ���� ��
if ($result === false) {
    print "���� #" . curl_errno($c) . "\n";
    print "�̷�! cURL �����Դϴ�: " . curl_error($c) . "\n";
}
// 400����� 500���� ���� �ڵ�� HTTP ���� ������.
else if ($info['http_code'] >= 400) {
    print "������ HTTP ������ ��ȯ�߽��ϴ� {$info['http_code']}.\n";
}
else {
    print "���ӿ� �����߽��ϴ�!\n";
}
// ��û ���� �߿��� �ҿ� �ð��� �ִ�.
print "���ӿ� �ҿ�� �ð��� {$info['total_time']} �� �Դϴ�.\n";
