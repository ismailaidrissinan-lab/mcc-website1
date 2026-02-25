<?php
$zh = json_decode(file_get_contents('lang/zh.json'), true);

$new_translations = [
    'No. 4, Ganges Street, Maitama,<br>Abuja, Nigeria' => '尼日利亚阿布贾市麦塔马区恒河街4号',
    'Tel' => '电话',
    'Fax' => '传真',
    'Email' => '邮箱',
    'No. 7088, Renmin Street,<br>Changchun, Jilin, China' => '中国吉林省长春市人民大街7088号'
];

foreach ($new_translations as $key => $value) {
    if (!isset($zh[$key])) {
        $zh[$key] = $value;
    }
}

file_put_contents('lang/zh.json', json_encode($zh, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "zh.json updated successfully.\n";
