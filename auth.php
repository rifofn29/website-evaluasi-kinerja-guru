<?php
if (isset($_SESSION['login_rifo']) != true) {
    if ($page == "Login") {
        # code...
        include 'app/view/page/auth/login.php';
    } else {
        # code...
        echo $fungsi->Redirect('?a=Login');
    }
} else {
    # code...
    echo $fungsi->Redirect('?p=Dashboard');
}
