<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript">
$.fn.passwordStrength = function( options ){
	return this.each(function(){
		var that = this;that.opts = {};
		that.opts = $.extend({}, $.fn.passwordStrength.defaults, options);
		
		that.div = $(that.opts.targetDiv);
		that.defaultClass = that.div.attr('class');
		
		that.percents = (that.opts.classes.length) ? 100 / that.opts.classes.length : 100;

		 v = $(this)
		.keyup(function(){
			if( typeof el == "undefined" )
				this.el = $(this);
			var s = getPasswordStrength (this.value);
			var p = this.percents;
			var t = Math.floor( s / p );
			
			if( 100 <= s )
				t = this.opts.classes.length - 1;
				
			this.div
				.removeAttr('class')
				.addClass( this.defaultClass )
				.addClass( this.opts.classes[ t ] );
				
		})
		.after('<a href="#">Generate Password</a>')
		.next()
		.click(function(){
			$(this).prev().val( randomPassword() ).trigger('keyup');
			return false;
		});
	});

	function getPasswordStrength(H){
		var D=(H.length);
		if(D>5){
			D=5
		}
		var F=H.replace(/[0-9]/g,"");
		var G=(H.length-F.length);
		if(G>3){G=3}
		var A=H.replace(/\W/g,"");
		var C=(H.length-A.length);
		if(C>3){C=3}
		var B=H.replace(/[A-Z]/g,"");
		var I=(H.length-B.length);
		if(I>3){I=3}
		var E=((D*10)-20)+(G*10)+(C*15)+(I*10);
		if(E<0){E=0}
		if(E>100){E=100}
		return E
	}

	function randomPassword() {
		var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$_+";
		var size = 10;
		var i = 1;
		var ret = ""
		while ( i <= size ) {
			$max = chars.length-1;
			$num = Math.floor(Math.random()*$max);
			$temp = chars.substr($num, 1);
			ret += $temp;
			i++;
		}
		return ret;
	}

};
	
$.fn.passwordStrength.defaults = {
	classes : Array('is10','is20','is30','is40','is50','is60','is70','is80','is90','is100'),
	targetDiv : '#passwordStrengthDiv',
	cache : {}
}
$(document)
.ready(function(){
	$('input[name="password"]').passwordStrength();
	$('input[name="password2"]').passwordStrength({targetDiv: '#passwordStrengthDiv2',classes : Array('is10','is20','is30','is40')});

});
</script>
<style>
.is0{background:url(assets/images/progressImg1.png) no-repeat 0 0;width:138px;height:7px;}
.is10{background-position:0 -7px;}
.is20{background-position:0 -14px;}
.is30{background-position:0 -21px;}
.is40{background-position:0 -28px;}
.is50{background-position:0 -35px;}
.is60{background-position:0 -42px;}
.is70{background-position:0 -49px;}
.is80{background-position:0 -56px;}
.is90{background-position:0 -63px;}
.is100{background-position:0 -70px;}

#passwordStrengthDiv2.is0{background:url(assets/images/progressImg2.png) no-repeat 0 0;width:27px;height:30px;display:inline-block;}
#passwordStrengthDiv2.is10{background-position:-27px 0;}
#passwordStrengthDiv2.is20{background-position:-53px 0;}
#passwordStrengthDiv2.is30{background-position:-79px 0;}
#passwordStrengthDiv2.is40{background-position:-106px 0;}
</style>
</head>

<body>
<input type="password" name="password"/>
<div id="passwordStrengthDiv" class="is0"></div>

<input type="text" name="password2"/>
<div id="passwordStrengthDiv2" class="is0"></div>
</body>
</html>
