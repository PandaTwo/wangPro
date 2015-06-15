<div class="content">
    <div class="header">
        <h1 class="page-title">短信记录</h1>
    </div>
    <div class="main-content">
        <div class="btn-toolbar list-toolbar">
            <a href="/sms/sendmsg" class="btn btn-primary"><i class="fa fa-plus"></i> 短信发送</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>账号</th>
                <th>姓名</th>
                <th>手机</th>
                <th>状态</th>
                <th>发送时间</th>
                <th>短信内容</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($packlist as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td><?php echo $row['PackagesName']; ?></td>
                    <td><?php echo $row['Speed']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                    <td><?php echo $row['times']; ?></td>
                    <td><?php echo $row['status']=="1" ? '启用' : '停用' ?></td>
                    <td><?php echo $row['UpdateName']; ?></td>
                    <td>
                        <a href="/packages/edit?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
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