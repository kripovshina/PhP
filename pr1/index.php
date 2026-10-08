<?php
$users = [
    [
        "user_name"     => "Алексей",
        "user_age"      => 21,
        "user_login"    => "alex",
        "user_password" => "Alex@123"
    ],
    [
        "user_name"     => "Мария",
        "user_age"      => 19,
        "user_login"    => "maria",
        "user_password" => "Maria#456"
    ],
    [
        "user_name"     => "Иван",
        "user_age"      => 25,
        "user_login"    => "ivan",
        "user_password" => "Ivan_789"
    ]
];

$user_login    = "alex";
$user_password = "Alex@123";


function isWeakPassword($password) {
    if (strlen($password) < 8) {
        return true;
    }

    $specialChars = ['@', '&', '%', '#', '[', ']', '(', ')', '_', '!'];
    $hasSpecial = false;
    foreach ($specialChars as $char) {
        if (strpos($password, $char) !== false) {
            $hasSpecial = true;
            break;
        }
    }
    if (!$hasSpecial) {
        return true;
    }

    $hasDigit = false;
    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_digit($password[$i])) {
            $hasDigit = true;
            break;
        }
    }
    if (!$hasDigit) {
        return true;
    }

    return false;
}

$foundUser = null;

foreach ($users as $user) {
    if ($user["user_login"] === $user_login) {
        $foundUser = $user;
        break;
    }
}

if ($foundUser === null) {
    echo "Пользователь с таким логином не существует.";
} else {
    if ($foundUser["user_password"] !== $user_password) {
        echo "Некорректный пароль.";
    } else {
        echo "Имя пользователя: " . $foundUser["user_name"];
        echo "Возраст: " . $foundUser["user_age"];

        if (isWeakPassword($user_password)) {
            echo "Внимание! Пароль является слабым.";
        }
    }
}
?>
