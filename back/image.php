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
    <p class="fs-3 text-center pb-3">校園映像資料管理</p>
    <form class="form-control" method="post" action="./api/edit.php">  <!-- ?表示是當前的檔案 -->
        <table class="table text-center align-middle" width="100%">
            <tbody>
                <tr >
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td>更換動畫</td>
                </tr>
                <?php
                // $DB=${ucfirst($do)};改寫在db.php裡
                // $rows = $DB->all();
                /*處理分頁問題 _start*/
                $total = $DB->count(); // 計算資料庫的總筆數
                $div = 3;   //每一頁要放3筆資料
                $pages = ceil($total / $div);   // 總共需要幾頁
                $now = $_GET['p'] ?? 1; //目前頁面，透過$_GET[]的方式傳值=1
                $start = ($now - 1) * $div; //開始的值
                $rows = $DB->all("limit $start,$div");//每次撈從$start開始撈，撈$div=3筆
                /*處理分頁問題 _end*/  
                 foreach ($rows as $row) {  /* <!-- 將資料顯示在畫面上 --> */

                ?>
                    <tr>
                        <td >
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px;">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                       
                        <td >
                            <input class="form-check-input" type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td >
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?=$row['id']; ?>">
                        </td>
                        <td>
                            <input class="btn btn-secondary edit-btn" type="button" data-table="<?= $do; ?>" data-id="<?= $row['id']; ?>" value="更換動畫">
                        </td>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class='text-center'>
            <?php
            if($now>1){
                $prev=$now-1;//上一頁等於現在的頁數-1
                echo " <a href='?do=$do&p=$prev'><</a> ";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '24px' : '16px'; //當前的頁數等於i，字型變為24px
                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i <a/>";//印出超連結，並將字型變大
            }
            if($now<$pages){
                $next=$now+1; //下一頁等於現在的頁數+1
                echo " <a href='?do=$do&p=$next'> > </a> ";
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr class="text-center">
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td class="text-center"><input class="btn btn-primary btn-lg add-btn" type="button" data-table="<?= $do; ?>" value="新增校園映像圖片">
                </td>
                    <td class="text-center">
                        <input class="btn btn-dark btn-lg" type="submit" value="修改確定">
                        <input class="btn btn-dark btn-lg" type="reset" value="重置">
                </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
<?php include_once "./api/modal.php" ?>
