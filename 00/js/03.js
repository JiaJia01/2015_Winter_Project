/*Minted*/

$(document).ready(function() {
	$("input[type='button']").click(function() {
		var inputValue = $("#comment").val();
		var inputName = $("#author").val();
		var inputEmail = $("#email").val();
		var now = (new Date()).toLocaleString();

		if (inputName ==""&&inputEmail !==""&&inputValue !==""){
			alert('请输入您的名字！');
			$("#author").focus();
			return false;

		};
		if (inputName !==""&&inputEmail ==""&&inputValue !==""){
			alert('请输入您的邮箱！');			
			$("#email").focus();
			return false;

		};
		if (inputName !==""&&inputEmail !==""&&inputValue ==""){
			alert('请输入您的评论内容！');			
			$("#comment").focus();
			return false;
			
		};
		if (inputName ==""&&inputEmail ==""&&inputValue ==""){
			alert('请输入您的名字、邮箱、评论内容！');
		};

		if(inputName !==""&&inputEmail !==""&& inputValue !=="") {
				
				var $comment = $("<li>"+
							"From"+ "<cite>"+"<a href='' rel=''>"+'&nbsp;'+inputName+'&nbsp;'+"</a>"+"</cite>" +		
						now+"<div class='commentdata'>"+
									
							"<img alt='' src='../img/thumb_03.jpg' height='32' width='32' />"+			
							"<p>"+"<br />"+
							inputValue+"</p>"+
						"<div class='clear'></div>"+
						"</div>"+
					"</li>");

				$("#pinglun li:last-child").after($comment);
				document.commentform.reset();
				
				
				

		};
			
		

		var com_num =$('.commentlist').children('li').length;
		$("#comments").replaceWith("<h1>"+com_num+'&nbsp;'+"Comments"+"</h1>");
		$("#comment_pro").replaceWith(com_num);
	});


});

		




