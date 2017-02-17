<?php
require 'include/header.inc.php';
/*
<#日期 = "2017-2-17">
<#时间 = "19:53:13">
<#人物 = "buff" >
<#备注 = " 正则表达式笔记">
*/
$str1='abd abfhj ab abc';
preg_match('/ab/',$str1,$matches1);
preg_match('/ab(.)?/',$str1,$matches2);
echo "<p><span class='red'>匹配一次模式:</span> preg_match(模式,原句,输出数组)返回0/1 错误返回false
    <br/>匹配到的结果给输出数组 \$matches. \$matches[0]表示匹配到的数组.\$matches[1]表示子查询中的值
    就是()里面的值依次类推.<br/>当前\$str1='abd abfhj ab abc' <br/>
    匹配模式为/ab/ : \$matches====".json_encode($matches1)."<br/>
    匹配模式为/ab(.)?/ : \$matches====".json_encode($matches2)."<br/>
    //内写正则表达式,如果里面有/可以用@#!等替换<br>
    ()内表示一个字查询<hr/>
";
    preg_match_all('/ab/',$str1,$matches1);
    preg_match_all('/ab(.)?/',$str1,$matches2);
    preg_match_all('/\bab(.)?\b/',$str1,$matches3);
echo "<span class='red'>匹配多次模式:</span> preg_match_all(). 跟上面一样但是匹配多次<br/>
    匹配模式为/ab/ : \$matches====".json_encode($matches1)."<br/>
    匹配模式为/ab(.)?/ : \$matches====".json_encode($matches2)."<br/>
    匹配模式为/\bab(.)?\b/ : \$matches====".json_encode($matches3)."<br/><hr/>
    ";
$phone_num='13346342345sfhjskh8678352236786sjjhgf124135hjg2376sfhgsdjh124143523465124fghjsgdf'
            .'16724845786435341774242998912442347818086681342';
preg_match_all('/1[3|4|5|7|8]\d{9}/', $phone_num,$matches);
echo "<span class='red'>匹配手机号码</span> <span class='purple'>\$phone_num在控制台中</span><br/>
    匹配模式为/1[3|4|5|7|8]\d{9}/ : \$matches====".json_encode($matches)."<br/><hr/>
    ";
$ip_num='sdfs124.3523.2354.23523.3512.4124.214.64346.24.sdfgd.2345128.0.344.23465.76.3452.34.45.12.56'
            .'127.31.23.98200.24.24.128.8.8.8.8.8.8.8.80.1.1.1 12.32.431.256 1.0.0.0  1.2.a.d1 12.12a.2a.2';
$reg1='/(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|[1-9]\.){1}(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|\d\.)'
        . '{2}(2[0-4]\d|25[0-5]|1\d{2}|[1-9]\d|\d)/';
preg_match_all($reg1, $ip_num,$matches);
echo "<span class='red'>匹配ip地址</span> <span class='purple'>\$ip_num在控制台中</span><br/>
    匹配模式为/([12]\d{1,2},|[123456789]\d,|[123456789],){3}[12]\d{1,2}|[123456789]\d|[123456789]/ :<br/>
    \$matches====".json_encode($matches[0])."<br/><hr/>
    ";
echo "<span class='red'>元字符:</span><br/>
        \:转义字符 \\n 匹配\n \(匹配( 有元字符的转义一下<br/>
        \b:表示一个单词的边界<br/>
        .:匹配除“\r\n”之外的任何单个字符。要匹配包括“\r\n”在内的任何字符，请使用像“[\s\S]”的模式。<br/>
        ?:匹配前面的子表达式零次或一次。例如，“do(es)?”可以匹配“do”或“does”中的“do”。?等价于{0,1}。<br/>
         :当?是跟在任何一个其他限制符（*,+,?，{n}，{n,}，{n,m}）后面时，匹配模式是非贪婪的。<br/>
         非贪婪模式尽可能少的匹配所搜索的字符串，对于字符串“oooo”，“o+”将尽可能多的匹配“o”，得到结果[“oooo”]，<br/>
         而“o+?”将尽可能少的匹配“o”，得到结果 ['o', 'o', 'o', 'o']<br/>
        *:匹配前面的子表达式任意次。例如，zo*能匹配“z”，也能匹配“zo”以及“zoo”。<br/>
        +:匹配前面的子表达式一次或多次(大于等于1次）。例如，“zo+”能匹配“zo”以及“zoo”，但不能匹配“z”。+等价于{1,}。<br/>
        ^:匹配输入字符串的开始位置。<br/>
         :如果是在[]内表示非[^abc123]表示匹配非abc123中的任意值
        $:匹配输入字符串的结束位置。<br/>
        \d:匹配一个数字b<br/>
        {2}:匹配前面的值2次{2,}匹配前面的值2次以上,{2,4}匹配前面的值2-4次<br/>
        \s:匹配任意的空白符,包括空格,换行,制表符(tab)中文全角空格等<br/>
        \w:匹配任意字母 数字, 汉字或下划线<br/>
        
        
";


















require 'include/footer.inc.php';
