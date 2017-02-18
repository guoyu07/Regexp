<?php
/*
  <#日期 = "2017-2-17">
  <#时间 = "21:03:06">
  <#人物 = "buff" >
  <#备注 = " ">
 */
?>
<div id="tips">
    <span class="red">关键字 :</span>红色，
    <span class="purple">备注 :</span>紫色，
    <span class="green">疑惑,待解决 :</span>绿色
</div>
</article>
<div style="height: 500px;"></div>

<script src="public/js/js1.js"></script>
<script>
    out_reg_str('电话号码字符串', '$phone_num', '<?php echo $phone_num; ?>');//输出正则表达式要查询的手机号码字符串到控制台
    out_reg_str('IP地址字符串', '$ip_num', '<?php echo $ip_num; ?>');//输出正则表达式要查询的IP地址字符串到控制台
    out_reg_str('叠词字符串', '$aa_aa_num', '<?php echo $aa_aa_num; ?>');//输出正则表达式要查询的叠词字符串到控制台
    out_reg_str('捕获引用', '$str2', '<?php echo $str2; ?>');//输出正则表达式要查询的不捕获引用字符串到控制台
</script>
</body>
</html>