    // �� �ڵ�� "class FormHelper" ���� ������ ����.
    // ���� �迭�� ���Ҹ� Ư���ϰ� � �Ӽ��� � ���� ������� �����Ѵ�.
    protected $allowedAttributes = ['button' => ['type' => ['submit',
                                                            'reset',
                                                            'button' ] ] ];


    // tag()�� ���� $this->attributes()�� ù ��° �μ��� $tag�� �����Ѵ�.
    public function tag($tag, $attributes = array(), $isMultiple = false) {
        return "<$tag {$this->attributes($tag, $attributes, $isMultiple)} />";
    }

    // start() ���� $this->attributes()�� ù ��° �μ��� $tag�� �����ϵ��� ��ģ��.
    public function start($tag, $attributes = array(), $isMultiple = false) {
        // <select>�� <textarea> �±״� value �Ӽ��� ����.
        $valueAttribute = (! (($tag == 'select')||($tag == 'textarea')));
        $attrs = $this->attributes($tag, $attributes, $isMultiple,
                                   $valueAttribute);
        return "<$tag $attrs>";
    }


    // attributes()�� $tag�� ù ��° �μ��� ���޹ް�,
    // $this->allowedAttributes�� ���� �Ӽ��̸� $attributeCheck�� �����Ѵ�.
    // ���� �Ӽ��� ���ǵǸ� ������ ���� ����,
    // ���� ���� �ƴ϶�� ���ܸ� �߻���Ų��.
    protected function attributes($tag, $attributes, $isMultiple,
                                  $valueAttribute = true) {
        $tmp = array();
        // �� tag�� value �Ӽ��� �ְ�,
        // name�� �ش��ϴ� ���� values �迭�� ������
        // value �Ӽ��� �����Ѵ�.
        if ($valueAttribute && isset($attributes['name']) &&
            array_key_exists($attributes['name'], $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        if (isset($this->allowedAttributes[$tag])) {
            $attributeCheck = $this->allowedAttributes[$tag];
        } else {
            $attributeCheck = array();
        }
        foreach ($attributes as $k => $v) {
            // �Ӽ��� ���� ���ƴ��� Ȯ���Ѵ�.
            if (isset($attributeCheck[$k]) &&
                (! in_array($v, $attributeCheck[$k]))) {
                throw new InvalidArgumentException("$v �� $k �� ������ �ʴ� ���Դϴ�");
            }
            // �� ���� �Ҹ��� �Ӽ��� �ǹ��Ѵ�.
            if (is_bool($v)) {
                if ($v) { $tmp[] = $this->encode($k); }
            }
            // �׷��� ������k =v ���·� ǥ���Ѵ�.
            else {
                $value = $this->encode($v);
                // ���� ���� ������ ���Ҷ��,
                //n ame �� �ڿ� []�� ���δ�.
                if ($isMultiple && ($k == 'name')) {
                    $value .= '[]';
                }
                $tmp[] = "$k=\"$value\"";
            }
        }
        return implode(' ', $tmp);
    }