$row_styles = array('even','odd');
$dinner = array('����Ʈ�ܰ� �ƽ��Ķ�Ž�',
                '���� ġŲ',
                '���� ���¹���');
print "<table>\n";

for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print '<tr class="' . $row_styles[$i % 2] . '">';
    print "<td>���� $i</td><td>$dinner[$i]</td></tr>\n";
}
print '</table>';
