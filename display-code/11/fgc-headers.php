// ���� �����͸� Ű�� ������ �����ϰ� �ڵ� ��ȯ�Ѵ�.
$params = array('api_key' => NDB_API_KEY,
                'q' => 'black pepper');
$url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

// Content-Type ��� ����
$options = array('header' => 'Content-Type: application/json');
// 'http' ��Ʈ���� ����� ���ؽ�Ʈ ����
$context = stream_context_create(array('http' => $options));

// �� �μ��� ������ file_get_contents ȣ���ϱ�
print file_get_contents($url, false, $context);
