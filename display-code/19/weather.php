// ������ �˾ƺ� ������ �����ȣ
$zip = "98052";

// ���� ��ȸ YQL(���� ���� ���).
// �ڼ��� ������ https://developer.yahoo.com/weather�� �����ϼ���.
$yql = 'select item.condition from weather.forecast where woeid in '.
       '(select woeid from geo.places(1) where text="'.$zip.'")';

// YQL�� �� �Ű�����
$params = array("q" => $yql,
                "format" => "json",
                "env" => "store://datatables.org/alltableswithkeys");

// ���� �Ű������� �̿��� YQL URL�� �����Ѵ�.
$url = "https://query.yahooapis.com/v1/public/yql?" . http_build_query($params);
// ��û�� �����Ѵ�.
$response = file_get_contents($url);
// ���� JSON�� �����Ѵ�.
$json = json_decode($response);
// ��ü�� ��ȯ�� JSON ���信�� �ʿ��� ���� �����Ѵ�.
$conditions = $json->query->results->channel->item->condition;
// ������ ����Ѵ�.
print "���� �ð� : {$conditions->date}, ��� : {$conditions->temp}" .
      "���� : {$conditions->text}, ���� : $zip\n";
