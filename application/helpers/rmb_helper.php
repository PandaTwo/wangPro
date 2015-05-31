<?php
/**
 * 人民币小写转大写
 *
 * @param string $number   待处理数值
 * @param bool   $is_round 小数是否四舍五入,默认"四舍五入"
 * @param string $int_unit 币种单位,默认"元"
 * @return string
 */
function rmb_format($money = 0, $is_round = true, $int_unit = '元') {
    $chs     = array (0, '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖');
    $uni     = array ('', '拾', '佰', '仟' );
    $dec_uni = array ('角', '分' );
    $exp     = array ('','万','亿');
    $res     = '';
    // 以 元为单位分割
    $parts   = explode ( '.', $money, 2 );
    $int     = isset ( $parts [0] ) ? strval ( $parts [0] ) : 0;
    $dec     = isset ( $parts [1] ) ? strval ( $parts [1] ) : '';
    // 处理小数点
    $dec_len = strlen ( $dec );
    if (isset ( $parts [1] ) && $dec_len > 2) {
        $dec = $is_round ? substr ( strrchr ( strval ( round ( floatval ( "0." . $dec ), 2 ) ), '.' ), 1 ) : substr ( $parts [1], 0, 2 );
    }
    // number= 0.00时，直接返回 0
    if (empty ( $int ) && empty ( $dec )) {
        return '零';
    }

    // 整数部分 从右向左
    for($i = strlen ( $int ) - 1, $t = 0; $i >= 0; $t++) {
        $str = '';
        // 每4字为一段进行转化
        for($j = 0; $j < 4 && $i >= 0; $j ++, $i --) {
            $u   = $int{$i} > 0 ? $uni [$j] : '';
            $str = $chs [$int {$i}] . $u . $str;
        }
        $str = rtrim ( $str, '0' );
        $str = preg_replace ( "/0+/", "零", $str );
        $u2  = $str != '' ? $exp [$t] : '';
        $res = $str . $u2 . $res;
    }
    $dec = rtrim ( $dec, '0' );
    // 小数部分 从左向右
    if (!empty ( $dec )) {
        $res .= $int_unit;
        $cnt =  strlen ( $dec );
        for($i = 0; $i < $cnt; $i ++) {
            $u = $dec {$i} > 0 ? $dec_uni [$i] : ''; // 非0的数字后面添加单位
            $res .= $chs [$dec {$i}] . $u;
        }
        if ($cnt == 1) $res .= '整';
        $res = rtrim ( $res, '0' ); // 去掉末尾的0
        $res = preg_replace ( "/0+/", "零", $res ); // 替换多个连续的0
    } else {
        $res .= $int_unit . '整';
    }
    return $res;
}