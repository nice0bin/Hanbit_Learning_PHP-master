$json = file_get_contents("http://php.net/releases/?json");
if ($json === false) {
    print "�����͸� ������ �� �����ϴ�.";
}
else {
    $feed = json_decode($json, true);
    // $feed�� �迭�̸� �ֻ��� Ű�� �� ���� ��ȣ��.
    // ���� ���� ū ���� �̴´�.
    $major_numbers = array_keys($feed);
    rsort($major_numbers);
    $biggest_major_number = $major_numbers[0];
    // �� ���� ��ȣ�� �迭�� ���� �ֽ� ���� ��ȣ�� Ű ���ҿ���
    // "version" ���ҿ� �����ȴ�.
    $version = $feed[$biggest_major_number]['version'];
    print "���� PHP�� ���� �ֽ� ������ $version �Դϴ�.";
}