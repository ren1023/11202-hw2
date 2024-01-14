<div >
    <p class="fs-3 text-center pb-3">進站總人數管理</p>
    <form class="form-control" method="post" action="./api/edit_info.php">
        <table class="table text-center align-middle" style="width:50%;margin:auto">
            <tbody>
                <tr>
                    <td width="50%">進站總人數：</td>
                    <td width="50%">
                        <input class="form-control" type="number" name="total" value="<?=$Total->find(1)['total'];?>">
                        <input type="hidden" name="table" value="<?=$do;?>">
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"></td>
                    <td class="text-center">
                        <input class="btn btn-dark btn-lg" type="submit" value="修改確定">
                        <input class="btn btn-dark btn-lg" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>