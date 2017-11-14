<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Sensitive;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;

//敏感词检测控制器
class SensitiveController extends Controller {

    //敏感词检测
    public function checkSensitive($str) {
        $data = array();
        $sensitive = array();
        //从数据库获取敏感词列表
        $words = Sensitive::select('keyword')->get();// 建议从文件或者缓存中读取敏感词列表，英文约定小写
        foreach ( $words as $word){
            $sensitive[] = $word->keyword;
        }
        $flag = false;
        // 提取中文部分，防止其中夹杂英语等
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str, $match);
        $chinsesArray = $match[0];
        $chineseStr = implode('', $match[0]);
        $englishStr = strtolower(preg_replace("/[^A-Za-z0-9\.\-]/", " ", $str));

        $flag_arr = array('？', '！', '￥', '（', '）', '：' , '‘' , '’', '“', '”', '《' , '》', '，',
            '…', '。', '、', 'nbsp', '】', '【' ,'～', '#', '$', '^', '%', '@', '!', '*', '-'. '_', '+', '=');
        $contentFilter = preg_replace('/\s/', '', preg_replace("/[[:punct:]]/", '',
            strip_tags(html_entity_decode(str_replace($flag_arr, '', $str), ENT_QUOTES, 'UTF-8'))));

        // 全匹配过滤,去除特殊字符后过滤中文及提取中文部分
        foreach ($sensitive as $word)
        {
            // 判断是否包含敏感词,可以减少这里的判断来降低过滤级别，
            if (strpos($str, $word) !== false || strpos($contentFilter, $word) !== false || strpos($chineseStr, $word) !== false
                || strpos($englishStr, $word) !== false) {
                $flag = true;
                $data['word'] = $word;
//                return '敏感词:' . $word;
            }
        }
        $data['flag'] = $flag ? 1:0;
//        return $flag ? 'yes' : 'no';
        return $data;

    }
    public function test(){
        $str = "如果单纯只加入关键字匹配，用户反过滤的方法五花八门，包括中间加入空格或者其他标点符号。
例子：
敏感词：扣扣

用户处理后：
扣 扣
扣，扣
扣@扣
扣1扣
这时候代码的正则匹配就可能匹配不出来。

解决办法：

先对用户数据去除所有的标点符号和一些特殊字符，然后再进行敏感词判断。

代码：

=array('？','！','￥','（','）','：','‘','’','“','”','《','》','，','…','。','、','nbsp','】','【','～');
=preg_replace('/\s/','',preg_replace(\"/[[:punct:]]/\",'',strip_tags(html_entity_decode(str_replace(),ENT_QUOTES,'UTF-8'))));
\$content_filter 就是处理后的用户数据，然后再进行 wordFilter(\$content_filter ) 过滤操作";
        $flag = $this->checkSensitive($str);
        return $flag;
    }
}
