<?php
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Association\Apriori;

// 4位用户购买清单
$samples = [
    ['啤酒', '尿布', '儿童玩具','空气净化器','耳机'],
    ['尿布', '儿童玩具','笔记本电脑', '耳机', '空气净化器'],
    ['啤酒','耳机', '唇膏', '鸭舌帽', '滑板'],
    ['啤酒','唇膏', '高跟鞋', '毛绒玩具','空气净化器']
];
$labels  = [];

/*
 * Apriori 参数
 * support支持度
 * confidence 自信度
*/
$associator = new Apriori($support = 0.5, $confidence = 0.5);
$associator->train($samples, $labels);

$res = $associator->predict(['啤酒']);
print_r($res);

// Array([0] => Array( [0] => 空气净化器) [1] => Array( [0] => 耳机) [2] => Array( [0] => 唇膏))