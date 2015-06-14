<div class="content">
    <div class="header">
        <h1 class="page-title">系统设置</h1>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="#add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加系统设置项</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>名称</th>
                <th>值</th>
                <th>备注</th>
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
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td><?php echo $row['remark']; ?></td>
                    <td>
                        <a href=""><i class="fa fa-pencil"></i></a>
                        <a href="/adminuser/edit?id=<?php echo $row['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <form action="/systemsetting/addpost" id="tab" method="post">
            <div class="tab-pane active" id="add">
                <div class="form-group">
                    <label>名称:</label>
                    <input name="title" id="title" type="text" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>值:</label>
                    <input name="value" id="value" type="text" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>备注:</label>
                    <input name="remark" id="remark" type="text" value="" class="form-control">
                </div>
                <div class="btn-toolbar list-toolbar">
                    <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>