$meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50,
               'Shrimp Puffs' => 0);
$books = array("�̿밴�� ���� A�� �߱��� �ȳ� ",
               '�߱��� �丮 ��İ� �Ļ� ��ȭ');

// Dried Mulberries Ű�� ���� 3.00�̹Ƿ� �� ������ ���̴�.
if (in_array(3, $meals)) {
    print '������ $3�� �޴��� �ֽ��ϴ�.';
}
// �� ���ǵ� ���̴�.
if (in_array('�߱��� �丮 ��İ� �Ļ� ��ȭ', $books)) {
    print "�߱��� �丮 ��İ� �Ļ� ��ȭ�� ���� �� �ֽ��ϴ�.";
}
// in_array() �� ��ҹ��ڸ� �����ϹǷ� �� ������ �����̴�.
if (in_array("�̿밴�� ���� a�� �߱��� �ȳ�", $books)) {
    print "�̿밴�� ���� A�� �߱��� �ȳ��� ���� �� �ֽ��ϴ�.";
}