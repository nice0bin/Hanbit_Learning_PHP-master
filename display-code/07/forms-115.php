$main_dishes = array('cuke' => '��ģ �ػ�',
                     'stomach' => '����',
                     'tripe' => '���� �ҽ� ���â',
                     'taro' => '������� �����',
                     'giblets' => '��â �ұ� ����',
                     'abalone' => '���� ȣ�� ����');

print '<select name="main_dish[]" multiple>';

$selected_options = array();
foreach ($defaults['main_dish'] as $option) {
    $selected_options[$option] = true;
}

// <option> �±� ���
foreach ($main_dishes as $option => $label) {
    print '<option value="' . htmlentities($option) . '"';
    if (array_key_exists($option, $selected_options)) {
        print ' selected';
    }
    print '>' . htmlentities($label) . '</option>';
    print "\n";
}
print '</select>';