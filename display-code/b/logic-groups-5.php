/* dechex() �Լ��� ����Ѵ�. */
function web_color1($red, $green, $blue) {
    $hex = [ dechex($red), dechex($green), dechex($blue) ];
// ��ȯ�� 16������ 1�ڸ� ����� �տ� 0�� ���δ�.
    foreach ($hex as $i => $val) {
        if (strlen($i) == 1) {
            $hex[$i] = "0$val";
        }
    }
    return '#' . implode('', $hex);
}
/* sprintf() �Լ��� %x ���� ���ڿ��� �����
16������ 10������ �ٲ� �� �ִ�. */
function web_color2($red, $green, $blue) {
    return sprintf('#%02x%02x%02x', $red, $green, $blue);
}