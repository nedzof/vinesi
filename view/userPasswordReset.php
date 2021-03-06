<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 21:28
 */

use view\TemplateView;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinesi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="container" style="display:flex;flex-direction:column;justify-content:center;">
    <div class="page-header">
        <h2 class="text-center"><strong>Oops, I forgot my password.</strong></h2></div>
    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/reset" method="post">
        <input type="hidden" name="token" value="<?php echo TemplateView::noHTML($this->token); ?>"/>
        <div class="form-group <?php echo isset($this->userValidator) && $this->userValidator->isPasswordError() ? "has-error" : ""; ?>">
            <input class="form-control" type="password" name="password" placeholder="Password">
            <p class="help-block"><?php echo isset($this->userValidator) && $this->userValidator->isPasswordError() ? $this->userValidator->getPasswordError() : ""; ?></p>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Reset</button>
        </div>
    </form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>
