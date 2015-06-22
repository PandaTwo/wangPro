<!-- 收费记录页面 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">收费记录</h1>
    </div>
    <div class="main-content">
        <form action="/payrecord" method="get">
            <div class="btn-toolbar list-toolbar">
                <span>订单编号：<input type="text" name="orderid"
                                  value="<?php echo isset($_REQUEST['orderid']) ? $_REQUEST['orderid'] : ''; ?>"> </span>
                <span>日期：<input value="<?php echo isset($_REQUEST['startTime']) ? $_REQUEST['startTime'] : ''; ?>"
                                type="text" name="startTime"
                                onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})"> 至 <input
                        value="<?php echo isset($_REQUEST['endTime']) ? $_REQUEST['endTime'] : ''; ?>" type="text"
                        name="endTime"
                        onFocus="WdatePicker({isShowClear:true,dateFmt:'yyyy-MM-dd'})"></span>
                <br>
                <br>
            <span>交易类型：
                <select name="type">
                    <option value="">==所有类型==</option>
                    <option
                        value="交费" <?php echo isset($_REQUEST['type']) && $_REQUEST['type'] == '交费' ? 'selected' : ''; ?>>
                        交费
                    </option>
                    <option
                        value="续费" <?php echo isset($_REQUEST['type']) && $_REQUEST['type'] == '续费' ? 'selected' : ''; ?>>
                        续费
                    </option>
                </select>
            </span>
                <span>账户：<input name="asdl_id" type="text"
                                value="<?php echo isset($_REQUEST['asdl_id']) ? $_REQUEST['asdl_id'] : ''; ?>"></span>
                <span>姓名：<input name="username" type="text"
                                value="<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : ''; ?>"> </span>
                <span>手机：<input name="phoneNumber" type="text"
                                value="<?php echo isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : ''; ?>"> </span>
                <input type="submit" class="btn btn-primary" value="搜索">

                <div class="btn-group">
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>订单编号</th>
                <th>订单日期</th>
                <th>套餐类型</th>
                <th>设备</th>
                <th>设备金额</th>
                <th>交易类型</th>
                <th>账户</th>
                <th>姓名</th>
                <th>手机</th>
                <th>收费金额</th>
                <th>合计</th>
                <th>操作员</th>
                <th>状态</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($objSource as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['orderid']; ?></td>
                    <td><?php echo date('Y-m-d', intval($row['addTime'])); ?></td>
                    <td><?php echo $row['pName']; ?></td>
                    <td><?php echo $row['eName']; ?></td>
                    <td><?php echo $row['ePrice']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['adsl_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['pPrice']; ?></td>
                    <td><?php echo floatval($row['pPrice']) + floatval($row['ePrice']); ?></td>
                    <td><?php echo $row['updateName']; ?></td>
                    <td><?php echo $row['serviceSatus']; ?></td>
                    <td>
                        <?php

                        if ($row['type'] == '交费') {
                            ?>
                            <a target="_blank" href="/member/regmoneytemp?id=<?php echo $row['id']; ?>&orderid=<?php echo $row['orderid']; ?>&amount=<?php echo $row['pPrice']; ?>&packagesName=<?php echo $row['pName']; ?>">打印</a>
                        <?php } else { ?>
                            <a target="_blank" href="/member/renewalstemp?id=<?php echo $row['id']; ?>&orderid=<?php echo $row['orderid']; ?>&amount=<?php echo $row['pPrice']; ?>&packagesName=<?php echo $row['pName']; ?>">打印</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        echo $html;
        ?>
        <?php
        $this->load->view('include/content_footer.html');
        ?>
    </div>
</div>