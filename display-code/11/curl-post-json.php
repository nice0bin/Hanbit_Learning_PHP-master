$url = 'http://php7.example.com/post-server.php';

// POST�� ������ �� ����
$form_data = array('name' => 'black pepper',
                   'smell' => 'good');

$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// ��û�� POST�� �����Ѵ�.
curl_setopt($c, CURLOPT_POST, true);
// ��û�� JSON���� �����ϴ� ��� ����
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
// ������ �����͸� �˸��� �������� �����ϱ�
curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));

print curl_exec($c);