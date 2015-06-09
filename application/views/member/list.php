<div class="content">
    <div class="header">
        <h1 class="page-title">Users</h1>
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li class="active">Users</li>
        </ul>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/packages/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新套餐</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>账号</th>
                <th>密码</th>
                <th>服务状态</th>
                <th>套餐</th>
                <th>开户日期</th>
                <th>续费日期</th>
                <th>到期日期</th>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>安装地址</th>
                <th>设备名称</th>
                <th>机柜</th>
                <th>操作员</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sourceList['objlist'] as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td><?php echo $row['adsl_id']; ?></td>
                    <td><?php echo $row['adsl_pwd']; ?></td>
                    <td><?php echo $row['serviceSatus']; ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo $row['start_time']; ?></td>
                    <td><?php echo $row['up_time']; ?></td>
                    <td><?php echo $row['end_time']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['cardid']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['eName']; ?></td>
                    <td><?php echo $row['cNumber']; ?></td>
                    <td><?php echo $row['updateName']; ?></td>
                    <td>
                        <a href=""><i class="fa fa-pencil"></i></a>
                        <a href="/packages/deletebyid?id=<?php echo $row['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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