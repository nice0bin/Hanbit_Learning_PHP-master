public function testTipShouldIncludeTax() {
    $meal = 100;
    $tax = 10;
    $tip = 10;
    // 4��° �μ��� true�� �ΰ��� ���� �ݾ��� �������� ���� ����Ѵ�.
    $result = restaurant_check($meal, $tax, $tip, true);
    $this->assertEquals(121, $result);
}

public function testTipShouldNotIncludeTax() {
    $meal = 100;
    $tax = 10;
    $tip = 10;
    // 4��° �μ��� false�� �ΰ��� ���� �ݾ��� �������� ���� ����Ѵ�.
    $result = restaurant_check($meal, $tax, $tip, false);
    $this->assertEquals(120, $result);
}