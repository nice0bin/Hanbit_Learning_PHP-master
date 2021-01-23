<?php 

// �����ϴ� ����
$formats = array('application/json','text/html','text/plain');
// ���� ������ �������� �ʾ��� ��
$default_format = 'application/json';

// ���� ������ �����ƴ°�?
if (isset($_SERVER['HTTP_ACCEPT'])) {
// �����ƴٸ� �״�� ����Ѵ�.
    if (in_array($_SERVER['HTTP_ACCEPT'], $formats)) {
        $format = $_SERVER['HTTP_ACCEPT'];
    }
// �������� �ʴ� ������ ��� ������ ��ȯ�Ѵ�.
    else {
// 406�� "�������� �ʴ� ���� �����Դϴ�"�� �ǹ��Ѵ�.
        http_response_code(406);
// ���⼭ �����ϸ� ��û ������ �ƹ� ���뵵 ������, ���� ����.
        exit();
    }
} else {
    $format = $default_format;
}

// ���� �ð� Ȯ��
$response_data = array('now' => time());
// ���� ���� ������ Ŭ���̾�Ʈ�� �˷��ֱ�
header("Content-Type: $format");
// ������ �������� �ð��� ����ϱ�
if ($format == 'application/json') {
    print json_encode($response_data);
}
else if ($format == 'text/html') { ?>
<!doctype html>
  <html>
    <head><title>�ð�</title></head>
    <body><time><?= date('c', $response_data['now']) ?></time></body>
  </html>
<?php 
} else if ($format == 'text/plain') {
    print $response_data['now'];
}