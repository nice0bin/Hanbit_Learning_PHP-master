$dishes['Beef Chow Foon'] = 12;
$dishes['Beef Chow Foon']++;
$dishes['Roast Duck'] = 3;

$dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];

if ($dishes['total'] > 15) {
    print "���̵� �Ծ���";
}

print 'Beef Chow Foon �޴��� �� ' . $dishes['Beef Chow Foon'] . ' �׸� ��̽��ϴ�.';