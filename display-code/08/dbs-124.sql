; ������ 5.00���� ū �޴�
SELECT dish_name, price FROM dishes WHERE price > 5.00

; �޴����� ��Ȯ�� "ȣ�� ��"�� �޴�
SELECT price FROM dishes WHERE dish_name = 'ȣ�� ��'

; ������ 5.00���� ũ�� 10.00 ������ �޴�
SELECT dish_name FROM dishes WHERE price > 5.00 AND price <= 10.00

; ������ 5.00���� ũ�� 10.00 ���ϰų�,
; �޴����� ��Ȯ�� "ȣ�� ��"�� �޴� (���ݿ� ���� ����)
SELECT dish_name, price FROM dishes WHERE (price > 5.00 AND price <= 10.00)
     OR dish_name = 'ȣ�� ��'
