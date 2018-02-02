@extends('layout.admin')
@section('title', 'Add Notes')

@section('custom-style')
    <style>
        ul.mdl-menu,
        li.mdl-menu__item {
            padding: 0;
        }

        li.mdl-menu__item a {
            cursor: pointer;
            display: block;
            padding: 0 16px;
        }

        button[type="submit"] {
            margin-top: 16px;
        }

        .news-content--title {
            position: relative;
            height: 50px;
            border-bottom: 1px solid #ebebeb;
            margin: 64px 0 32px 0;
        }

        .news-content--title h6 {
            display: inline-block;
            margin: 0;
            vertical-align: middle;
        }

        #insert-image {
            position: absolute;
            right: 0;
            vertical-align: middle;
        }

        .preview {
            margin-top: 16px;
            border: 1px solid #F5F5F5;
            position: relative;
        }

        .preview label {
            margin: 0 24px 0 16px;
        }

        .preview p {
            display: inline-block;
            /*position: absolute;*/
            /*top: 30px;*/
            /*left:116px;*/
            font-size: 12px;
        }

        .preview p span {
            cursor: pointer;
            margin-right: 6px;
            padding: 2px 4px;
        }

        span.insert:hover {
            text-decoration: underline;
        }

        span.delete:hover {
            background-color: #ebebeb;
        }

        span.delete {
            color: #aaaaaa;
            border: 2px solid #ebebeb;
            background-color: #f5f5f5;
        }

        span.insert {
            color: #4CAF50;
        }

        .preview img {
            padding: 5px;
            border: 1px solid #f5f5f5;
            background-color: #f5f5f5;
        }
    </style>
@endsection

@section('sidebar')
    @include('layout.adminAside', ['title' => 'notes', 'subtitle'=>'addNotes', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        发布公告
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a href="/admin/notes">返回公告列表</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="body">
                    <form role="form" method="post" id="add-news-form">

                        <div class="news-content--title">
                            <h6>公告内容</h6>
                        </div>

                        <div class="input-group">
                            <div class="form-line">
                                    <textarea rows="8" class="form-control no-resize" id="content" name="content"
                                              placeholder="在这里输入公告内容..." required></textarea>
                            </div>
                            <label id="content-error" class="error" for="content"></label>
                        </div>

                        <input hidden type="text" name="picture-index" value="" disabled/>

                        <div id="preview-holder">
                        </div>

                        <br>

                        <button id="submit-news"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-blue-sky">
                            发布公告
                        </button>
                    </form>
                </div><!-- #END# .body-->
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">

        $("#submit-news").click(function (event) {
            event.preventDefault();

            var content = $("#content");

            var testContent = content.val().replace(/\r\n/g, '');
            testContent = testContent.replace(/\n/g, '');
            testContent = testContent.replace(/\s/g, '');

            if (testContent === '') {
                setError(content, 'content', '不能为空');
                return;
            } else {
                removeError(content, 'content');
            }

            // 将content中的换行 "\r\n" 或者 "\n" 换成 <br>
            // '\s'空格替换成"&nbsp;"
            // 这样可以保持新闻内容的编辑格式
            var newsContent = content.val().replace(/\r\n/g, '<br>');
            newsContent = newsContent.replace(/\n/g, '<br>');
            newsContent = newsContent.replace(/\s/g, '&nbsp;');

            var formData = new FormData();
            formData.append("content", newsContent);

            $.ajax({
                url: "/admin/notes/add",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);

                    if (result.status === 200) {
                        setTimeout(function () {
                            self.location = '/admin/notes';
                        }, 1200);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })

        })
    </script>
@show
