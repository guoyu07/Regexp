/*
 <#日期 = "2017-2-17">
 <#时间 = "21:57:06">
 <#人物 = "buff" >
 <#备注 = " js文件写备注在控制台中">
 */
/**输出reg中的被检索的字符串
 * 
 * @param {console提示信息} mes 
 * @param {变量名} var1 
 * @param {变量值} val 
 * @returns {null}
 */
function out_reg_str(mes, var1, val) {
    var a = '%c++++++++++' + mes + '开始++++++++++\r\n';
    var c = '%c'+var1 + '%c= ' + val;
    var b = '%c----------' + mes + '结束-----------\r\n';
    console.log(a + c + '\r\n' +b,
    'font-size:18px;color:red;',//提示信息开始
    'font-size:18px;color:#FF00FF;',//变量名
    'font-size:18px;',//变量值
    'font-size:18px;color:blue;');//提示信息结束
}

