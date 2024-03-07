<?php
    session_start();
?>
<!-- n'étant pas incluses dans le head, les deux lignes suivantes doivent rester, tout comme le dernier </html> -->
<!DOCTYPE html>
<html lang="fr">

<?php
    include_once __DIR__ ."/controller/head.inc.php";
?>
<body>
<?php
    include_once __DIR__ ."/controller/header.inc.php";
    include_once __DIR__ ."/controller/main.inc.php";
    include_once __DIR__ ."/controller/footer.inc.php";
?>
</body>
</html>