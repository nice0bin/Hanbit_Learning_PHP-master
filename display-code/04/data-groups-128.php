$row_styles = array('even','odd');
$style_index = 0;
$meal = array('breakfast' => 'ȣ�� ��',
              'lunch' => 'ĳ����Ʈ�� ����̹���',
              'snack' => '���� ����',
              'dinner' => 'ĥ�� �ҽ� ���� ����');
print "<table>\n";
foreach ($meal as $key => $value) {
    print '<tr class="' . $row_styles[$style_index] . '">';
    print "<td>$key</td><td>$value</td></tr>\n";
// $style_index ������ 0�� 1�� ������ �����Ѵ�.
    $style_index = 1 - $style_index;
}
print '</table>';
