<?php

require 'include/header.inc.php';
/*
  <#日期 = "2017-2-17">
  <#时间 = "19:53:13">
  <#人物 = "buff" >
  <#备注 = " 正则表达式笔记">
 */
$str1 = 'abd abfhj ab abc';
preg_match('/ab/', $str1, $matches1);
preg_match('/ab(.)?/', $str1, $matches2);
echo "<p><span class='red'>匹配一次模式:</span> preg_match(模式,原句,输出数组)返回0/1 错误返回false
    <br/>匹配到的结果给输出数组 \$matches. \$matches[0]表示匹配到的数组.\$matches[1]表示子查询中的值
    就是()里面的值依次类推.<br/>当前\$str1='abd abfhj ab abc' <br/>
    匹配模式为/ab/ : \$matches====" . json_encode($matches1) . "<br/>
    匹配模式为/ab(.)?/ : \$matches====" . json_encode($matches2) . "<br/>
    //内写正则表达式,如果里面有/可以用@#!等替换<br>
    ()内表示一个字查询<hr/>
";
preg_match_all('/ab/', $str1, $matches1);
preg_match_all('/ab(.)?/', $str1, $matches2);
preg_match_all('/\bab(.)?\b/', $str1, $matches3);
echo "<span class='red'>匹配多次模式:</span> preg_match_all(). 跟上面一样但是匹配多次<br/>
    匹配模式为/ab/ : \$matches====" . json_encode($matches1) . "<br/>
    匹配模式为/ab(.)?/ : \$matches====" . json_encode($matches2) . "<br/>
    匹配模式为/\bab(.)?\b/ : \$matches====" . json_encode($matches3) . "<br/><hr/>
    ";
$phone_num = '13346342345sfhjskh8678352236786sjjhgf124135hjg2376sfhgsdjh124143523465124fghjsgdf'
        . '16724845786435341774242998912442347818086681342';
preg_match_all('/1[3|4|5|7|8]\d{9}/', $phone_num, $matches);
echo "<span class='red'>匹配手机号码</span> <span class='purple'>\$phone_num在控制台中</span><br/>
    匹配模式为/1[3|4|5|7|8]\d{9}/ : \$matches====" . json_encode($matches) . "<br/><hr/>
    ";
$ip_num = 'sdfs124.3523.2354.23523.3512.4124.214.64346.24.sdfgd.2345128.0.344.23465.76.3452.34.45.12.56'
        . '127.31.23.98200.24.24.128.8.8.8.8.8.8.8.80.1.1.1 12.32.431.256 1.0.0.0  1.2.a.d1 12.12a.2a.2';
$reg1 = '/(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|[1-9]\.){1}(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|\d\.)'
        . '{2}(2[0-4]\d|25[0-5]|1\d{2}|[1-9]\d|\d)/';
preg_match_all($reg1, $ip_num, $matches);
echo "<span class='red'>匹配ip地址</span> <span class='purple'>\$ip_num在控制台中</span><br/>
    匹配模式为/(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|[1-9]\.){1}(2[0-4]\d\.|25[0-5]\.|1\d{2}\.|[1-9]\d\.|\d\.)
        <br/>{2}(2[0-4]\d|25[0-5]|1\d{2}|[1-9]\d|\d)/ :<br/>
    \$matches[0]====" . json_encode($matches[0]) . "<br/><hr/>
    ";
$aa_aa_num = 'gogo go ssf ssf 嘻嘻 哈哈 哈哈iu iu 玩蛇 玩蛇1 小可爱    小可爱';
$reg2 = '/(\w\w\b)\s?\1/';
$reg2_2 = "/(?'arg1'\w\w\b)\s?\k'arg1'/";
$reg2_3 = '/(?<arg1>\w\w\b)\s?\k<arg1>/'; //这三个的效果是一样的
preg_match_all($reg2, $aa_aa_num, $matches);
echo "<span class='red'>匹配叠词, 组内参数引用</span> <span class='purple'>\$aa_aa_num在控制台中</span>
     <span class='green'>中文好像不能匹配的准确</span><br/>
    匹配模式为/(\w\w\b)\s\\1/ :<br/>
    \$matches[0]====" . json_encode($matches[0]) . "<br/>
    在这里\\1 表示第一个组的内容即()内的内容.也可以用?&lt;名称&gt;和?''定义 然后后面用\k&lt;&gt;和\k''引用<br/>
    /(\w\w\b)\s?\\1/====" . "/(?'arg1'\w\w\b)\s?\k'arg1'/=====" . "/(?&lt;arg1&gt;\w\w\b)\s?\k&lt;arg1&gt;/<hr/>
    ";
