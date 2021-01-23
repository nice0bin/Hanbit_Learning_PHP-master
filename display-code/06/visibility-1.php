class Entree {
    private $name;
    protected $ingredients = array();
    /* $name�� private�̹Ƿ� ���� ������ �ʿ��ϴ�. */
    public function getName() {
        return $this->name;
    }

    public function __construct($name, $ingredients) {
        if (! is_array($ingredients)) {
            throw new Exception('$ingredients�� �迭�� �ƴմϴ�.');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
}