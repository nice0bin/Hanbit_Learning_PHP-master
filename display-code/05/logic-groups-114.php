$dinner = '����¡�� ī��';

function hungry_dinner() {
    $GLOBALS['dinner'] .= ' �׸��� �ٽ� ���� ���';
}

print "�Ϲ� ���� �޴��� $dinner �Դϴ�.";
print "\n";
hungry_dinner();
print "���� Ư�� �޴��� $dinner �Դϴ�.";