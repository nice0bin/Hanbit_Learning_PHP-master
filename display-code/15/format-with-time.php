// �ð��� �Է��ϸ� ��¥�� ������ ��/��/������ �����ȴ�.
$a = new DateTime('10:36 am');
// ��¥�� �Է��ϸ� �ð��� ������ ��/��/�ʷ� �����ȴ�.
$b = new DateTime('5/11');
$c = new DateTime('March 5th 2017');
$d = new DateTime('3/10/2018');
$e = new DateTime('2015-03-10 17:34:45');
// DateTime�� �鸸���� ���� �������� ������ �� �ִ�.
$f = new DateTime('2015-03-10 17:34:45.326425');
// @�� �����ϴ� ���ڴ� ���н� Ÿ�ӽ������� �ν��Ѵ�.
$g = new DateTime('@381718923');
// �Ϲ����� �α� ����
$h = new DateTime('3/Mar/2015:17:34:45 +0400');

// ������� ǥ���� ����� �� �ִ�!
$i = new DateTime('next Tuesday');
$j = new DateTime("last day of April 2015");
$k = new DateTime("November 1, 2012 + 2 weeks");