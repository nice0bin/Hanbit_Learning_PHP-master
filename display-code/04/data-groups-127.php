$meal = array('breakfast' => 'ȣ�� ��',
              'lunch' => 'ĳ����Ʈ�� ����̹���',
              'snack' => '���� ����',
              'dinner' => 'ĥ�� �ҽ� ���� ����');
print "<table>\n";
foreach ($meal as $key => $value) {
    print "<tr><td>$key</td><td>$value</td></tr>\n";
}
print '</table>';