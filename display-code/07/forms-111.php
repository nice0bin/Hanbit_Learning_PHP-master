if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $defaults = $_POST;
} else {
    $defaults = array('delivery' => '����',
                      'size' => '��',
                      'main_dish' => array('���','���â'),
                      'sweet' => '����ũ');
}
