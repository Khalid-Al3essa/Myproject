<?php 
include './inc/db.php';
include './inc/form.php';


$sql = 'SELECT * FROM user ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>خالد نايف العيسى</title>
</head>
<body>
    



<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto">
      <h1 class="display-4 fw-normal">أربح معنا !</h1>
      <p class="lead fw-normal">باقي على فتح التسجيل</p>
      <h3 id="countdown"></h3>
      <p class="lead fw-normal"> سجل بياناتك في الدوره للدخول في السحب المبدئي و بيكون فيه جائزه إضافيه عند إكمال الدوره .</p>
    </div>
  </div>

<div class="container text-center">
    <ul class="list-group list-group-flush">
      <li class="list-group-item text-center">--تعليمات--</li>
      <li class="list-group-item"><b>شرط الدخول في السحب :</b></li>
      <li class="list-group-item">التواجد و متابعة البث المباشر للدورة التدريبية, حيث سيتم اختيار الفائزين مباشرة خلال البث.</li>
      <li class="list-group-item">التسجيل ببريدك الإلكتروني الصحيح لنتمكن من التواصل مع الفائز.</li>
      <li class="list-group-item">إكمال التطبيق العملي المرفق في نهاية الدوره التدريبية.</li>
    </ul>
</div>

<div class="container">
<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">

<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <h3>الرجاء أدخل معلوماتك</h3>
  <div class="mb-3">
    <label for="firstname" class="form-label">الأسم الأول</label>
    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname ?>">
    <div class="form-text error"><?php echo $errors['firstnameError'] ?? ''; ?></div>
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">الأسم الأخير</label>
    <input type="text" name="lastname"  id="lastname" class="form-control"value="<?php echo $lastname ?>">
    <div class="form-text error"><?php echo $errors['lastnameError'] ?? ''; ?></div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">البريد الإلكتروني</label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
    <div class="form-text error"><?php echo $errors['emailError'] ?? ''; ?></div>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">إرسال المعلومات</button>
</form>
    </div>
  </div>
</div>

<div class="loader-con">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<!-- Button trigger modal -->
 <div class="d-grid gap-2 col-6 mx-auto my-5">
<button type="button" id="winner" class="btn btn-primary">
 إختيار الفائز
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
         
        <h5 class="modal-title" id="modalLabel">الفائز بالسحب</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <?php foreach ($user as $users) : ?>
        <h1 class="display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($users['firstname']) . ' ' . htmlspecialchars($users['lastname']); ?></h1>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

<!--
<div id="cards" class="row mb-5 pb-5">


        <div class="col-sm-6">
            <div class="card my-2 bg-light">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"><?php echo htmlspecialchars($users['email']); ?></p>
                </div>
            </div>
        </div>

</div>
         -->
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
  <script src="./js/script.js"></script>
</body>
</html>

<?php  include './inc/db_close.php'; ?>