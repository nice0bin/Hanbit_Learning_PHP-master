// �ּҸ� ������ �迭
$addresses = array();

$fh = fopen('addresses.txt','rb');
if (! $fh) {
    die("addresses.txt ������ �� �� �����ϴ�: $php_errormsg");
}
while ((! feof($fh)) && ($line = fgets($fh))) {
    $line = trim($line);
    // �ּҸ� $addresses �迭�� Ű�� ����Ѵ�.
    // Ű�� �Ҵ�� ���� �ش� �ּҸ� �߰��� ȸ����.
    if (! isset($addresses[$line])) {
        $addresses[$line] = 0;
    }
    $addresses[$line] = $addresses[$line] + 1;
}
if (! fclose($fh)) {
    die("addresses.txt ������ ������ �� �����ϴ�: $php_errormsg");
}
// $addresses �迭�� ���� �������� ū ������ ������������ �����Ѵ�.
arsort($addresses);

$fh = fopen('addresses-count.txt','wb');
if (! $fh) {
    die("addresses-count.txt ������ �� �� �����ϴ�: $php_errormsg");
}
foreach ($addresses as $address => $count) {
    // �� �������� ���� ���ڸ� �߰��Ѵ�.
    if (fwrite($fh, "$count,$address\n") === false) {
        die("$count,$address �� ����� �� �����ϴ�: $php_errormsg");
    }
}
if (! fclose($fh)) {
    die("addresses-count.txt ������ ������ �� �����ϴ�: $php_errormsg");
}