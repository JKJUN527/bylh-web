<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布动态</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/webuploader.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/upload.css')}}"/>
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <style>
        #uploader .filelist li {
            background: url({{asset('images/bg.png')}}) no-repeat;
        }

        #uploader .placeholder {
            background: url({{asset('images/image.png')}}) center 93px no-repeat;
        }

        #uploader .filelist li p.progress span {
            background: #54b432 url({{asset('images/progress.png')}}) repeat-x;
        }

        #uploader .filelist li .success {
            background: url({{asset('images/success.png')}}) no-repeat right bottom;
        }

        #uploader .filelist div.file-panel span {
            background: url({{asset('images/icons.png')}}) no-repeat;
        }

        .width_auto {
            width: 900px;
            margin: 100px auto;
        }

        .text-box .comment {
            margin: 20px;
            /*margin-left: 300px;*/
            border: 1px solid #eee;
            display: block;
            width: 95%;
            padding: 5px;
            resize: none;
            color: #ccc;
        }

        .text-box .btn {
            font-size: 12px;
            font-weight: bold;
            display: none;
            float: right;
            width: 65px;
            height: 25px;
            border: 1px solid #0C528D;
            color: #fff;
            background: #4679AC;
        }

        .text-box .btn-off {
            border: 1px solid #999;
            color: #999;
            background: #F7F7F7;
        }

        .text-box .word {
            display: none;
            float: right;
            margin: 7px 10px 0 0;
            color: #666;
        }

        .text-box-on .comment {
            height: 50px;
            color: #333;
        }

        .text-box-on .btn {
            display: inline;
        }

        .text-box-on .word {
            display: inline;
        }
        .text-box .am-btn{
            margin-left: 20px;
        }
    </style>
</head>
<body>
<div class="width_auto">
    <div id="container" data-content="{{$data['forum_id']}}">
        <div class="text-box">
            <textarea class="comment" autocomplete="off" name="comment">写点什么吧！</textarea>
            <button class="am-btn am-btn-danger" id="submit_comment">发布</button>
        </div>
        <!--头部，相册选择和格式选择-->
        <div id="uploader">
            <div class="item_container">
                <div id="" class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                    </div>
                </div>
            </div>
            <div class="statusBar" style="display:none;">
                <div class="progress">
                    <span class="text">0%</span>
                    <span class="percentage"></span>
                </div>
                <div class="info"></div>
                <div class="btns">
                    <div id="filePicker2"></div>
                    <div class="uploadBtn">开始上传</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-1.9.min.js')}}"></script>
<script src="{{asset('js/webuploader.js')}}"></script>
<script src="{{asset('js/jquery.sortable.js')}}"></script>
<script src="{{asset('js/upload.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
<script>
    $('#submit_comment').click(function () {
        var forum_id = $('#container').attr('data-content');
        var description_raw = $("textarea[name='comment']");
        var description = description_raw.val().replace(/\r\n/g, '</br>');
        description = description.replace(/\n/g, '</br>');
        var formdata = new FormData();
        formdata.append('forum_id',forum_id);
        formdata.append('content',description);

        $.ajax({
            url: "/news/sendDynamic",
            type: "post",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
                var result = JSON.parse(data);
                if (result.status === 200) {
                    swal("",result.msg,"success");
                    setTimeout(function () {
                        self.location = '/news';
                    }, 1200);
                }else{
                    swal("",result.msg,"error");
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal(xhr.status + "：" + thrownError);
            }
        })
    });
</script>
</body>
</html>