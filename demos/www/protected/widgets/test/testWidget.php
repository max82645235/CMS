<?php
class testWidget extends CWidget
{
    public function init()
    {
        //����ͼ��ִ��$this->beginWidget()ʱ���ִ���������
        //������������в�ѯ���ݲ���
    }

    public function run()
    {
        //����ͼ��ִ��$this->endWidget()��ʱ���ִ���������
        //���������������Ⱦ��ͼ�Ĳ�����ע�������ᵽ����ͼ��widget����ͼ
        //ע��widget����ͼ�Ƿ��ڸ�widgetͬ����viewsĿ¼���棬�����������ͼ�������
        //  /protected/widget/test/views/test.php
        $this->render('test', array(
            'str'=>'WIDGET��ͼ����',
        ));
    }
}