function countdown($top) {
    while ($top > 0) {
        print "$top..";
        $top--;
    }
    print "��!\n";
}

$counter = 5;
countdown($counter);
print "counter�� ��: $counter";