<h3>新增管理者帳號
    <!-- <?=$_GET['table'];?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form class="form-control" action="./api/add.php" method="post" enctype="multipart/form-data">
    <table  class="table text-center align-middle">
        <tr class="fs-5">
            <td>帳號：</td>
            <td>
                <input class="form-control" type="text" name="acc" id="">
            </td>
        </tr>
        <tr>
            <td>密碼：</td>
            <td>
                <input class="form-control" type="password" name="pw" id="">
            </td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td>
                <input class="form-control" type="password" name="pw2" id="">
            </td>
        </tr>
       
    </table>

    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input class="btn btn-dark btn-lg" type="submit" value="新增">
        <input class="btn btn-dark btn-lg" type="reset" value="重置">
    </div>
</form>