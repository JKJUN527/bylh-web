@extends('demo.admin',['title'=>6])
@section('title','不亦乐乎协议')
@section('custom-style')
    <style type="text/css">
        .comcategory li{
            font-size:14px;
            padding: 3px;
        }
        .comcategory li a:hover{
            color: #b84554;
        }
        .comcategory li i{
            color: gray;
            margin-left: 10px;
        }
        .title-first a{
            text-align: center;
            padding: 60px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }
        .title-first a:hover{
            color: #b84554;
            font-weight: bold;
        }
        .demo li{
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }
        .newsImage{
            /*margin-left: 280px;*/
            width: 100%;
            /*height: 300px;*/
            align-content: center;
            text-align: center;
        }
        .newsImage img{
            max-width: 60%;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .newsCtnt{
            /*padding: 20px;*/
            font-size: 1.3rem;
            text-align: left;
            overflow: hidden;
            padding: 3rem;
        }
        .newsTitle{
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
        .newsTail{
            text-align: right;
            color: #999;
            margin-top: 30px;
        }
    </style>
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!--协议详情界面-->
<div class="am-g am-g-fixed">
    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
        <div class="am-container" style="border-bottom: 2px solid #eee;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="newsTitle">
                不亦乐乎协议
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            <div class="newsTail">
                | 责任编辑: &nbsp;<span>admin</span> |<i class="am-icon-calendar-check-o  am-icon-fw"></i>&nbsp;
                发布时间: &nbsp;<span></span>
            </div>

            <div class="newsContent">
                <p class="newsCtnt">
                    发斯蒂芬斯蒂芬水电费
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
@section('custom-script')

@endsection