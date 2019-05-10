<div class="col-xs-12">
    <table class="table table-hover table-responsive table-striped ">
        <thead class="table-bordered">
            <th>Họ và Tên</th>
            <th>Địa chỉ</th>
            <th>Biển Kiểm Soát</th>
            <th>Lái xe</th>
            <th>Chủ xe</th>
            <th>Ngày nộp</th>
            <th>Nộp chậm</th>
            <th>Số Biên Lai</th>
            <th>Vi phạm</th>
            <th>Tổng tiền nộp phạt</th>
        </thead>
        <?php
        if(isset($rs)){
            foreach($rs  as $item){
                ?>
                <tr>
                    <td><?= $item['name'];?></td>
                    <td><?= $item['address'];?></td>
                    <td><?= $item['bks'];?></td>
                    <td><?= $item['employee'];?></td>
                    <td><?= $item['boss'];?></td>
                    <td><?= $item['paymentDate'];?></td>
                    <td><?= $item['latePay'];?></td>
                    <td><?= $item['numberReceipt'];?></td>
                    <td><?= $item['description'];?></td>
                    <td><?= (double)$item['boss']+(double)$item['employee']+(double)$item['latePay'];?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

</div>