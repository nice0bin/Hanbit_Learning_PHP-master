// ���� ������ ���
$soup = new Entree('�߰�� ����', array('�߰��', '��'));

// ������ġ ������ ���
$sandwich = new Entree('�߰�� ������ġ', array('�߰��', '��'));

// ��Ʈ �޴�
$combo = new ComboMeal('���� + ������ġ', array($soup, $sandwich));

foreach (['�߰��','��','��Ŭ'] as $ing) {
    if ($combo->hasIngredient($ing)) {
        print "��Ʈ �޴��� ���� ���: $ing.\n";
    }
}