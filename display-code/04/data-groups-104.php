$meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50,
               'Shrimp Puffs' => 0); // Shrimp Puffs �� ����!
$books = array("�̿밴�� ���� A�� �߱��� �ȳ�",
               '�߱��� �丮 ��İ� �Ļ� ��ȭ');

// ���� ���ǽ��� ���̴�.
if (array_key_exists('Shrimp Puffs',$meals)) {
    print "��, Shrimp Puffs �޴��� �����մϴ�.";
}
// ���� ���ǽ��� �����̴�.
if (array_key_exists('Steak Sandwich',$meals)) {
    print "Steak Sandwich �޴��� �ֽ��ϴ�.";
}
// ���� ���ǽ��� ���̴�.
if (array_key_exists(1, $books)) {
    print "1�� ���Ҵ� �߱��� �丮 ��İ� �Ļ� ��ȭ�Դϴ�.";
}