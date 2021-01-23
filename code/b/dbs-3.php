<?php

// 폼 헬퍼 클래스 불러오기
require 'FormHelper.php';

// 데이터베이스 접속
try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
    print "접속할 수 없습니다: " . $e->getMessage();
    exit();
}
// DB 오류 예외 설정
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 객체 방식으로 가져오기
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// 페이지의 주 로직:
// - 폼이 제출되면, 검증 과정을 수행하고 재표시한다.
// - 제출되지 않았으면 폼을 표시한다.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// validate_form()이 오류를 반환하면 show_form()으로 전달한다.
    list($errors, $input) = validate_form();
    if ($errors) {
        show_form($errors);
    } else {
        // 제출된 데이터가 올바르면, 처리한다.
        process_form($input);
    }
} else {
    // 폼이 제출되지 않았으면 폼을 표시한다.
    show_form();
}

function show_form($errors = array()) {
    global $db;

    // 우선시되는 기본값으로 $form 객체 생성
    $form = new FormHelper();

    // 메뉴 목록을 데이터베이스에서 가져오기
    $sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
    $stmt = $db->query($sql);
    $dishes = array();
    while ($row = $stmt->fetch()) {
        $dishes[$row->dish_id] = $row->dish_name;
    }

    // 폼을 표시하는 모든 HTML은 명확성을 위해 분리된 파일에 둔다.
    include 'dish-form.php';
}

function validate_form() {
    $input = array();
    $errors = array( );

    // dish_id 값이 제출되면 일단 정상으로 판단한다.
    // 해당하는 dish_id가 데이터베이스에 없으면
    // process_form()를 통해 dish_id 입력 요청 메시지를 출력한다.
    if (isset($_POST['dish_id'])) {
        $input['dish_id'] = $_POST['dish_id'];
    } else {
        $errors[] = '메뉴를 선택하세요.';
    }
    return array($errors, $input);
}

function process_form($input) {
    // 함수 내부에서 전역 변수 $db에 접근하기 위해 global로 선언한다.
    global $db;

// 쿼리 생성
    $sql = 'SELECT dish_id, dish_name, price, is_spicy FROM dishes WHERE
            dish_id = ?';

    // 데이터베이스 프로그램에 쿼리를 전송하고 결과 돌려받기
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['dish_id']));
    $dish = $stmt->fetch();

    if (count($dish) == 0) {
        print '발견된 메뉴가 없습니다.';
    } else {
        print '<table>';
        print '<tr><th>ID</th><th>메뉴명</th><th>가격</th>';
        print '<th>맵기</th></tr>';
        if ($dish->is_spicy == 1) {
            $spicy = 'Yes';
        } else {
            $spicy = 'No';
        }
        printf('<tr><td>%d</td><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
               $dish->dish_id,
               htmlentities($dish->dish_name), $dish->price, $spicy);
        print '</table>';
    }
}
?>
