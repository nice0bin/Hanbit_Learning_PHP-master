$url = 'http://php7.example.com/post-server.php';

// POST�� ������ �� ����
$form_data = array('name' => 'black pepper',
                   'smell' => 'good');
// �޼���, ���� ����, ���� ����
$options = array('method' => 'POST',
                 'header' => 'Content-Type: application/x-www-form-urlencoded',
                 'content' => http_build_query($form_data));
// 'http' ��Ʈ�� ���ؽ�Ʈ ����
$context = stream_context_create(array('http' => $options));
// file_get_contents�� �� ��° �μ��� ���ؽ�Ʈ ����
print file_get_contents($url, false, $context);
