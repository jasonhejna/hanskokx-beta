<!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="/assets/js/jquery.validate.pack.js" type="text/javascript"></script>
    <script src="/assets/js/html5.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.notifyBar.js" type="text/javascript"></script>
    <script src="/assets/js/motionpack.js" type="text/javascript"></script>
    <script src="/assets/js/modernizr-1.6.min.js" type="text/javascript"></script>
<!-- Stylesheets -->
	<link rel="stylesheet" href="/assets/css/styles.css" media="all" type="text/css" />
	<link rel="stylesheet" href="/assets/css/login.css" media="all" type="text/css" />


    <script type="text/javascript">
        $(document).ready(function() {

            $(".signin").click(function(e) {
                e.preventDefault();
                $("fieldset#signin_menu").toggle();
                $(".signin").toggleClass("menu-open");
            });

            $("fieldset#signin_menu").mouseup(function() {
                return false
            });
            $(document).mouseup(function(e) {
                if($(e.target).parent("a.signin").length==0) {
                    $(".signin").removeClass("menu-open");
                    $("fieldset#signin_menu").hide();
                }
            });

        });
    </script>
		<title><? echo $title; ?></title>
	</head>