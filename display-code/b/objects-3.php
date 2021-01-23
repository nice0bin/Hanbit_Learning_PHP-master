class PricedEntree extends Entree {
    public function __construct($name, $ingredients) {
        parent::__construct($name, $ingredients);
        foreach ($this->ingredients as $ingredient) {
            if (! $ingredient instanceof Ingredient) {
                throw new Exception('$ingredients�� ���Ҵ� Ingredient ��ü���� �մϴ�.');
            }
        }
    }

    public function getCost() {
        $cost = 0;
        foreach ($this->ingredients as $ingredient) {
            $cost += $ingredient->getCost();
        }
        return $cost;
    }
}