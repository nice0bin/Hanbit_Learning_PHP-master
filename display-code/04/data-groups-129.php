$meals = array('Walnut Bun' => 1,
               'Cashew Nuts and White Mushrooms' => 4.95,
               'Dried Mulberries' => 3.00,
               'Eggplant with Chili Sauce' => 6.50);

foreach ($meals as $dish => $price) {
// $price = $price * 2 ������ ȿ���� ����.
    $meals[$dish] = $meals[$dish] * 2;
}

// �ٽ� �ѹ� �迭�� ��ȸ�ϸ� ����� ���� ����Ѵ�.
foreach ($meals as $dish => $price) {
    printf("%s �޴��� ����� ������ \$%.2f�Դϴ�.\n",$dish,$price);
}