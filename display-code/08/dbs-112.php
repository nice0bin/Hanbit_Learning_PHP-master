// �Ϻ� �丮�� ���� ����
$count = $db->exec("UPDATE dishes SET price = price + 5 WHERE price > 3");
print '�� ' . $count . '�� �޴��� ������ ����Ǿ����ϴ�.';