$str2 = ' buffgeniubi wuweidaibi  buffgeshuaiqi wuweichougui  bucuoobuffge hennebuffge ';
$str3 = '12false 31 32 wefalse bu 34false sf';
$reg3 = '/(?:buffge)\w+\b/'; //前面跟着buffge但是不把buffge放进组里,但是又把它捕获到输出结果
$reg3_2 = '/\w+(?=buffge\b)/'; //后面跟着buffge\b 既不把它放进组里,也不把他捕获到输出结果
$reg3_3 = '/(?<=buffge)\w+\b/'; //前面跟着buffge 既不把它放进组里,也不把他捕获到输出结果
$reg3_4 = '/\b((?<!buffge(?#这是注释))\w)+\b/'; //前面跟着的不是buffge 既不把它放进组里,也不把他捕获到输出结果
$reg3_5 = '/\b(\w(?!buffge))+\b/'; //后面跟着的不是buffge\b 既不把它放进组里,也不把他捕获到输出结果
$reg3_6 = '/\b            #匹配边界
            (\w           #匹配字符
            (?!flase)     #后面不等于false
            ){2}          #匹配前面的表达式2次
            \b            #匹配边界
            /x'; //忽略空格   不写x会出大事     
preg_match_all($reg3, $str2, $matches1);
preg_match_all($reg3_2, $str2, $matches2);
preg_match_all($reg3_3, $str2, $matches3);
preg_match_all($reg3_4, $str2, $matches4);
preg_match_all($reg3_5, $str2, $matches5);
preg_match_all($reg3_6, $str3, $matches6);
echo "<span class='red'>不捕获引用 (?:exp) (?=exp) (?&lt;=exp)</span> <span class='purple'>\$str2在控制台中 </span>
    <span class='green'>这里(?=exp)好像必须写在最后(?&lt;=)必须写在最前</span><br/>
    匹配模式为/(?:buffge)\w+\b/ : \$matches[0]====" . json_encode($matches1[0]) . "<br/>
    匹配模式为/\w+(?=buffge\b)/ : \$matches[0]====" . json_encode($matches2[0]) . "<br/>
    匹配模式为/(?&lt;=buffge)\w+\b/ : \$matches[0]====" . json_encode($matches3[0]) . "<br/>
    匹配模式为/\b((?&lt;!buffge)\w)+\b/ : \$matches[0]====" . json_encode($matches4[0]) .
 "<br/>
    匹配模式为/\b(\w(?!buffge))+\b/ : \$matches[0]====" . json_encode($matches5[0]) .
 "<br/>
     <span class='red mar_l_30'>使用注释</span><br/>
     \$str3= ' 12false 31 32 wefalse bu 34false sf '<br/>
     reg= <br/><pre>
     '/\s*      #匹配0-多个空格
       \w{2}    #匹配1-多个字符
       (?&lt;!     #后面不等于
        k\b     #k加字符边界
        )/x';</pre>
        =====" . json_encode($matches6[0]) . "
<hr/>
    ";
echo "<span class='red'>懒惰匹配</span> 懒惰限定符 ?   当str='aabab' a.*b =aabab , a.*?b=[aab,ab]<br/><hr/>
     ";
$str4 = 'xx <aa <bbb> <bbb> aa> yy';
$reg4 = "/<         #匹配一个<
            [^<>]*
            (
                ( 
                    (?'group'<)    #匹配一个<放入栈中
                    [^<>]*
                )+
                (
                    (?'-group'>)    #匹配一个<放入栈中
                    [^<>]*
                )+
            )*
            (?(group)(?!))      #如果栈中有group 则匹配(?!)后面跟着的任何不是.因为是空 即一定为假 匹配失败
        >/x";
