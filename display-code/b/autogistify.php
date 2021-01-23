$url = 'https://api.github.com/gists';
$data = ['public' => true,
         'description' => "�ڽ��� ������ gist�� ��Ÿ��.",
         //A PI ������ ���ϸ� files ��ü�� Ű�� ���ڿ� ���ϸ��̸�,
         // Ű�� ���� ���� �Ǵٸ� ��ü��.
         // �� ��ü��c ontent��� Ű�� ���� ������ �����Ѵ�.
         'files' => [ basename(__FILE__) =>
                      [ 'content' => file_get_contents(__FILE__) ] ] ];

$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($c, CURLOPT_USERAGENT, 'learning-php-7/exercise');

$response = curl_exec($c);
if ($response === false) {
    print "��û�� ������ �� �����ϴ�.";
} else {
    $info = curl_getinfo($c);
    if ($info['http_code'] != 201) {
        print "gist�� ������ �� �����ϴ�. ���� �ڵ�: {$info['http_code']}\n";
        print $response;
    } else {
        $body = json_decode($response);
        print "{$body->html_url} gist�� �����߽��ϴ�.\n";
    }
}