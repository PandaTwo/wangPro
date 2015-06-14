<div class="content">
    <div class="header">
        <h1 class="page-title">地址列表</h1>
    </div>
    <div class="main-content">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>城市名称</th>
                <th>层级</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($sourceList as $row): ?>
                <tr>
                    <td><?php echo $row['class_id']; ?></td>
                    <td>
                        <a href="/address?pid=<?php echo $row['class_id']; ?>">
                        <?php echo $row['class_name']; ?>
                        </a>
                    </td>
                    <td><?php echo $row['class_type']; ?></td>
                    <td>
                        <a href="/address/add?id=<?php echo $row['class_id']; ?>&class_type=<?php echo $row['class_type']; ?>">添加</a>
                        <a href="/address/edit?id=<?php echo $row['class_id']; ?>"><i class="fa fa-pencil"></i></a>
                        <a href="/address/deletebyid?id=<?php echo $row['class_id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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