$specials = array( array('ü��Ʈ�� ��', 'ȣ�� ��', '���� ��'),
                   array('ü��Ʈ�� ������','ȣ�� ������', '���� ������') );

// $num_specials�� $specials�� ù ��° ������ ������ �����̹Ƿ� 2��.
for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
// $num_sub�� �� �����迭�� ������ �����̹Ƿ� 3�̴�.
    for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
        print "Element [$i][$m]�� " . $specials[$i][$m] . "�Դϴ�.\n";
    }
}