$now = new DateTime();
$birthdate = new DateTime('1990-05-12');
$diff = $birthdate->diff($now);

if (($diff->y > 13) && ($diff->invert == 0)) {
    print "13�� �̻��Դϴ�.";
} else {
    print "���� �����Դϴ�.";
}