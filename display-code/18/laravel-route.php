Route::get('/show', function() {
    $now = new DateTime();
    $items = [ "���� Ƣ��", "�� ����", "���� ����" ];
    return view('show-menu', [ 'when' => $now,
                               'what' => $items ]);
});