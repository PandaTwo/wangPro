<div class="content">
    <div class="header">
        <h1 class="page-title">欢迎您, <?php echo $loginUser; ?></h1>

    </div>
    <div class="main-content">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>账户</th>
                <th>姓名</th>
                <th>套餐</th>
                <th>开户日期</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sourceList as $row):
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['adsl_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$row['start_time'])  ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $html; ?>
        <?php
        $this->load->view('/include/content_footer.html');
        ?>
    </div>
</div>