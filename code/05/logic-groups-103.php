<?php
// 음식가격은 $15.22, 부가세는 8.25%, 팁은 15%일 때 총금액 구하기
$total = restaurant_check(15.22, 8.25, 15);

print '수중에 현금이 총 $20이니까...';
if ($total > 20) {
    print "신용카드로 결제해야 돼.";
} else {
    print "현금으로 낼 수 있어.";
}