function payment_method($cash_on_hand, $amount) {
    if ($amount > $cash_on_hand) {
        return '�ſ�ī��';
    } else {
        return '����';
    }
}