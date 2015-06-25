<div class="content">
    <div class="header">
        <h1 class="page-title">用户登记</h1>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/member/registraion" class="btn btn-primary"><i class="fa fa-plus"></i> 用户登记</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>登记日期</th>
                <th>套餐</th>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>安装地址</th>
                <th>操作员</th>
                <th>操作</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sourceList as $row):
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['cardid']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['updateName']; ?></td>
                    <td>
                        <a href="/member/registrationMoeny?id=<?php echo $row['id']; ?>">开户交费</a>
                        <a onclick="return confirm('确定要删除吗？')" href="/member/deleteregbyid?id=<?php echo $row['id']; ?>">删除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
