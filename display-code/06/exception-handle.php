try {
    $drink = new Entree('���� �� ��', '����');
    if ($drink->hasIngredient('����')) {
        print "���־�!";
    }
} catch (Exception $e) {
    print "���Ḧ �غ��� �� �����ϴ�: " . $e->getMessage();
}
