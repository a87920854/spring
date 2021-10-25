<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.fileupload.js"></script>
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>

<p></p>
<form id="fun_form" method="post" action="singleweb_fun8_add.asp?st=add" onsubmit="return chk_form()">
    <p>
        <label>連結位置：
            <input type="text" id="d1" name="d1" value="" style="width:40%;height:26px;" required></label>
        <label>ALT：
            <input type="text" id="alt" name="alt" value="" style="width:40%;height:26px;"></label>
    </p>
    <p>
        <label>展示圖檔(690x330)：</label>


    <div>
        <img id="show_img" src="img/lovepy_noimg.jpg" height=80>
        <span class="btn btn-info fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="fileupload" type="file" class="fileupload" name="fileupload"></span>
        <div id="progress" class="progress progress-striped" style="display:none">
            <div class="bar progress-bar progress-bar-lovepy"></div>
        </div>
    </div>
    <div id="fileupload_show"></div>
    <input type="hidden" name="d2" id="d2" value="">
    </p>

    </div>
    <center><button type="submit" class="btn btn-danger" style="width:40%;height:28px;">確認送出</button></center>
</form>

<script type="text/javascript">
    var $fsend = 0;

    function chk_form() {
        if (!$("#d2").val() || $fsend) return true;
        if ($("#d2").val() && !$fsend) return true;
        return false;
    }


    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "singleweb_fun8_add.asp?st=upload&an=",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            $("#d2").val(data.result);
                            $("#show_img").attr("src", "singleparty_image/event/" + data.result);
                            $fsend = 1;
                            $("#fun_form").submit();
                        }
                    },
                    fail: function(e, data) {

                    },
                    progressall: function(e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $progress.show().find(".progress-bar").css(
                            'width',
                            progress + '%'
                        );
                    },
                    add: function(e, data) {
                        var uploadErrors = [];
                        var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                        if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                            uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
                        }
                        if (data.originalFiles[0]['size'] > 5000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                        }
                        if (data.files) {
                            $("#fileupload_show").html(data.files[data.files.length - 1].name);
                            $("#d2").val(data.files[data.files.length - 1].name);
                            data.submit();
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
    /*
    		$(function() {
    $('#file_upload').uploadify({
    				'auto'     : true,
    				'width'    : 120,
    				'height'   : 30,
    				'multi'    : false,
    				'method'   : 'get',
    				'swf'      : 'js/uploadify.swf',
    				'uploader' : 'springweb_fun1_add.asp?st=upload&an=',
    				'removeCompleted' : true,
    				'fileTypeExts' : '*.gif; *.jpg;',
    				'fileTypeDesc' : '請選擇 jpg, gif 檔案',
    				'fileSizeLimit': '1000KB',
            'onUploadSuccess' : function(file, data, response) {
    		  location.href='win_close.asp?m=上傳完成';
            },
            'onSelect' : function(file) {
             var d1v=$('#d1').val();      
             if(d1v.replace(/\s/g,'') == ''){     
             alert("請輸入連結位置。");
             $('#file_upload').uploadify('cancel', '*');
             return false;     
             }
             $('#file_upload').uploadify('settings','formData',{
               'd1':d1v
            });
            $('#file_upload').uploadify('disable', true);
            },        
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            	$('#file_upload').uploadify('disable', false);
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString +":"+ errorMsg);
            },
            'onUploadStart' : function(file) {
            },
            'onSelectError':function(file, errorCode, errorMsg){
               switch(errorCode) {  
                   case -100:  
                       alert("上傳的照片已經超過系統限制的 "+$('#file_upload').uploadify('settings','queueSizeLimit')+" 個檔案！");  
                       break;
                   case -110:  
                       alert("照片 ["+file.name+"] 大小超出系統限制的"+$('#file_upload').uploadify('settings','fileSizeLimit')+"大小！");  
                       break;  
                   case -120:  
                       alert("照片 ["+file.name+"] 大小異常！");  
                       break;  
                   case -130:  
                       alert("照片 ["+file.name+"] 類型不正確！");  
                       break;  
                   break;
               }
            },
            'onFallback':function(){             //??FLASH失??用  
                alert("您尚未安裝 FLASH Player，請安裝後再使用。");  
            }    
    		});
    		
    		$("#edit_link_button").click(function(){
    		  var $d1 = $("#d1").val();
    		  var $bd1 = $("#bd1").val();
    		  if($d1 == $bd1) {
    		  	alert("連結位置與目前的資料沒有不同，請確認後再修改，目前連結位置為："+ $bd1);
    		  	return false;
    		  }
    		  $.ajax({
    		  type: "POST",
          url: "springweb_fun1_add.asp",
          data: { st: "ups", d1: $d1, an: "" }
          }).done(function() {
            location.reload();
          });
    	  });
    });*/
</script>