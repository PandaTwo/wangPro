<form action="/mail/delpost" id="form1" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">邮件记录</h1>
        </div>
        <div class="main-content">
            <div class="btn-toolbar list-toolbar">
<!--                <a href="/sms/sendsms" class="btn btn-primary"><i class="fa fa-plus"></i> 短信发送</a>-->
                <input type="button" class="btn btn-primary" onclick="checkform()" value="删除选中项">
                <div class="btn-group">
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox" id="SelectAll">#</th>
                    <th>账号</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>状态</th>
                    <th>发送时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list as $row):
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="item[]" class="citems"
                                   value="<?php echo $row['id']; ?>"> <?php echo $row['id']; ?>
                        </td>
                        <td><?php echo $row['emailaddress']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['content']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', intval($row['addtime'])) ?></td>
                        <td><?php echo $row['status'] == '成功' ? '' : '<a href="/mail/resendmail?id='.$row['id'].'">重发邮件</a>' ?> </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $html; ?>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>
<script>

    function checkform()
    {
        var len = 0;
        $(".citems").each(function () {
            if(this.checked == true)
            {
                len+=1;
            }
        });
        if(len > 0)
        {
            if(confirm('确定要删除吗？'))
            {
                document.getElementById('form1').submit();
            }
        }else
        {
            alert('请选择要删除的数据');
            return false;
        }


    }

    $(function () {
        $("#SelectAll").click(function () {
            if (this.checked == true) {
                $(".citems").each(function () {
                    this.checked = true;
                });
            } else {
                $(".citems").each(function () {
                    this.checked = false;
                });
            }
        });
    })
</script>