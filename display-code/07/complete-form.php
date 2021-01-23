<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
    <tr>
        <td>���� �׸��� �������ּ���.:</td>
        <td><ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $form->encode($error) ?></li>
            <?php } ?>
        </ul></td>
    <?php } ?>

    <tr><td>�̸�:</td><td><?= $form->input('text', ['name' => 'name']) ?></td></tr>

    <tr><td>ũ��:</td>
        <td><?= $form->input('radio',['name' => 'size', 'value' => 'small']) ?> �� <br/>
            <?= $form->input('radio',['name' => 'size', 'value' => 'medium']) ?> �� <br/>
            <?= $form->input('radio',['name' => 'size', 'value' => 'large']) ?> �� <br/>
        </td></tr>

    <tr><td>����Ʈ�� �������ּ���.:</td>
        <td><?= $form->select($GLOBALS['sweets'], ['name' => 'sweet']) ?></td>
    </tr>

    <tr><td>�� �޴��� �ΰ��� �������ּ���.:</td>
        <td><?= $form->select($GLOBALS['main_dishes'], ['name' => 'main_dish',
                'multiple' => true]) ?></td>
    </tr>

    <tr><td>��� �ֹ��̽Ű���?</td>
        <td><?= $form->input('checkbox',['name' => 'delivery',
                                         'value' => 'yes'])
            ?> ��. </td></tr>

    <tr><td>�����Ͻ� ������ ������ �޸� �����ּ���.<br/>
        ��� �ֹ��̽� ��쿡�� �ּҸ� �����ּ���.:</td>
        <td><?= $form->textarea(['name' => 'comments']) ?></td></tr>

    <tr><td colspan="2" align="center">
    <?= $form->input('submit', ['value' => '�ֹ�']) ?>
    </td></tr>

</table>
</form>
