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
                不亦乐乎服务协议（草案）
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            <div class="newsContent">
                <p class="newsCtnt">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎您加入《不亦乐乎》！请您阅读以下条款后注册。您完成注册，即表示您完全同意本协议。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一、关于本站<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 《不亦乐乎》（bylehu.com和bylehu.cn）网站，简称“本站”。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 本站定位于提供专业服务的知识技能共享平台，为专业技能和专业知识的供求双方提供在线撮合服务，在线汇集体育、艺术、科技、健康、财经、文化等领域的各种专业技能和专业知识的供给信息和需求信息，并使消费者获得其所需要的专业技能和专业知识的服务。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;二、关于用户<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 任何人（自然人或法人）均可以在本站免费注册为用户。本站用户分为两类：服务用户和需求用户。服务用户主要包括作为专业技能和专业知识提供者的大学生、专业技术人员、专家、学者等专业人士和知识人群。需求用户涵盖作为专业技能和专业知识的需求者的社会公众。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 本站分别给予每个用户一个相应的用户帐号，用户对其使用用户帐号的行为和后果承担法律责任。用户对自己在本站注册信息的真实性、合法性、有效性承担责任。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. 服务用户在1.0版有三个选项：专业服务用户、实习中介服务用户、专业问答服务用户。选择专业服务以及专业问答用户为个人用户，需要进行实名制验证和专业身份审核，上传手持正反面身份证照片，上传所学专业证书或从事专业证书，按照“后台实名，显示自愿”原则设置选项，待通过系统审核后方可发布服务信息。选择实习中介用户为机构用户，应进行机构身份审核，上传中介机构专业证照。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.通过实名制验证的服务类用户按要求分别在《专业服务主页》、《实习中介主页》和《专业问答主页》填写提供服务的相关信息。专业服务用户，使用《专业服务主页》发布服务信息。实习中介服务用户，使用《实习中介主页》发布实习中介信息。专业问答服务用户，使用《专业问答主页》发布专业问题回答信息。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. 需求用户可建“需求用户主页”，并在该主页上发布需求。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. 需求用户购买专业服务在《专业服务主页》上进行；购买实习中介服务在《实习中介主页》上进行；有偿问答在《专业问答主页》进行。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.本站对服务用户和需求用户进行双向信息推送，分别在《专业服务主页》、《实习中介主页》、《专业问答主页》和《需求用户主页》的“系统信息推送”中显示。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.所有用户承诺遵守《中华人民共和国网络安全法》以及国家相关法律法规和「七条底线」、「九不准」的管理规定，不得以任何方式利用本站从事违反国家法律和社会公德的活动，不得从事侵害他人名誉、隐私、知识产权和其他合法权益的活动，不得制作、上传、复制、发布、传播或转载下列内容：<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（1）反对宪法所确定的基本原则的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（2）危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（3）损害国家荣誉和利益的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（4）煽动民族仇恨、民族歧视，破坏民族团结的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（5）破坏国家宗教政策，宣扬邪教和封建迷信的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（6）散布谣言，扰乱社会秩序，破坏社会稳定的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（7）散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（8）侮辱或者诽谤他人，侵害他人合法权益的；<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;（9）含有法律、行政法规禁止的其他内容的。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9. 本站负责监督用户履行上述承诺，有权对任何用户违反上述承诺的内容予以删除。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10. 用户在本站发表信息的行为属于自主行为，用户对自己在本站发表任何信息的行为独自承担法律责任。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三、关于知识产权<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 本站充分尊重用户的专业信息和权利，承诺保护知识产权。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 用户在本站发表的一切内容，知识产权归权利人本人所有。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. 用户将其在本站发表的全部专业信息，授予本站免费且不可撤销的长期使用许可，该许可包括本站有权将上述内容用于本站各种项目服务以及其它应用。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. 用户在向本站上传专业信息时如果不做声明，视为用户保留所有权并允许本站单独使用其上传至本站的信息，该信息将被标注为“禁止转载”，任何第三方转载该信息即为侵权。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. 用户在向本站上传专业信息时如果声明可以由第三方使用，则第三方在本站以外转载时，必须在显著位置注明信息作者名称及其在本站的帐号，注明发表于《不亦乐乎》，并给出原始链接。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. 用户上传至本站的专业信息涉及到本站提供的网络服务中包含的标识、版面设计、排版方式、文本、图片、图形、视频、项目安排、活动程序等，均存在本站的知识产权，对上述内容的任何形式的使用必须经本站同意，否则侵权。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. 本站有权但无义务对用户发布的专业信息进行审核，有权依据法律法规和相关证据以及本站管理原则处理侵权信息。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. 对第三方侵犯本站用户权利，用户授予本站代表用户运用行政和法律手段维权的权利，用户同意在本站认为必要时参与共同维权。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9. 用户上传至本站的专业信息不应当侵犯任何第三方的合法权益，否则由用户承担法律责任。用户上传至本站的内容，如果不是用户原创，用户必须先行取得权利人的合法授权并且主动显示该授权证明。如果第三方提出关于知识产权的异议，本站有权据此删除相关的内容。用户因侵害他人名誉、隐私、知识产权和其他合法权益给本站或第三方造成损失，由用户承担全部赔偿责任。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;四、关于支付结算<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 需求用户对服务用户在本站发表的专业信息以及线下服务产生的付费，其收益权属于服务用户。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 为保障需求用户和服务用户作为交易双方的费用支付的可靠性，需求用户和服务用户委托本站充当支付结算的第三方，通过本站采取代收代付方式处理交易双方的支付结算。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. 本站在1.0版期间暂不实行代收代付，由需求用户直接支付服务用户，即需求用户在服务用户主页扫描其付款二维码支付。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;五、关于用户个人隐私<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 本站采取切实措施保护用户的个人隐私信息，除法律及其授权的政府部门要求以及用户明确授权等情况外，本站保证不对外公开或向第三方透露用户个人隐私信息。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 用户可以在“个人设置”中修改“个人信息”部分的设置，使得本站以外的搜索检索时你的姓名不显示，并隐藏头像图片，以避免其它搜索引擎检索。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;六、关于免责申明<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 本站不能保证用户发表的内容的专业性、正确性和原创性。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 用户在本站发表的一切内容只是表示用户个人的意思，并不代表本站的意图。用户在本站发表的内容所引发的一切纠纷，由该内容的发表者承担全部法律及连带责任，本站不承担任何责任。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. 本站不保证网络服务一定能满足用户的要求，也不保证网络服务不会中断，对网络服务的及时性、安全性、准确性也都不作保证。本站对因不可抗力或不能控制的原因造成的网络服务中断或其它缺陷不承担任何责任。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;七、关于侵权举报<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 本站重视个性与合法权益的平衡，严格履行依照法律规定删除违法信息的法定义务。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 受理范围包括但不限于涉及个人隐私、造谣与诽谤、商业侵权等。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. 如果谁发现本站上存在侵犯自身合法权益的内容，可以通过点击内容下方的举报按钮来向本站进行投诉，并提交必要的材料以便投诉受理。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;八、关于协议修改<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 本站因法律法规变化以及业务发展需要，有权对本协议的条款作出修改或变更，并以在本站上公布修改协议内容的方式通知用户。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 修改协议内容公布后，用户继续使用本站，表示用户接受修改协议内容。<br>

                </p>
            </div>

        </div>
    </div>
</div>
@endsection
@section('custom-script')

@endsection
