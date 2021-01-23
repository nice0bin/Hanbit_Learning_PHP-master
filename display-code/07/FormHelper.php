class FormHelper {
    protected $values = array();

    public function __construct($values = array()) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->values = $_POST;
        } else {
            $this->values = $values;
        }
    }

    public function input($type, $attributes = array(), $isMultiple = false) {
        $attributes['type'] = $type;
        if (($type == 'radio') || ($type == 'checkbox')) {
            if ($this->isOptionSelected($attributes['name'] ?? null,
                                        $attributes['value'] ?? null)) {
                $attributes['checked'] = true;
            }
        }
        return $this->tag('input', $attributes, $isMultiple);
    }

    public function select($options, $attributes = array()) {
        $multiple = $attributes['multiple'] ?? false;
        return
            $this->start('select', $attributes, $multiple) .
            $this->options($attributes['name'] ?? null, $options) .
            $this->end('select');
    }

    public function textarea($attributes = array()) {
        $name = $attributes['name'] ?? null;
        $value = $this->values[$name] ?? '';
        return $this->start('textarea', $attributes) .
               htmlentities($value) .
               $this->end('textarea');
    }

    public function tag($tag, $attributes = array(), $isMultiple = false) {
        return "<$tag {$this->attributes($attributes, $isMultiple)} />";
    }
    public function start($tag, $attributes = array(), $isMultiple = false) {
    // <select>�� <textarea> �±״� value �Ӽ��� ����.
        $valueAttribute = (! (($tag == 'select')||($tag == 'textarea')));
        $attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
        return "<$tag $attrs>";
    }
    public function end($tag) {
        return "</$tag>";
    }

    protected function attributes($attributes, $isMultiple,
                                  $valueAttribute = true) {
        $tmp = array();
        // ���� �±׿�n ame�� value �Ӽ��� �ְ�
        // $this->values �迭�� name �Ӽ��� �ش��ϴ� ���Ұ� ������
        // value �Ӽ��� �����Ѵ�.
        if ($valueAttribute && isset($attributes['name']) &&
            array_key_exists($attributes['name'], $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        foreach ($attributes as $k => $v) {
            // v$�� true�� ���� ���� �ʴ� �Ӽ��̹Ƿ� �Ӽ��� �߰��Ѵ�.
            if (is_bool($v)) {
                if ($v) { $tmp[] = $this->encode($k); }
            }
            // �׷��� ������k =v ���·� �߰��Ѵ�.
            else {
                $value = $this->encode($v);
                // ���� ���� ������ �� �ִ� ��
                // name�� []�� ���δ�.
                if ($isMultiple && ($k == 'name')) {
                    $value .= '[]';
                }
                $tmp[] = "$k=\"$value\"";
            }
        }
        return implode(' ', $tmp);
    }

    protected function options($name, $options) {
        $tmp = array();
        foreach ($options as $k => $v) {
            $s = "<option value=\"{$this->encode($k)}\"";
            if ($this->isOptionSelected($name, $k)) {
                $s .= ' selected';
            }
            $s .= ">{$this->encode($v)}</option>";
            $tmp[] = $s;
        }
        return implode('', $tmp);
    }

    protected function isOptionSelected($name, $value) {
        // $this->values �迭�� $name�� �ش��ϴ� �׸��� ������
        // �� option �� ���õ� �� ����.
        if (! isset($this->values[$name])) {
            return false;
        }
        // $this->values �迭�� $name�� �ش��ϴ� �׸��� �ְ�
        // �� ���� �迭�̸�, �迭 ���� �߿� v$alue�� �ִ��� Ȯ���Ѵ�.
        else if (is_array($this->values[$name])) {
            return in_array($value, $this->values[$name]);
        }
        // �׷��� ������, v$alue�� $this->values �迭�� $name �׸��� ���Ѵ�.
        else {
            return $value == $this->values[$name];
        }
    }

    public function encode($s) {
        return htmlentities($s);
    }
}