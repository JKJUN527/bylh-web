@extends('demo.admin')
@extends('demo.nav')
@section('content')
<!--搜索界面-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-8 am-u-md-8 am-u-sm-8">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs" style="border-bottom: 4px solid #ee6363;">
                    <li class="am-active" style="background: #cfcfcf;"><a href="#tab1" style="font-size: 16px;padding-right: : 10px;color: #fff;padding:6px;">全部需求</a></li>
                    <li style="background: #cfcfcf;"><a href="#tab2" style="font-size: 16px;padding-right:10px;color: #fff;padding: 6px;">全部服务</a></li>
                </ul>
                <div class="rankit">
                    <select data-am-selected>
                        <option value="综合排序" selected>综合排序</option>
                        <option value="销量优先">销量优先</option>
                        <option value="价格升序">价格升序</option>
                        <option value="价格降序">价格降序</option>
                        <option value="发布时间">发布时间</option>
                    </select>
                </div>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />

                <div class="am-tabs-bd">
                    <!--需求-->
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <table class="xm_list" cellpadding="0" cellspacing="0">

                            <tbody>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="公司LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥500</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">公司LOGO设计</span>
                                       </a>
                                        <a href="javascript:;" class="task_ji" title="加急项目" style="background-color: #F84C4C;color: #fff;display: inline-block;font-size:18px;text-align: center;line-height: 16px;border-radius: 2px;padding: 2px;">急</a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">LOGO名称：正安检测科技有限公司要求以“正安”汉字或首打字母为主要设计元素，简单，大气，易识别。颜色参考：工业蓝 或 深红...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="公司LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥600</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">Villae Bo  瓦帕碧奥</span>
                                        </a>
                                        <a href="javascript:;" class="task_ji" title="加急项目" style="background-color: #F84C4C;color: #fff;display: inline-block;font-size:18px;text-align: center;line-height: 16px;border-radius: 2px;padding: 2px;">急</a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">LOGO名称：正安检测科技有限公司要求以“正安”汉字或首打字母为主要设计元素，简单，大气，易识别。颜色参考：工业蓝 或 深红...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="饮品品牌起名"><font class="money" style="font-size: 18px;color: #ff6600;">￥700</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">饮品品牌起名</span>
                                        </a>
                                        <a href="javascript:;" class="task_ji" title="置顶项目" style="background-color: #99E400;color: #fff;display: inline-block;font-size:18px;text-align: center;line-height: 16px;border-radius: 2px;padding: 2px;">顶</a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>

                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="饮品品牌起名"><font class="money" style="font-size: 18px;color: #ff6600;">￥1188</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">设计圆床</span>
                                        </a>
                                        <a href="javascript:;" class="task_ji" title="置顶项目" style="background-color: #99E400;color: #fff;display: inline-block;font-size:18px;text-align: center;line-height: 16px;border-radius: 2px;padding: 2px;">顶</a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="饮品品牌起名"><font class="money" style="font-size: 18px;color: #ff6600;">￥700</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">饮品品牌起名</span>
                                        </a>
                                        <a href="javascript:;" class="task_ji" title="加急项目" style="background-color: #FF3300;color: #fff;display: inline-block;font-size:18px;text-align: center;line-height: 16px;border-radius: 2px;padding: 2px;">加</a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>

                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/" target="_blank" title="楼盘LOGO设计"><font class="money" style="font-size: 18px;color: #ff6600;">￥200</font>&nbsp;<span class="searchtitle" style="font-size: 16px;color: #056bc3;">楼盘LOGO设计</span>
                                        </a>
                                        <div class="xm_xq tsk_show_450988" style="font-size: 14px;color: #999999;padding-top: 8px;line-height: 160%;">饮品  品牌起名，抢眼，有趣，简单，易懂，要与饮品有关，建议两字到四字！补充说明；茶季，麦甜，撒椒，鲜辣道，花田煮，这几个名...</div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <font style="color:#2782b7">19</font> 人参与 | 悬赏

                                        <br>
                                        <font style="color:#ff6600">1</font> 天后截止

                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button class="am-btn am-btn-warning am-btn-lg" type="button">立即参与</button>

                                    </div>
                                </td>
                            </tr>


                            <!--分页实现-->

                            <tr>
                                <td colspan="4" style="border-bottom:0;padding:15px 0 40px 0">

                                    <div class="pager_container">

                                        <ul data-am-widget="pagination"
                                            class="am-pagination am-pagination-default"
                                        >

                                            <li class="am-pagination-first ">
                                                <a href="#" class="">第一页</a>
                                            </li>

                                            <li class="am-pagination-prev ">
                                                <a href="#" class="">上一页</a>
                                            </li>


                                            <li class="">
                                                <a href="#" class="">1</a>
                                            </li>
                                            <li class="am-active">
                                                <a href="#" class="am-active">2</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="">3</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="">4</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="">5</a>
                                            </li>


                                            <li class="am-pagination-next ">
                                                <a href="#" class="">下一页</a>
                                            </li>

                                            <li class="am-pagination-last ">
                                                <a href="#" class="">最末页</a>
                                            </li>
                                        </ul>

                                    </div>


                                    <div class="clear"></div>
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!--服务搜索-->
                    <div class="am-tab-panel am-fade" id="tab2">
                        <div class="findrequest">
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="images/f4.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="images/f3.png"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="images/f2.jpg"  alt="米旭品牌设计"/>
                                            <h3 class="am-gallery-title">米旭品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="images/f1.jpg"  alt="龙博品牌设计"/>
                                            <h3 class="am-gallery-title">龙博品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <!--2-->
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="images/f4.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="images/f3.png"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="images/f2.jpg"  alt="米旭品牌设计"/>
                                            <h3 class="am-gallery-title">米旭品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="images/f1.jpg"  alt="龙博品牌设计"/>
                                            <h3 class="am-gallery-title">龙博品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <!--3-->
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="images/f4.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="images/f3.png"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="images/f2.jpg"  alt="米旭品牌设计"/>
                                            <h3 class="am-gallery-title">米旭品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="images/f1.jpg"  alt="龙博品牌设计"/>
                                            <h3 class="am-gallery-title">龙博品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <!--4-->
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="images/f4.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="images/f3.png"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="images/f2.jpg"  alt="米旭品牌设计"/>
                                            <h3 class="am-gallery-title">米旭品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="images/f1.jpg"  alt="龙博品牌设计"/>
                                            <h3 class="am-gallery-title">龙博品牌设计</h3>
                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <!--分页-->
                            <div class="pager_container">

                                <ul data-am-widget="pagination"
                                    class="am-pagination am-pagination-default"
                                >

                                    <li class="am-pagination-first ">
                                        <a href="#" class="">第一页</a>
                                    </li>

                                    <li class="am-pagination-prev ">
                                        <a href="#" class="">上一页</a>
                                    </li>


                                    <li class="">
                                        <a href="#" class="">1</a>
                                    </li>
                                    <li class="am-active">
                                        <a href="#" class="am-active">2</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="">3</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="">4</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="">5</a>
                                    </li>


                                    <li class="am-pagination-next ">
                                        <a href="#" class="">下一页</a>
                                    </li>

                                    <li class="am-pagination-last ">
                                        <a href="#" class="">最末页</a>
                                    </li>
                                </ul>

                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
        <div class="am-container" style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="guessyouwant">
                <div class="guess-title" style="font-size: 20px;font-weight: bold;padding: 5px;border-bottom: 3px solid #b84554;margin-bottom: 20px;">
                    推荐服务商
                </div>
                <div class=" fr main-c">
                    <a class="fws-hd" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank"><img src="../images/f2.jpg" width="210" height="210" alt="米旭品牌设计 "></a>
                    <a class="fws-name" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank" style="padding:20px;font-size: 18px;">米旭品牌设计 </a>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                    <div style="clear:both; height:5px"></div>
                    <div class="main-cb">
							<span class="fl"><img src="http://js.680.com/images/zuan2.gif" alt="钻石二级
							积分：1430分" title="钻石二级
							积分：1430" class="tip" align="absmiddle" style="width: 34px;height: 16px;position: inherit;background: #fff;margin-left: 20px;"></span>
                        <div class="clear"></div>
                    </div>

                    <div style="color: #666;height: 40px;width: 230px;line-height: 30px;padding-left: 20px;font-size: 14px;padding-top: 0;">
                        <div class="fl" style="float: left;">所在地：</div>

                        <div class="locus" style="background: url(images/shop_680.png) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                        <div style="float:left; padding-left:3px;width:110px; overflow:hidden;height:30px;">
                            广东-佛山

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="shop_zpjmsg" style="float: left;padding-left: 20px;">好评率：<span>100%</span>&nbsp;&nbsp;|&nbsp;&nbsp;总评：<span>5</span>分
                    </div><div class="clear"></div>
                </div>
                <br>
                <hr data-am-widget="divider" style="height: 4px;" class="am-divider am-divider-default" />
                <br>
                <!--推荐2-->
                <div class=" fr main-c">
                    <a class="fws-hd" href="http://shop.680.com/10442660/" title="龙博品牌设计 " target="_blank"><img src="../images/f1.jpg" width="210" height="210" alt="龙博品牌设计 "></a>
                    <a class="fws-name" href="http://shop.680.com/10442660/" title="龙博品牌设计 " target="_blank" style="padding:20px;font-size: 18px;">龙博品牌设计 </a>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                    <div style="clear:both; height:5px"></div>
                    <div class="main-cb">
							<span class="fl"><img src="http://js.680.com/images/zuan2.gif" alt="钻石二级
							积分：1430分" title="钻石二级
							积分：1430" class="tip" align="absmiddle" style="width: 34px;height: 16px;position: inherit;background: #fff;margin-left: 20px;"></span>
                        <div class="clear"></div>
                    </div>

                    <div style="color: #666;height: 40px;width: 230px;line-height: 30px;padding-left: 20px;font-size: 14px;padding-top: 0;">
                        <div class="fl" style="float: left;">所在地：</div>

                        <div class="locus" style="background: url(images/shop_680.png) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                        <div style="float:left; padding-left:3px;width:110px; overflow:hidden;height:30px;">
                            广东-佛山

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="shop_zpjmsg" style="float: left;padding-left: 20px;">好评率：<span>100%</span>&nbsp;&nbsp;|&nbsp;&nbsp;总评：<span>5</span>分
                    </div><div class="clear"></div>
                </div>
                <br>
                <hr data-am-widget="divider" style="height: 4px;" class="am-divider am-divider-default" />
                <br>
                <!--推荐3-->
                <div class=" fr main-c">
                    <a class="fws-hd" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank"><img src="images/f2.jpg" width="210" height="210" alt="米旭品牌设计 "></a>
                    <a class="fws-name" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank" style="padding:20px;font-size: 18px;">米旭品牌设计 </a>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                    <div style="clear:both; height:5px"></div>
                    <div class="main-cb">
							<span class="fl"><img src="http://js.680.com/images/zuan2.gif" alt="钻石二级
							积分：1430分" title="钻石二级
							积分：1430" class="tip" align="absmiddle" style="width: 34px;height: 16px;position: inherit;background: #fff;margin-left: 20px;"></span>
                        <div class="clear"></div>
                    </div>

                    <div style="color: #666;height: 40px;width: 230px;line-height: 30px;padding-left: 20px;font-size: 14px;padding-top: 0;">
                        <div class="fl" style="float: left;">所在地：</div>

                        <div class="locus" style="background: url(images/shop_680.png) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                        <div style="float:left; padding-left:3px;width:110px; overflow:hidden;height:30px;">
                            广东-佛山

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="shop_zpjmsg" style="float: left;padding-left: 20px;">好评率：<span>100%</span>&nbsp;&nbsp;|&nbsp;&nbsp;总评：<span>5</span>分
                    </div><div class="clear"></div>
                </div>

            </div>
        </div>
    </div>

</div>
<!--广告-->
<div class="advertisement" style="padding: 10px;width: 50%;float: left;">
    <img src="images/ad1.png">
</div>
<div class="advertisement" style="padding: 10px;width: 50%;float: right;">
    <img src="images/ad1.png">
</div>
@section('footer')
<div class="footer " style="border: none;">
    <div class="footer-hd ">
    </div>
    <div class="footer-bd ">
        <br>
        <p style="text-align: center;">

            Copyright © 2017-2018  bylehu 版权所有  蜀ICP备17027037<br>
            客服电话：88888888<br>
            联系邮箱：不亦乐乎＠bylehu.com

        </p>
    </div>
</div>
    @endsection
@endsection
