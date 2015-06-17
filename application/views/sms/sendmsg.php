<form id="tab" action="/cabinets/updatePost" method="post">
    <div class="content">
        <div class="header">
            <h1 class="page-title">发送短信</h1>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">发送短信</a></li>
            </ul>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <input type="hidden" name="id" value="">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="form-group">
                                <label>账户</label>
                                <input name="cabinetsNumber" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="address" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>手机号码</label>
                                <input name="remark" type="text" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>短信模板</label>
                                <select>
                                    <option>==请选择==</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>发送内容</label>
                                <textarea name="remark" rows="10" cols="30" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                通用变量:{username}-用户姓名&nbsp; {starttime}-开户日期&nbsp; {endtime}-到期时间&nbsp; {packagename}-套餐名称
                                </div>
                        </div>
                    </div>
                    <div class="btn-toolbar list-toolbar">
                        <button onclick='document.getElementById("tab").submit();' class="btn btn-primary"><i class="fa fa-save"></i> 确认发送</button>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('include/content_footer.html');
            ?>
        </div>
    </div>
</form>