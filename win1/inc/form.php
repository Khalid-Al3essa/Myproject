<?php

$firstname = '';
$lastname  = '';
$email     = '';

$errors = [
    'firstnameError' => '',
    'lastnameError'  => '',
    'emailError'     => '',
];

if (isset($_POST['submit'])) {

    // 1. أخذ البيانات وتنظيف المسافات الزائدة أولاً
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');

    // 2. التحقق من صحة المدخلات (Validation)
    if (empty($firstname)) {
        $errors['firstnameError'] = 'يرجى إدخال الأسم الأول';
    }

    if (empty($lastname)) {
        $errors['lastnameError'] = 'يرجى إدخال الأسم الأخير';
    }

    if (empty($email)) {
        $errors['emailError'] = 'يرجى إدخال البريد الالكتروني';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'يرجى إدخال بريد إلكتروني صحيح';
    }

    // 3. التنفيذ فقط إذا كانت جميع الأخطاء فارغة
    if (!array_filter($errors)) {

        // حماية البيانات قبل إدخالها لقاعدة البيانات
        $firstname_db = mysqli_real_escape_string($conn, $firstname);
        $lastname_db  = mysqli_real_escape_string($conn, $lastname);
        $email_db     = mysqli_real_escape_string($conn, $email);

        $sql = "INSERT INTO user(firstname, lastname, email) 
                VALUES ('$firstname_db', '$lastname_db', '$email_db')";

        if (mysqli_query($conn, $sql)) {
            // إعادة التوجيه بدون مسافة زائدة لتفريغ الفورم
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo 'Error : ' . mysqli_error($conn);
        }
    }
}