<?php
    if(isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong></strong> <?= $_SESSION['message']; ?>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>

    </div>
    

<?php 
    unset($_SESSION['message']);
    endif;
?>


