<?php

$c = curl_init('http://numbersapi.com/09/27');
// cURL�� ������ ������ �ٷ� ������� �ʰ�
// ���ڿ��� ���������� �����Ѵ�.
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
// ��û ����
$fact = curl_exec($c);

?>
Did you know that <?= $fact ?>