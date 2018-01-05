<div class="hmtop">
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd">
                    <a href="{{asset('account/login')}}" target="_top" class="h">亲，请登录</a>
                    <a href="{{asset('account/register')}}" target="_top">免费注册</a>
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="{{asset('account/login')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>登录</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a  href="{{asset('account/register')}}" target="_top"><i class="am-icon-user-plus am-icon-fw"></i>注册</a></div>
            </div>
        </ul>
    </div>

    <!--悬浮搜索框-->

    <div class="nav white">
        <div class="logo"><img src="{{asset('images/bylh2.png')}}" /></div>
        <div class="logoBig">
            <li><img src="{{asset('images/bylh.png')}}" /></li>
        </div>

        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="{{asset('/search')}}"></a>
            <form>
                <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div>
<b class="line"></b>
<div class="shopNav" style="padding-bottom:0;margin:0; ">
    <div class="slideall" style="height: auto;">

        <!--<div class="long-title"><span class="all-goods">全部分类</span></div>-->
        <div class="nav-cont" style="padding-left: 350px;" >
            <ul>
                <li class="index"><a href="{{asset('/index')}}">首页</a></li>
                <li class="qc"><a href="{{asset('')}}">需求大厅</a></li>
                <li class="qc"><a href="{{asset('')}}">大学生服务</a></li>
                <li class="qc"><a href="{{asset('')}}">实习中介</a></li>
                <li class="qc last"><a href="{{asset('')}}">专业问答</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>