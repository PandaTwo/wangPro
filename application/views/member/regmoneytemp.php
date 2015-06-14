<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>开户交费-打印票据</title>
    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <style type="text/css">
        table.gridtable {
            font-size:14px;
            color:black;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
            width: 100%;
        }
        table.gridtable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div style="width: 950px;height: 600px;margin: 0 auto;">
<!-- Table goes in the document BODY -->
<table class="gridtable">
    <tr>
        <td colspan="6" style="text-align: center">收据</td>
    </tr>
    <tr>
        <td colspan="3">订单编号：<?php echo $data['orderid']; ?></td>
        <td colspan="3"><?php echo date('Y-m-d H:i:s') ?></td>
    </tr>
    <tr>
        <td>用户名称</td>
        <td><?php echo $data['username']; ?></td>
        <td>手机号</td>
        <td><?php echo $data['orderid']; ?></td>
        <td>宽带账号</td>
        <td><?php echo $data['adsl_id']; ?></td>
    </tr>
    <tr>
        <td>合计金额</td>
        <td colspan="2"><?php echo $data['amountcn']; ?></td>
        <td><?php echo $data['amount']; ?></td>
        <td>密码</td>
        <td><?php echo $data['adsl_pwd']; ?></td>
    </tr>
    <tr>
        <td>项<br>目</td>
        <td colspan="5">
            <?php echo $data['packagesName']; ?>，到期时间：<?php echo date('Y年-m月-d日',strtotime($data['end_time1'])); ?>
        </td>
    </tr>
</table>
<div>
    注：1、用户到期后一个月内未续费，自动销户；2、光猫保修三个月；3、使用过程出现网络异常请电本服务电话；
</div>
    <div>
        服务电话:18666034393&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收款地址：上陈有线电视收费网点&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收款员：张
    </div>
</div>
</body>
</html>