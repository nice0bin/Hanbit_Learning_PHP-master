print '<input type="checkbox" name="delivery" value="yes"';
if ($defaults['delivery'] == 'yes') { print ' checked'; }
print '> ��� �ֹ��̽Ű���?';

$checkbox_options = array('small' => '��',
                          'medium' => '��',
                          'large' => '��');

foreach ($checkbox_options as $value => $label) {
    print '<input type="radio" name="size" value="'.$value.'"';
    if ($defaults['size'] == $value) { print ' checked'; }
    print "> $label ";
}