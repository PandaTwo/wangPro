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
                <th>套餐名称</th>
                <th>速率</th>
                <th>价格</th>
                <th>时长</th>
                <th>状态</th>
                <th>操作员</th>
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
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['UpdateName']; ?></td>
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