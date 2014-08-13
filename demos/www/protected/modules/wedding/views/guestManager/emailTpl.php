<?php $keyUrl = Yii::app()->getBaseUrl(true).'/wedding/guestManager/emailKeyConfirm?=saltKey='.urlencode($model->salt_key)?>
<html>
<body>
<div style="width:700px;margin:0 auto;">
    <div style="border-top: 1px solid #ccc; margin-top: 20px;"></div>
    <div style="padding:20px 10px 60px;">
        <div style="line-height:1.5;color:#4d4d4d;">
            <h3 style="font-weight:normal;font-size:16px;">亲爱的<?=$model->name?>：</h3>

            <p style="font-size:14px;margin-top:15px;">六年的爱情长跑，我们终于迎来了此刻，我们决定2014年10月1日甜蜜大婚。烟酒喜糖已备好，诚邀您共同见证我们的幸福时刻!我相信你一定会出现在我们的婚礼现场，有你到场喜气洋洋！</p>
        </div>
        <div style="font-size:12px;margin-top:30px;">
            <p style="color:#666;">本链接是我们为你准备的电子请帖函,欢迎光临我们的小站喔!(如果点击无效，请复制下方网页地址到浏览器地址栏中打开)：</p>
            <p style="margin-top:5px;word-wrap:break-word;word-break:break-all;">
                <a target="_blank" style="color:#8a8a8a;text-decoration:none;" href="<?=$keyUrl?>">
                    <?=$keyUrl?>
                </a>
            </p>
        </div>
    </div>
    <div style="border-bottom: 1px dashed #d8d8d8"></div>
</div>
</body>
</html>
