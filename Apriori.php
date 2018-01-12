<?php
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Association\Apriori;

// 4位用户购买清单
$samples = [
    ['啤酒', '尿布', '儿童玩具'],
    ['尿布', '儿童玩具','笔记本电脑'],
    ['啤酒','耳机', '唇膏'],
    ['啤酒','唇膏', '高跟鞋']
];
$labels  = [];

/*
 * Apriori 参数
 * support 支持度
 * confidence 自信度
*/
$associator = new Apriori($support = 0.5, $confidence = 0.5);
$associator->train($samples, $labels);

$res = $associator->predict(['啤酒']);
print_r($res);
// Array([0] => Array( [0] => 唇膏) )

// 获取生成的关联规则
$rules = $associator->getRules();
print_r($rules);

// 获取频繁项集
$res = $associator->apriori();
print_r($res);
