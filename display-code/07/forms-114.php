$sweets = array('puff' => '���� ����',
                'square' => '���ڳ� ���� ����',
                'cake' => '�漳�� ����ũ',
                'ricemeat' => '���� ���');

print '<select name="sweet">';
// $option�� option�� ��, $label�� ǥ�� �޴����̴�.
foreach ($sweets as $option => $label) {
    print '<option value="' .$option .'"';
    if ($option == $defaults['sweet']) {
        print ' selected';
    }
    print "> $label</option>\n";
}
print '</select>';