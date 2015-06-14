<div class="content">
    <div class="header">
        <h1 class="page-title">设备列表</h1>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="/equipment/add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新设备</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>设备名称</th>
                <th>厂家</th>
                <th>价格</th>
                <th>型号</th>
                <th>状态</th>
                <th>操作员</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sourceList as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td><?php echo $row['equipmentName']; ?></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['updateName']; ?></td>
                    <td>
                        <a href=""><i class="fa fa-pencil"></i></a>
                        <a href="/equipment/deletebyid?id=<?php echo $row['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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