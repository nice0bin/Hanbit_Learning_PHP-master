<?php
function countdown(int $top) {
    while ($top > 0) {
        print "$top..";
        $top--;
    }
    print "펑!\n";
}
