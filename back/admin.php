<style>
        .modal {
        /* text-align: center; */
        display: none;
        position: fixed;
        z-index: 99;
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: right;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 20% auto;
        padding: 10px;
        border: 1px solid #888;
        width: 50%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<div >
    <p class="fs-3 text-center pb-3">管理者帳號管理</p>
    <form class="form-control" method="post" action="./api/edit.php">  <!-- ?表示是當前的檔案 -->
        <table class="table text-center align-middle" width="100%">
            <tbody>
                <tr>
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                  <!-- 將資料顯示在畫面上 -->
                  <?php
                $rows = $DB->all();
                foreach ($rows as $row) {
                ?>
                    <tr class="text-center">
                        <td >
                            <input class="form-control" type="text" name="acc[]" value="<?= $row['acc'];?>">
                            <input type="hidden" name="id[]"  value="<?=$row['id'];?>">
                        </td>
                        <td >
                            <input class="form-control" type="password" name="pw[]" value="<?=$row['pw'];?>">
                        </td>
                        <td >
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?=$row['id']; ?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td width="200px">
                        <input class="btn btn-primary btn-lg add-btn" type="button" data-table="<?= $do; ?>" value="新增管理者帳號">
                    </td>
                    <td class="cent">
                        <input class="btn btn-dark btn-lg" type="submit" value="修改確定">
                        <input class="btn btn-dark btn-lg" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php include_once "./api/modal.php" ?>
