// ���ݺ��� �ѽð� ���� ����Ǵ� ��Ű
setcookie('short-userid','ralph',time( ) + 60*60);

// ���ݺ��� 24�ð� ���� ����Ǵ� ��Ű
setcookie('longer-userid','ralph',time( ) + 60*60*24);

// 2019�� 10�� 1�� ������ ����Ǵ� ��Ű
$d = new DateTime("2019-10-01 12:00:00");
setcookie('much-longer-userid','ralph', $d->format('U'));