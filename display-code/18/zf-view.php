<p>���� �ð� <?php echo $when->format("g:i a") ?>, �ֹ� ���� �޴�</p>
<ul>
<?php foreach ($what as $item) { ?>
<li><?php echo $this->escapeHtml($item) ?></li>
<?php } ?>
</ul>