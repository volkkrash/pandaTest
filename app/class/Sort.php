<?

class Sort {
  public $arItems = [];

  public $defaultItems = [
    0 => [
      'name' => 'name_desc',
      'row_name' => 'name',
      'sort' => 'DESC',
      'text' => 'По имени &#8595;',
      'selected' => false
    ],
    1 => [
      'name' => 'name_asc',
      'row_name' => 'name',
      'sort' => 'ASC',
      'text' => 'По имени &#8593;',
      'selected' => false
    ],
    2 => [
      'name' => 'email_desc',
      'row_name' => 'email',
      'sort' => 'DESC',
      'text' => 'По email &#8595;',
      'selected' => false
    ],
    3 => [
      'name' => 'email_asc',
      'row_name' => 'email',
      'sort' => 'ASC',
      'text' => 'По email &#8593;',
      'selected' => false
    ],
    4 => [
      'name' => 'status_desc',
      'row_name' => 'status',
      'sort' => 'DESC',
      'text' => 'По статусу &#8595;',
      'selected' => false
    ],
    5 => [
      'name' => 'status_asc',
      'row_name' => 'status',
      'sort' => 'ASC',
      'text' => 'По статусу &#8593;',
      'selected' => false
    ]
  ];

  public function __construct() {

    $this->setDefaultItems();

  }
 
  public function setDefaultItems() {

    $this->arItems = $this->defaultItems;

  }

  public function getItems() {
    return $this->arItems;
  }
}