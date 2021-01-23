$hamburger = 4.95;
$shake = 1.95;
$cola = 0.85;

$tip_rate = 0.16;
$tax_rate = 0.075;

$food = (2 * $hamburger) + $shake + $cola;
$tip = $food * $tip_rate;
$tax = $food * $tax_rate;

$total = $food + $tip + $tax;
printf("%-9s \$%.2f %d��: \$%5.2f\n", '�ܹ���', $hamburger, 2, 2 * $hamburger);
printf("%-9s \$%.2f %d��: \$%5.2f\n", '����ũ', $shake, 1, $shake);
printf("%-9s \$%.2f %d��: \$%5.2f\n", '�ݶ�', $cola, 1, $cola);
printf("%25s: \$%5.2f\n", '���� ���� �հ�', $food);
printf("%25s: \$%5.2f\n", '���� ����, �ΰ��� �հ�', $food + $tax);
printf("%25s: \$%5.2f\n", '���� ����, �ΰ���, �� �հ�', $total);