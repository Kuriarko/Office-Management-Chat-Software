
<!DOCTYPE html>
<html lang="en">

<head>
    <title>smfwb</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pignose.calender.css" />
    <!--// Calender Css -->
    <!-- Common Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header" style="background-color: #DAA520;">
                <h1>
                    <a  style="font-size: 25px; color: black;">State Medical Faculty Of West Bengal</a>
                </h1>
               <img src="<?php echo base_url();?>assets/img/smfwb-logo.png" style="width: 150px; margin-top: 30px;"></img>
            </div>
           
            <ul class="list-unstyled components" >
                
                <li style="margin-bottom: 30px;">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-caret-square-o-down" style="float: right;"></i>
                        User Master
                       
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/addusers">Add users</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/viewusers">View Users</a>
                        </li>
                    
                    </ul>
                </li>
				
				      <li style="margin-bottom: 30px;">
                    <a href="#lalalala" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-caret-square-o-down" style="float: right;"></i>
                        IT-Division Master
                        
                    </a>
                    <ul class="collapse list-unstyled" id="lalalala">
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/addadmin_managers">Add IT Employee</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/viewAdmin_manager">View IT Employee</a>
                        </li>
                    
                    </ul>
                </li>
				
				  <li style="margin-bottom: 30px;">
                    <a href="#Submenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-caret-square-o-down" style="float: right;"></i>
                        Diary Master
                        
                    </a>
                    <ul class="collapse list-unstyled" id="Submenu">
                        <li>
					    <a href="<?php echo base_url();?>Mycontroller/newdiary">Generate Diary To Users</a>
                        </li>
						
						<li>
					    <a href="<?php echo base_url();?>Mycontroller/newdiary_admin_manager">Generate Diary To IT Division</a>
                        </li>
						
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/diarystatus">View Diary Table</a>
                        </li>
						
						<li>
                            <a href="<?php echo base_url();?>Mycontroller/diaryapproval">Diary Approvals</a>
                        </li>
						
						<li>
                            <a href="<?php echo base_url();?>Mycontroller/admin_assigneddiariestables">My Assigned Diaries</a>
                        </li>
						
							<li>
                            <a href="<?php echo base_url();?>Mycontroller/Secretarydiaryhistory">History</a>
                        </li>
                    </ul>
                </li>
				
				
				  <li style="margin-bottom: 30px;">
                    <a href="#Submenu1" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-caret-square-o-down" style="float: right;"></i>
                        Set New Counter
                        
                    </a>
                    <ul class="collapse list-unstyled" id="Submenu1">
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/setsequence">Set New Receiving Sequence</a>
                        </li>
						
						 <li>
                            <a href="<?php echo base_url();?>Mycontroller/setsequence1">Set New Despatch Sequence</a>
                        </li>
                        
                    
                    </ul>
                </li>
				
				
					  <li style="margin-bottom: 30px;">
                    <a href="#Submenu2" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-caret-square-o-down" style="float: right;"></i>
                        Live Chat
                        
                    </a>
                    <ul class="collapse list-unstyled" id="Submenu2">
                        <li>
                            <a href="<?php echo base_url();?>Mycontroller/chatadmintomgr">Chat With IT Division</a>
                        </li>
						
						 <li>
                            <a href="<?php echo base_url();?>Mycontroller/chatbegin">Chat With Users</a>
                        </li>
                        
                    
                    </ul>
                </li>
				
				
				
				
            
				
          
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fa fa-bars" style="font-size:24px"></i>
                        </button>
						
						<a href="<?php echo base_url();?>Mycontroller/admin_home"><button type="button" class="btn btn-info navbar-btn">
                            <i class="fa fa-home" style="font-size:24px"></i>
                        </button></a>
                    </div>
                   
                    <ul class="top-icons-agileits-w3layouts float-right">
					
					<!---user notification--------->
					    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                              <i class="fa fa-group" style="font-size:24px" id="show"></i>
                            </a>
                            <div class="dropdown-menu drop-3" >
                                <div class="profile d-flex mr-o" >
                                    
                                    <div class="profile-r align-self-center" >
                                        <h3 class="sub-title-w3-agileits" id="customers-list"></h3>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </li> 
						
						<!------IT Division notification----------->
						 <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                             <i class="fa fa-commenting" style="font-size:24px" id="show2"></i>
                            </a>
                            <div class="dropdown-menu drop-3" >
                                <div class="profile d-flex mr-o" >
                                    
                                    <div class="profile-r align-self-center" >
                                        <h3 class="sub-title-w3-agileits" id="customers-list2"></h3>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </li> 
						
						
						<!------Diary notification----------->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-book" style="font-size:24px"></i>
                                <span class="badge">4</span>
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-1">
                                <h3 class="sub-title-w3-agileits">Diary notifications</h3>
                                <a href="<?php echo base_url();?>Mycontroller/diaryapproval" class="dropdown-item mt-3">
                                    <div class="notif-img-agileinfo">
                                        <img src="<?php echo base_url();?>assets/img/clone.jpg" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="notif-content-wthree">
                                        <p class="paragraph-agileits-w3layouts py-2">
                                            <span class="text-diff">New Incoming Diary Requests</span> </p>
                                        <h6>4 mins ago</h6>
                                    </div>
                                </a>
                          
                               
                            </div>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                 <i class="fa fa-cog" style="font-size:24px"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?php echo $records->name;?></h3>
                                        <a href="mailto:info@example.com"><?php echo $records->email;?></a>
                                    </div>
                                </div>
                               
                              
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Mycontroller/adminlogout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
			
			
			
			 <!-- Required common Js -->
    <script src='<?php echo base_url();?>assets/js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->
    
    <!-- loading-gif Js -->
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Graph -->
    <script src="<?php echo base_url();?>assets/js/SimpleChart.js"></script>
    <script>
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [{
                    X: "6",
                    Y: 300.00
                },
                {
                    X: "7",
                    Y: 101.98
                },
                {
                    X: "8",
                    Y: 140.00
                },
                {
                    X: "9",
                    Y: 340.00
                },
                {
                    X: "10",
                    Y: 470.25
                },
                {
                    X: "11",
                    Y: 180.56
                },
                {
                    X: "12",
                    Y: 680.57
                },
                {
                    X: "13",
                    Y: 740.00
                },
                {
                    X: "14",
                    Y: 800.89
                },
                {
                    X: "15",
                    Y: 420.57
                },
                {
                    X: "16",
                    Y: 980.24
                },
                {
                    X: "17",
                    Y: 1080.00
                },
                {
                    X: "18",
                    Y: 140.24
                },
                {
                    X: "19",
                    Y: 140.58
                },
                {
                    X: "20",
                    Y: 110.54
                },
                {
                    X: "21",
                    Y: 480.00
                },
                {
                    X: "22",
                    Y: 580.00
                },
                {
                    X: "23",
                    Y: 340.89
                },
                {
                    X: "0",
                    Y: 100.26
                },
                {
                    X: "1",
                    Y: 1480.89
                },
                {
                    X: "2",
                    Y: 1380.87
                },
                {
                    X: "3",
                    Y: 1640.00
                },
                {
                    X: "4",
                    Y: 1700.00
                }
            ]
        };
        $(function () {
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });
    </script>
    <!--// Graph -->
    <!-- Bar-chart -->
    <script src="<?php echo base_url();?>assets/js/rumcaJS.js"></script>
    <script src="<?php echo base_url();?>assets/js/example.js"></script>
    <!--// Bar-chart -->
    <!-- Calender -->
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/pignose.calender.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
        //]]>
    </script>
    <!--// Calender -->

    <!-- profile-widget-dropdown js-->
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    <!--// profile-widget-dropdown js-->

    <!-- Count-down -->
    <script src="<?php echo base_url();?>assets/js/simplyCountdown.js"></script>
    <link href="<?php echo base_url();?>assets/css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->

    <!-- pie-chart -->
    <script src='<?php echo base_url();?>assets/js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;

            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$("#show").hover(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('mycontroller/show_adminmessages1'); ?>",
        success: function(data) {
            $("#customers-list").html(data);
			
        }
    });
});
</script>
<script type="text/javascript">
$("#show2").hover(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('mycontroller/show_adminmessages2'); ?>",
        success: function(data) {
            $("#customers-list2").html(data);
			
        }
    });
});
</script>

</body>
</html>