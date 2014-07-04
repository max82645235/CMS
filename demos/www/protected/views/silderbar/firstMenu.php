<style>
#action_btn{text-align: center;}
.btn_margin {margin: 0 10px;}
</style>
<div class="span6" style="margin-left: auto;margin-right: auto;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="#">
                <div class="control-group">
                    <label class="control-label">标题名称</label>
                    <div class="controls">
                        <input type="text" name="title">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Radio inputs</label>
                    <div class="controls">
                        <label><input type="radio" name="top" />First One</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">图标Icon</label>
                    <div class="controls">
                        <input type="text" name="icon">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">排序</label>
                    <div class="controls">
                        <input type="text" name="sort" id=>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">链接地址</label>
                    <div class="controls">
                        <input type="text" name="url">
                    </div>
                </div>
                <div class="form-actions" id="action_btn" >
                    <button type="submit" class="btn btn-success btn_margin">Save</button>
                    <button type="reset" class="btn btn-primary btn_margin">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