$reg4_1="/<[^<>]*(((?'group'<)[^<>]*)+((?'-group'>)[^<>]*)+)*(?(group)(?!))>/";
//preg_match($reg4, $str4, $matches7);
echo "<span class='red'>平衡组 递归匹配</span> <span class='purple'>好像php不支持弹出栈中捕获组</span>
    <br/>
    ";
//echo json_encode($matches7[0]);
$str6 = "请问php是世界上最好的语言吗";
preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str6, $matches);
echo "<span class='red'>匹配utf-8码的汉字</span> \$str6= 请问php是世界上最好的语言吗<br/>
    匹配模式为/[\x{4e00}-\x{9fa5}]+/u : \$matches[0]==== <br/>" . json_encode($matches[0]) . "<br/>
    即中文的'{$matches[0][0]}'和'{$matches[0][1]}'<span class='purple'>
        不知道为什么echo出来的数组就是中文,而json编码的确实utf-8编码的</span><br/><hr/>
    ";
    
    
    
    
    
    
echo "<span class='red'>元字符:</span><br/>
        \:转义字符 \\n 匹配\n \(匹配( 有元字符的转义一下<br/>
        \b:表示一个单词的边界<br/>
        .:匹配除“\r\n”之外的任何单个字符。要匹配包括“\r\n”在内的任何字符，请使用像“[\s\S]”的模式。<br/>
        ?:匹配前面的子表达式零次或一次。例如，“do(es)?”可以匹配“do”或“does”中的“do”。?等价于{0,1}。<br/>
         :当?是跟在任何一个其他限制符（*,+,?，{n}，{n,}，{n,m}）后面时，匹配模式是懒惰的。<br/>
         非贪婪模式尽可能少的匹配所搜索的字符串，对于字符串“oooo”，“o+”将尽可能多的匹配“o”，得到结果[“oooo”]，<br/>
         而“o+?”将尽可能少的匹配“o”，得到结果 ['o', 'o', 'o', 'o']<br/>
        *:匹配前面的子表达式任意次。例如，zo*能匹配“z”，也能匹配“zo”以及“zoo”。<br/>
        +:匹配前面的子表达式一次或多次(大于等于1次）。例如，“zo+”能匹配“zo”以及“zoo”，但不能匹配“z”。+等价于{1,}。<br/>
        ^:匹配输入字符串的开始位置。<br/>
         :如果是在[]内表示非[^abc123]表示匹配非abc123中的任意值
        $:匹配输入字符串的结束位置。<br/>
        \z:匹配输入字符串的结束位置。<br/>
        \Z:匹配输入字符串的结束位置或者行尾<br/>
        \d:匹配一个数字b<br/>
        \f:匹配换页符
        \n:匹配换行符
        \r:匹配回车符
        \t:匹配制表符
        \v:匹配垂直制表符
        {2}:匹配前面的值2次{2,}匹配前面的值2次以上,{2,4}匹配前面的值2-4次<br/>
        \s:匹配任意的空白符,包括空格,换行,制表符(tab)中文全角空格等<br/>
        \w:匹配任意字母 数字, 汉字或下划线<br/>
        \W:匹配任意不是字母，数字，下划线，汉字的字符<br/>
        \S:匹配任意不是空白符的字符<br/>
        \D:匹配任意非数字的字符<br/>
        \B:匹配不是单词开头或结束的位置<br/>
        [^x]:匹配除了x以外的任意字符<br/>
        [^aeiou]:匹配除了aeiou这几个字母以外的任意字符<br/>
        /exp/x:忽略其中的空格.但是(?这种(和?之间的空格是不能忽略的<br/>
        #:之后跟着的都是注释 这种写法要记得在后面加x 忽略空格<br/>
        (?#注释内容):里面可以写注释<br/>
        (?'arg1' exp):将exp匹配到的结果放入\k'arg1'中
        (?'-arg1' exp):将\k'arg1'组删除
        (?<arg1> exp):将exp匹配到的结果放入\k<arg1>中
        (?<-arg1> exp):将\k<arg1>组删除
        i:不区分大小写
        x:忽略空格
        m:多行模式
        s:将.设置为包含换行
        u:默认字符串是utf-8的
        
";
require 'include/footer.inc.php';
