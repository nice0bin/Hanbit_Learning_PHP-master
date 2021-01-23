<table>
<tr><th>City</th><th>Population</th></tr>
<?php
// $census�� �� ���Ҵ� ���ø�, �Ҽ� ��, �α� ����
// �� ���� ���Ҹ� ���� �迭�̴�.
$census = [ ['Suwon', 'GG', 1194313],
            ['Changwon', 'GN', 1059241],
            ['Goyang', 'GG', 990073],
            ['Yongin', 'GG', 971327],
            ['Cheongju', 'CB', 833276],
            ['Jeonju', 'JB', 658172],
            ['Cheonan', 'CN', 629062],
            ['Gimhae', 'GN', 534124],
            ['Pohang', 'GB', 511804],
            ['Jinju', 'GN', 349788] ];

$total = 0;
$state_totals = array();
foreach ($census as $city_info) {
    // �� �α� ���� ���Ѵ�.
    $total += $city_info[2];
    // ó�� ���� ����
    // �� �α� ���� 0���� �ʱ�ȭ�Ѵ�.
    if (! array_key_exists($city_info[1], $state_totals)) {
        $state_totals[$city_info[1]] = 0;
    }
    // ���� �� �α� ���� ���Ѵ�.
    $state_totals[$city_info[1]] += $city_info[2];
    print "<tr><td>$city_info[0], $city_info[1]</td><td>$city_info[2]</td></tr>\n";
}
print "<tr><td>�հ�</td><td>$total</td></tr>\n";
// ���� �� �α� ���� ����Ѵ�
foreach ($state_totals as $state => $population) {
    print "<tr><td>$state</td><td>$population</td></tr>\n";
}
print "</table>";