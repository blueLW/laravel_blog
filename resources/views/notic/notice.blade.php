<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <!--<meta http-equiv="refresh" content="3;url=<?php echo $url ?>">-->
  <meta name="Description" content="">
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>SUCCESS</title>
  <style>
	.box{margin:200px;auto;text-align:center}
	.box p{font-size:20px;}
  </style>
 </head>
 <body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align:center;" id="myModalLabel">通知</h4>
            </div>
            <div class="modal-body"  style="text-align:center;letter-spacing:2.5px">{{$msg}}</div>
            <div class="modal-footer">
                <button type="button" id="yes" class="btn btn-primary">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
<script>
$(document).ready(function(){
	$('#myModal').modal('show');
    $("#yes").click(function(){
       location.href="{{$url}}";
    });
});
</script>
 </body>
</html>
