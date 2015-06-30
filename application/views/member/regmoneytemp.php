<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>开户交费-打印票据</title>
    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <style type="text/css">
        table.gridtable {
            font-size: 14px;
            color: black;
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
            <td><?php echo $data['phoneNumber']; ?></td>
            <td>宽带账号</td>
            <td><?php echo $data['adsl_id']; ?></td>
        </tr>
        <tr>
            <td>合计金额</td>
            <td colspan="2"><?php echo $data['amountcn']; ?></td>
            <td><?php echo $data['totalAmount']; ?></td>
            <td>密码</td>
            <td><?php echo $data['adsl_pwd']; ?></td>
        </tr>
        <tr>
            <td>项<br>目</td>
            <td colspan="5">
                <?php echo $_GET['packagesName']; ?>，到期时间：<?php echo date('Y年-m月-d日', intval($data['end_time'])); ?>
                <?php if(isset($data['equipmentName'])): ?>
                <br>
                    <?php echo $data['equipmentName']; ?>,价格:<?php echo $data['equipmentPrice']; ?>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td colspan="3">
                注：1、用户到期后一个月内未续费，自动销户；2、光猫保修三个月；3、使用过程出现网络异常请电本服务电话；
            </td>
        </tr>
        <tr>
            <td>
                服务电话:18666034393
            </td>
            <td>
                收款地址：上陈有线电视收费网点
            </td>
            <td>
                收款员：张
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td><input type="button" value="打印" onclick="window.print()" /></td>
            <td><input type="button" value="返回列表" onclick="window.location.href='/member'" /> </td>
        </tr>
    </table>
</div>

</body>
</html>