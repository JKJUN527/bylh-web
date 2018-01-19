@extends('demo.admin')
@section('title','新闻详情')
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
<!--新闻详情界面-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="newsTitle" data-content="{{$data['news']->nid}}">
                {{$data['news']->title}}
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            <div class="newsTail">
                | 责任编辑: &nbsp;<span>admin</span> &nbsp;|<i class="am-icon-calendar-check-o  am-icon-fw"></i>&nbsp;
                发布时间: &nbsp;<span>{{mb_substr($data['news']->created_at,0,10,'utf-8')}}</span>|<i class="am-icon-tripadvisor  am-icon-fw" ></i>&nbsp;
                浏览量：&nbsp;<span>{{$data['news']->view_count}}</span>&nbsp;&nbsp;
            </div>

            <div class="newsContent">
                <p class="newsCtnt">

                </p>
            </div>

        </div>
    </div>
</div>
<!--广告-->
<div class="advertisement" style="padding: 10px;width: 50%;float: left;">
    <img src="{{asset('images/ad4.jpg')}}">
</div>
<div class="advertisement" style="padding: 10px;width: 50%;float: right;">
    <img src="{{asset('images/ad5.jpg')}}">
</div>
@endsection
@section('custom-script')
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            var nid = $(".newsTitle").attr("data-content");

            $.ajax({
                url: "/news/content?nid=" + nid,
                type: "get",
                success: function (data) {
                    var content = data['news']['content'];
                    var images = data['news']['picture'];
                    if(images ==="" ||images ===null){
                        $(".newsCtnt").html(content);
                    }else{
                        var imageTemp = images.split(";");
                        var imagesArray = [];

                        for (var i in imageTemp) {
                            imagesArray[i + ''] = imageTemp[i + ''].split("@");
                        }
                        var baseUrl = imagesArray[0][0].substring(0, imagesArray[0][0].length - 1);
                        imagesArray[0][0] = imagesArray[0][0].replace(baseUrl, '');

                        for (var j = 0; j < imagesArray.length; j++) {
                            content = content.replace("[图片" + imagesArray[j][0] + "]", "<div class='newsImage'><img src='" + baseUrl + imagesArray[j][1] + "'/></div>");
                        }
                        $(".newsCtnt").html(content);
                    }
                }
            })
        });
    </script>
@endsection