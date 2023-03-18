
<?php include '/components/head.php';
require '../dbcon.php';
?>



<body>
<?php include '../components/header.php';?>




<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt<?php $online_classe->meeting_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف {{$online_classe->topic}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="post">
                
                    <input type="hidden" name="id" value="<?php $online_classe->meeting_id;?>">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية الحذف ؟</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_online_classe" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include '../components/footer.php';?>

