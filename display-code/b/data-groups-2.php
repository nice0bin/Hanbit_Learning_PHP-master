$census = ['Suwon, GG' => 1194313,
           'Changwon, GN' => 1059241,
           'Goyang, GG' => 990073,
           'Yongin, GG' => 971327,
           'Cheongju, CB' => 833276,
           'Jeonju, JB' => 658172,
           'Cheonan, CN' => 629062,
           'Gimhae, GN' => 534124,
           'Pohang, GB' => 511804,
           'Jinju, GN' => 349788];

// ���� �������� ���� �迭�� �����Ѵ�.
asort($census);

print "<table>\n";
print "<tr><th>����</th><th>�α�</th></tr>\n";
$total = 0;
foreach ($census as $city => $population) {
    $total += $population;
    print "<tr><td>$city</td><td>$population</td></tr>\n";
}
print "<tr><td>�հ�</td><td>$total</td></tr>\n";
print "</table>";

// Ű�� �������� ���� �迭�� �����Ѵ�.
ksort($census);

print "<table>\n";
print "<tr><th>����</th><th>�α�</th></tr>\n";

$total = 0;
foreach ($census as $city => $population) {
    $total += $population;
    print "<tr><td>$city</td><td>$population</td></tr>\n";
}
print "<tr><td>�հ�</td><td>$total</td></tr>\n";
print "</table>";
