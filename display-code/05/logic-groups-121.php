// ������ �μ��� �ϳ��� ��. ������ �μ����� �Ѵ�.
function page_header5($color, $title, $header = '�������') {
    print '<html><head><title>' . $title . '�� ���� ���� ȯ���մϴ�.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// �ùٸ� ȣ�� ���
page_header5('66cc99','���� ���� Ȩ������'); // $header�� �⺻���� ����Ѵ�.
page_header5('66cc99','���� ���� Ȩ������','Ȩ������ �ְ���!'); // �⺻���� ������� �ʴ´�.

// ������ �μ��� �� ���� ��. ������ �� �μ��� �����ؾ� �Ѵ�.
function page_header6($color, $title = '���� Ȩ������', $header = '�������') {
    print '<html><head><title>' . $title . '�� ���� ���� ȯ���մϴ�.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// �ùٸ� ȣ�� ���
page_header6('66cc99'); // $title�� $header�� �⺻���� ����Ѵ�.
page_header6('66cc99','���� ���� Ȩ������ '); // $header�� �⺻���� ����Ѵ�.
page_header6('66cc99','���� ���� Ȩ������ ','Ȩ������ �ְ���!'); // �⺻���� ������� �ʴ´�.

// �μ��� ��� �������� ��
function page_header7($color = '336699', $title = '���� Ȩ������', $header = '�������') {
    print '<html><head><title>' . $title . '�� ���� ���� ȯ���մϴ�.</title></head>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}

// �ùٸ� ȣ�� ���
page_header7(); // ��� �⺻���� ����Ѵ�.
page_header7('66cc99'); // $title�� $header�� �⺻���� ����Ѵ�.
page_header7('66cc99','���� ���� Ȩ������'); // $header�� �⺻���� ����Ѵ�.
page_header7('66cc99','���� ���� Ȩ������','Ȩ������ �ְ���!'); // �⺻���� ������� �ʴ´�.