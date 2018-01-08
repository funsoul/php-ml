<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Regression\LeastSquares;
use QL\QueryList;

$url = 'https://www.keyunzhan.com/lishitianqi/guangzhou/';
$high = QueryList::get($url)->find('table.yuBaoTable')->find('tr')->map(function ($tr){
    return $tr->find('td:eq(1)')->texts();
});

$targets = $high->toArray();
foreach ($targets as &$target){
    $target = intval($target[0]);
}
unset($target);
array_shift($targets);
$total = count($targets);
$samples = [];
for($i=0;$i<$total;$i++){
    $samples[] = [$i];
}

$regression = new LeastSquares();
$regression->train($samples, $targets);

$nextDay = $total+1;
$nextDayHigh = $regression->predict([$nextDay]);

print_r(round($nextDayHigh));