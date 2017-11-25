<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<!-- /.website title -->
<title>Correction</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- CSS Files -->
<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
<link href="__PUBLIC__/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
<link href="__PUBLIC__/css/animate.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/css/owl.theme.css" rel="stylesheet">
<link href="__PUBLIC__/css/owl.carousel.css" rel="stylesheet">


<!-- Colors -->
<link href="__PUBLIC__/css/css-index.css" rel="stylesheet" media="screen">
<!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

<!-- Google Fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
</head>

<body>

<!-- /.preloader -->
<div id="top"></div>

<!-- NAVIGATION -->
<div id="head">
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-9">
					<h2>Hello, <?php echo ($uid); ?></h2>
				</div>
				<div class="col-lg-2">
	 				<input type="text" class="form-control" id="jumpnum" value=<?php echo ($_REQUEST['page']); ?>></input>
				</div>
	 			<div class="col-lg-1">
	 				<input type="button" class="btn" id="jump" value="Go"></input>
	 				<a href="#"></a>
				</div>
				</div>
		</div>
		
	</div>
</div>


<div id="sentences">
	<div class="container">
		<?php if(is_array($caption)): foreach($caption as $key=>$c): ?><div class="row">
				<div class="col-lg-8">
					<div><h4><?php echo ($c['en']); ?></h4></div>
					<div><h4 id="h<?php echo ($c['cno']); ?>"><?php echo ($c['ch']); ?></h4></div>
					<div><br></div>
				</div>
				<div class="col-lg-4">
					<input type="button" class="btn-change btn-primary" value="Change">
				</div>
			</div>

			<div class="row">
				<form class="form-header" style="display:none"  role="form" method="POST" id="cno<?php echo ($c['cno']); ?>">
					<div class="form-group">
						<input class="form-control input-lg" name="changed_trans" type="text" value="<?php echo ($c['ch']); ?>" required>
					</div>
					<div class="form-group last">
						<input type="button" class="btn btn-warning btn-block btn-lg btn-modify" id="<?php echo ($c['cno']); ?>" value="SUBMIT">
					</div>
				</form>
			</div><?php endforeach; endif; ?>
	</div>
</div>


<div id="changepage">
	<div class="container">
		<ul class="pager">
    		<li id="Prev"><a href="">Prev</a></li>
    		<li id="Next"><a href="">Next</a></li>
		</ul>	
	</div>
</div>

<!-- /.footer -->
<footer id="footer">
	<div class="container">
		<div class="col-sm-4 col-sm-offset-4">
		<hr>
			<div class="text-center wow fadeInUp">Copyright Backyard 2017</div>
			<a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
		</div>
	</div>
</footer>

	<!-- /.javascript files -->
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/custom.js"></script>
    <script src="__PUBLIC__/js/jquery.sticky.js"></script>
	<script src="__PUBLIC__/js/wow.min.js"></script>
	<script src="__PUBLIC__/js/owl.carousel.min.js"></script>
	<script>
		new WOW().init();
		$(document).ready(function(){

			$("#jump").click(function(){

				var jumpnum = $("#jumpnum").val();

				$.post("<?php echo U('Index/Pagejump/jump');?>",{jumpnum:jumpnum},function(data){
					console.log(data);
					if(data.status == 1){
						
						location.href=jumpnum;
						onsole.log("aaa");
					}
					else{
						alert("页面不存在");
					}

					console.log("heres");

				})
			})

			$("#Prev").click(function(){

				var prevnum = parseInt($("#jumpnum").val()) - 1;

				$.post("<?php echo U('Index/Pagejump/prev');?>",{prevnum:prevnum},function(data){
					console.log(data);
					if(data.status == 1){
						
						location.href=prevnum;
						onsole.log("aaa");
					}
					else{
						alert("页面不存在");
					}

					console.log("heres");

				})
			})

			$("#Next").click(function(){

				var nextnum = parseInt($("#jumpnum").val()) + 1;

				$.post("<?php echo U('Index/Pagejump/next');?>",{nextnum:nextnum},function(data){
					console.log(data);
					if(data.status == 1){
						
						location.href=nextnum;
						onsole.log("aaa");
					}
					else{
						alert("页面不存在");
					}

					console.log("heres");

				})
			})

			$(".btn-modify").click(function(){

				var old_ch = $("#h"+$(this).attr('id')).text();

				var new_ch = $(this).parent().prev().children().val();

				$.post("<?php echo U('Index/Change/change');?>",{new_ch:new_ch, old_ch:old_ch, cno:$(this).attr('id')},function(data){
					console.log(data);
					if(data.status == 1){
						location.href="<?php echo U('Index/Main/index', array('page'=>session('page')));?>";
						console.log("aaa");
						if(data.log != 1)
							alert("增添日志失败");
					}
					else{
						alert("更改失败");
					}
					console.log("heres");
					console.log(data.old);
				})
			})



		    $(".btn-change").click(function(){
		        if($(this).parent().parent().next().children().css('display') == 'none'){
		            $(this).parent().parent().next().children().css('display','');
                    $(this).val("Cancel");
                }
                else{
		        	$(this).parent().parent().next().children().css('display','none');
		        	$(this).val("Change");
                }
            })
        })
	</script>
  </body>
</html>