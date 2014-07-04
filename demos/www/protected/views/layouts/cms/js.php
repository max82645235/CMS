
<?php
/*js文件路径前缀*/
$jsPathPrifix = Yii::app()->baseUrl."/js/cms/";;
?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'excanvas.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'bootstrap.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.ui.custom.js');?>

<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.peity.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'fullcalendar.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.js');?>


<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.chat.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.validate.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.form_validation.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.wizard.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.uniform.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'select2.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.popover.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.dataTables.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.tables.js');?>

<?php // Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.flot.min.js');?>
<?php // Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.flot.resize.min.js');?>
<?php // Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.dashboard.js');?>
<?php // Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'jquery.gritter.min.js');?>
<?php // Yii::app()->clientScript->registerScriptFile($jsPathPrifix.'matrix.interface.js');?>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>