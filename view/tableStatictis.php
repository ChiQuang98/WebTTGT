<div class="col-sm-12">
    <table id="bootstrap-data-table "
           class="table table-hover table-responsive table-striped " role="grid"
           aria-describedby="bootstrap-data-table_info">
        <thead>
        <tr role="row">
            <th class="sorting_desc" tabindex="0" aria-controls="bootstrap-data-table"
                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                aria-sort="descending" style="width: 240px;">Họ và Tên
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Position: activate to sort column ascending"
                style="width: 395px;">Địa chỉ
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Office: activate to sort column ascending"
                style="width: 178px;">Biển Kiểm Soát
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Lái xe
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Chủ xe
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Ngày lập biên lai
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Nộp chậm
            </th>
            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Số biên lai
            </th>

            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1"
                colspan="1" aria-label="Salary: activate to sort column ascending"
                style="width: 141px;">Tổng tiền phạt
            </th>
        </tr>
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
                    <td><?= $item['dayReceipt'];?></td>
                    <td><?= $item['latePay'];?></td>
                    <td><?= $item['numberReceipt'];?></td>
                    <td><?= (double)$item['boss']+(double)$item['employee']+(double)$item['latePay'];?></td>
                </tr>
                <?php
            }
        }
        ?>

    </table>
</div>