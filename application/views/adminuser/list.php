<div class="content">
    <div class="header">
        <h1 class="page-title">管理员列表</h1>
    </div>
    <div class="main-content">

        <div class="btn-toolbar list-toolbar">
            <a href="#add" class="btn btn-primary"><i class="fa fa-plus"></i> 添加管理员</a>
            <div class="btn-group">
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>用户名</th>
                <th>密码</th>
                <th>添加时间</th>
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
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['createdOn']; ?></td>
                    <td>
                        <a href="/adminuser/edit?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                        <a href="/adminuser/deletebyid?id=<?php echo $row['id']; ?>" onclick="return confirm('Are sure del this?');"  role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <form action="/adminuser/addpost" id="tab" method="post">
        <div class="tab-pane active" id="add">
            <div class="form-group">
                <label>用户名:</label>
                <input name="username" id="username" type="text" value="" class="form-control">
            </div>
            <div class="form-group">
                <label>密码:</label>
                <input name="password" id="passwrod" type="password" value="" class="form-control">
            </div>
            <div class="form-group">
                <label>确认密码:</label>
                <input name="repassword" id="repassword" type="password" value="" class="form-control">
            </div>
            <div class="btn-toolbar list-toolbar">
                <button onclick='return checkadduser();' class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
        </form>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>
<script>
    function checkadduser()
    {
        var username = $("#username").val();
        var passwrod = $("#passwrod").val();
        var repassword = $("#repassword").val();

        if(username=="")
        {
            alert('请输入用户名');
            return false;
        }
        if(passwrod!="" && repassword!="")
        {
            if(passwrod != repassword)
            {
                alert('两次输入的密码不一致.');
                return false;
            }
        }else {
            alert('密码不能为空.');
            return false;
        }

        document.getElementById("tab").submit();

    }
</script>