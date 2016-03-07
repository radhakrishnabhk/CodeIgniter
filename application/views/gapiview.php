<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SEO Document</title>

<!-- SET: FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<!-- END: FAVICON -->

<!-- SET: STYLESHEET -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>gapi/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>gapi/css/bootstrap.css">
<link href="<?php echo base_url(); ?>gapi/css/style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>gapi/css/responsice.css" media="all">
<!-- END: STYLESHEET -->


<!-- SET: SCRIPTS -->
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>gapi/js/bootstrap.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="<?php echo base_url(); ?>gapi/js/jquery.appear.js"></script>
<script>

	$(document).ready(function() {
	
	
	(function (H) {
    function deferRender (proceed) {
        var series = this, 
            $renderTo = $(this.chart.container.parentNode);

        // It is appeared, render it
        if ($renderTo.is(':appeared') || !series.options.animation) {
            proceed.call(series);
            
        // It is not appeared, halt renering until appear
        } else  {
            $renderTo.appear(); // Initialize appear plugin
            $renderTo.on('appear', function () {
                proceed.call(series);
            });
        }
    };
    
    H.wrap(H.Series.prototype, 'render', deferRender);
    
}(Highcharts));	


	$(function () {
    $('.containerchart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Jan1',
                'Jan2',
                'Jan3',
                'Jan4',
                'Jan5',
                'Jan6',
                'Jan7',
                'Jan8',
                'Jan9',
                'Jan10',
                'Jan11',
                'Jan12',
				'Jan13',
				'Jan14',
				'Jan15',
				'Jan16',
				'Jan17',
				'Jan18',
				'Jan19',
				'Jan20',
				'Jan21',
				'Jan22',
				'Jan23',
				'Jan24',
				'Jan25',
				'Jan26',
				'Jan27',
				'Jan28',
				'Jan29',
				'Jan30',
				'Jan31',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Sessions',
				color: '#ff9900'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Sessions',
            data: [<?php echo implode(',',$janArray);?>],
			color: '#ff9900'

        }, {
            name: 'Past Sessions',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6],
			color: '#6aa84f'

        }]
    });
});


$(function () {
    $('.containerchart2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Jan1',
                'Jan2',
                'Jan3',
                'Jan4',
                'Jan5',
                'Jan6',
                'Jan7',
                'Jan8',
                'Jan9',
                'Jan10',
                'Jan11',
                'Jan12',
				'Jan13',
				'Jan14',
				'Jan15',
				'Jan16',
				'Jan17',
				'Jan18',
				'Jan19',
				'Jan20',
				'Jan21',
				'Jan22',
				'Jan23',
				'Jan24',
				'Jan25',
				'Jan26',
				'Jan27',
				'Jan28',
				'Jan29',
				'Jan30',
				'Jan31',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Sessions',
				color: '#ff9900'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Sessions',
            data: [<?php echo implode(',',$decArray);?>],
			color: '#ff9900'

        }, {
            name: 'Past Sessions',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
			color: '#6aa84f'

        }]
    });
});


$(function () {
    $('.containerchart3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?php 
                            
							echo implode(',',$myFirstArray);
			          ?>
                
               
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Users',
				color: '#ff9900'
            }
        },
		
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Users',
            data: [<?php echo implode(',',$firstuserArray); ?>],
			color: '#ff9900'

        }, {
            name: 'New Users',
            data: [<?php echo implode(',',$firstnewUsersArray); ?>],
			color: '#6aa84f'

        }]
    });
});


$(function () {
    $('.containerchart4').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?php

                           
							echo implode(',',$mySecondArray);
							
							?>
               
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Sessions',
				color: '#ff9900'
            }
        },
		
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Users',
            data: [<?php echo implode(',',$seconduserArray); ?>],
			color: '#ff9900'

        }, {
            name: 'New Users',
            data: [<?php echo implode(',',$secondnewUsersArray); ?>],
			color: '#6aa84f'

        }]
    });
});

$(function () {
    //alert(mycountryjson);
	//console.log(mycountryjson);
	//alert(myCountrySeriesJsonArray);
	//console.log(myCountrySeriesJsonArray);
    $('.chartdrill1').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                },
				 showInLegend: true
            }
        },
		

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Country',
            colorByPoint: true,
            data: <?php
							echo "[".$myFirstVar."]";
							?>
        }],
        drilldown: {
            series: []<?php 
			//$myVar = implode(',',$myCountrySeriesJsonArray);
			
			//echo  "[".$myVar."]";
			//$countryUsersArray = array();
			?> ,
        }
    });
});

$(function () {
    
    $('.chartdrill2').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                },
				 showInLegend: true
            }
        },
		

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'City',
            colorByPoint: true,
            data: <?php

                           
							echo "[".$mySecondVar."]";
							?>
         }],
        drilldown: {
            series:[] <?php 
			//$myVar = implode(',',$myCitySeriesJsonArray);
			
			//echo  "[".$myVar."]";?> ,
        }
    //}
	//);
      });

});
		
				
//jQuery(document).ready(function()
//{
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.performlist');
});


$(window).resize(function(){
  equalheight('.performlist');
});


		
$('em').tooltip();
	
	
var distance = $('.autumnsection').offset().top;
$window = $(window);
 $window.scroll(function() {
  if ( $window.scrollTop() ) {
	  $('.autumnsection').addClass('sticky');
  }else {
   	  $('.autumnsection').removeClass('sticky');
	 // $('.baner_btm').css({'display':'block'});
	 
	  
  }
 });	
 
 $(function() {  

    jQuery.scrollSpeed(100, 800);

});
	
	$(function() {
    function reposition() {
        var modal = $(this),
            dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });
});

	$(".hambuger a.list").click(function(e) {
        $(".hammenu").slideToggle();
		$(".mobapplist").slideUp();
    });

	$(".hammenu ul li a").click(function(e) {
        $(".hammenu").slideUp();
    });
	
	$(".mobappblock a.applist").click(function(e) {
        $(".hammenu").slideUp();
		$(".mobapplist").slideToggle();
		
    });
});
		
		
		
	//});
	
	$(document).ready(function () {
    $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.hammenu a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.hammenu ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}	
	
	
	
	
</script>
<!-- END: SCRIPTS -->

<!--[if lt IE 9]>
<script type="text/javascript">
  document.createElement("header");
  document.createElement("nav");
  document.createElement("section");
  document.createElement("article");
  document.createElement("aside");
  document.createElement("footer");
</script>
<![endif]-->
</head>

<body>
<?php 

/* view*/
				if($perBounceRate < 100.00){
					
					$upBounceRate = (-1)*($perBounceRate-100.00);
					
				}else{
					
					$downBounceRate = (-1)*(100.00 - $perBounceRate);
					
				}
				
				if($perAvgSessionDuration < 100.00){
					
					$upAvgSessionDuration = (-1)*($perAvgSessionDuration-100.00);
					
				}else{
					
					$downAvgSessionDuration = (-1)*(100.00 - $perAvgSessionDuration);
					
				}
				
				
				
				if($perReturningUsers < 100.00){
					
					$upReturningUsers = (-1)*($perReturningUsers-100.00);
					
				}else{
					
					$downReturningUsers = (-1)*(100.00 - $perReturningUsers);
					
				}
				
				
				if($perSessions < 100.00){
					
					$upSessions = (-1)*($perSessions-100.00);
					
				}else{
					
					$downSessions = (-1)*(100.00 - $perSessions);
					
				}
				
				
				if($perPercentNewSessions < 100.00){
					
					$upPercentNewSessions = (-1)*($perPercentNewSessions-100.00);
					
				}else{
					
					$downPercentNewSessions = (-1)*(100.00 - $perPercentNewSessions);
					
				}
				
				
				
				/* view*/

 /* view*/
				if($perOrganicSearches < 100.00){
					
					$upOrganicSearches = (-1)*($perOrganicSearches-100.00);
					
				}else{
					
					$downOrganicSearches = (-1)*(100.00 - $perOrganicSearches);
					
				}	
		  /* view*/
		  
		  /* view*/
				if($perPageViews < 100.00){
					
					$upPageViews = (-1)*($perPageViews-100.00);
					
				}else{
					
					$downPageViews = (-1)*(100.00 - $perPageViews);
					
				}
				
				/* view*/
				
				/* view*/
				if($perNewUsers < 100.00){
					
					$upNewUsers = (-1)*($perNewUsers - 100.00);
					
				}else{
					
					$downNewUsers = (-1)*( 100.00 - $perNewUsers );
					
				}
		  
		  /* view*/
		  
		  /* view*/
				if($perUsers < 100.00){
					
					$upUsers = (-1)*($perUsers - 100.00);
					
				}else{
					
					$downUsers = (-1)*( 100.00 - $perUsers );
					
				}

		/* view*/
		
		/* view*/  
				if($perViewsToSessions < 100.00){
					
					$upViewsToSessions = (-1)*($perViewsToSessions - 100.00);
					
				}else{
					
					$downViewsToSessions = (-1)*( 100.00 - $perViewsToSessions );
					
				}
				
				//$perReturningUsers = ((($janUsers-$janNewUsers)-($decUsers-$decNewUsers))/($decUsers-$decNewUsers))*100;
				/*$perReturningUsers = 24;
				if($perReturningUsers  < 100.00){
					
					$upReturningUsers = (-1)*($perReturningUsers - 100.00);
					
				}else{
					
					$downReturningUsers = (-1)*( 100.00 - $perReturningUsers );
					
				}*/
		  /* view*/

?>
<!-- wrapper starts -->
<div class="wrapper">
	
        	
            <!-- Header Starts -->
            <header>
            	<section class="container clearfix">
                	<a href="https://saloncloudsplus.com/">
                    	<img src="<?php echo base_url(); ?>gapi/images/logo.png" width="184" height="88" alt="Logo">
                    </a>
                	<h1>All <?php if(isset($web)){?> Web Site<?php }else{ ?> Mobile App<?php } ?> Data</h1>
                </section>
            </header>
            <!-- Header ends -->
            
            <!-- maincontent Starts -->
            <div class="main_content">
            	<div class="autumnsection">
                	<div class="container">
                    	<div class="autumnsectionin clear">
                        	<div class="autumncont">
                           		<ul class="clearfix">
								<?php if((int)date('m') > 4){?>
                                	<li><a href="#"><img src="<?php echo base_url(); ?>gapi/images/clouds.png" width="24" height="24" alt="img"></a></li>
                                <?php } else if((int)date('m') > 8) { ?>    
								
									<li><a href="#"><img src="<?php echo base_url(); ?>gapi/images/raining-dark-cloud.png" width="24" height="24" alt="img"></a></li>
                                <?php } else { ?>       
									
									<li><a href="#"><img src="<?php echo base_url(); ?>gapi/images/shining-sun.png" width="24" height="24" alt="img"></a></li>
                                
								<?php } ?>
								</ul> 
                            </div>
                            <div class="hambuger">
                            	<a href="#" class="list"><img src="<?php echo base_url(); ?>gapi/images/hamburger-with-mustard.png" width="24" height="24" alt="img"></a>
                                <div class="hammenu" >
                                	<ul>
                                    	<li><a href="#MonthlyPerformance">Monthly Performance</a></li>
                                        <li><a href="#Trafficomparison">Traffic Comparison </a></li>
                                        <li><a href="#TrafficSocial">Traffic from Different Social</a></li>
                                        <li><a href="#TrafficDevices">Traffic from Various Devices</a></li>
                                        <li><a href="#TrafficCity">Traffic by City</a></li>
                                        <li><a href="#TrafficCountry">Traffic Source by Country</a></li>
                                    </ul>
                                </div>
                            </div>
							<?php if(!isset($web)){?>
							<div class="mobappblock">
                            	<a class="applist">Total Mobile App Downloads <em><?php echo $totalNumber = array_sum($appData); ?></em></a>
                                <div class="mobapplist">
                                	<ul>
                                    	<li>
                                        	iPhone --> <?php echo $appData['iosDownloads'];?>
                                        </li>
                                    	<li>
                                        	Android --> <?php echo $appData['androidDownloads'];?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
                <div class="monthlysection">
                	<div class="container">
                    	
                        <section class="monthlysectionin" >
							<span class="scroll" id="MonthlyPerformance"></span>
                        	<h2>Monthly Performance Overview <span>(JAN '16 Compared to DEC '15)</span></h2>
                        
                        	<section class="col-xs-12 col-sm-4 performlist clear-fix">
                            	<h3><?php echo $janUsers;?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo $decUsers;?></small>
                                    <span class="<?php if(isset($upUsers)){ echo "greenarrow"; }else{ echo "redarrow"; }  ?>"><?php if(isset($upUsers)){ echo round($upUsers,2); }else{ echo round($downUsers,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">USERS<em title="The total number of users for the requested time period." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							
							<section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo $janNewUsers; ?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo $decNewUsers; ?></small>
                                    <span class="<?php if(isset($upNewUsers)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upNewUsers)){ echo round($upNewUsers,2); }else{ echo round($downNewUsers,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">NEW USERS<em title="The number of users whose session was marked as a first-time session." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							
							<section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janPercentNewSessions,2); ?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decPercentNewSessions,2); ?></small>
                                    <span class="<?php if(isset($upPercentNewSessions)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upPercentNewSessions)){ echo round($upPercentNewSessions,2); }else{ echo round($downPercentNewSessions,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">%NEW USER SESSIONS<em title="The percentage of sessions by people who had never visited your property before." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							
							<section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo ($janReturningUsers); ?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo ($decReturningUsers); ?> </small>
                                    <span class="<?php if(isset($upReturningUsers)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upReturningUsers)){ echo round($upReturningUsers,2); }else{ echo round($downReturningUsers,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">RETURNING USERS<em title="The number of users who visited atleast once before." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							<section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janViewsToSessions,2);?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decViewsToSessions,2);?></small>
                                    <span class="<?php if(isset($upViewsToSessions)){ echo "greenarrow"; }else{ echo "redarrow"; }  ?>"><?php if(isset($upViewsToSessions)){ echo round($upViewsToSessions,2); }else{ echo round($downViewsToSessions,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">PAGE VIEWS/SESSION<em title="The number of page views per session." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							<!--<section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo ($janUsers-$janNewUsers); ?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo ($decUsers - $decNewUsers); ?> </small>
                                    <span class="<?php if(isset($upSessions)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upSessions)){ echo round($upSessions,2); }else{ echo round($downSessions,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">RETURNING USER SESSIONS<em title="The number of sessions." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section> -->
                            
                            <section class="col-xs-12 col-sm-4 performlist clearfix">
                            	<h3><?php echo $janOrganicSearches;?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo $decOrganicSearches;?></small>
                                    <span class="<?php if(isset($upOrganicSearches)){ echo "greenarrow"; }else{ echo "redarrow"; }  ?>"><?php if(isset($upOrganicSearches)){ echo round($upOrganicSearches,2); }else{ echo round($downOrganicSearches,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">ORGANIC SEARCHES<em title="The number of organic searches that happened within a session. This metric is search engine agnostic." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
                            <section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janAvgSessionDuration,2);?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decAvgSessionDuration,2);?></small>
                                    <span class="<?php if(isset($upAvgSessionDuration)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upAvgSessionDuration)){ echo round($upAvgSessionDuration,2); }else{ echo round($downAvgSessionDuration,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">AVG SESSION DURATION(SECONDS)<em title="The average number of seconds that a user spends on one session(visit)." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
                            <!-- <section class="col-xs-12 col-sm-4 performlist">
                            	<h3>61.23%</h3>
                                <div class="clearfix percentagelist">
                                	<small>81.49-d%</small>
                                    <span class="redarrow">24.86-d%</span>
                                </div>
                                <a href="#" class="sessionbtn">% NEW SESSIONS-d<em title="SESSIONS Tooltip on top" data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section> -->
                            <section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo $janPageViews;?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo $decPageViews;?></small>
                                    <span class="<?php if(isset($upPageViews)){ echo "greenarrow"; }else{ echo "redarrow"; }  ?>"><?php if(isset($upPageViews)){ echo round($upPageViews,2); }else{ echo round($downPageViews,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn btn" style="text-decoration:underline;" <?php if(isset($web)){?>data-toggle="modal" data-target="#myModal"<?php } ?>><?php if(isset($web)){?>PAGE<?php }else {?>SCREEN <?php } ?> VIEWS<em title="The total number of pageviews in this time period." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
                            <section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janBounceRate,2);?>%</h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decBounceRate,2);?>%</small>
                                    <span class="<?php if(isset($upBounceRate)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upBounceRate)){ echo round($upBounceRate,2); }else{ echo round($downBounceRate,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn" >BOUNCE RATE (%)<em title="The percentage of single-page session (i.e., session in which the person left the first page)." data-placement="top" data-toggle="tooltip" href="#" data-original-title="SESSIONS Tooltip on top">i</em></a>
                            </section>
							<div class="clear"></div>
                            <!--
                            <section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janAvgSessionDuration,2);?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decAvgSessionDuration,2);?></small>
                                    <span class="<?php if(isset($upAvgSessionDuration)){ echo "greenarrow"; } else { echo "redarrow"; }  ?>"><?php if(isset($upAvgSessionDuration)){ echo round($upAvgSessionDuration,2); }else{ echo round($downAvgSessionDuration,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">AVG SESSION DURATION(SECONDS)</a>
                            </section>
                            
                           
                            
                            
                            
                            
                            
                            <section class="col-xs-12 col-sm-4 performlist">
                            	<h3><?php echo round($janViewsToSessions,2);?></h3>
                                <div class="clearfix percentagelist">
                                	<small><?php echo round($decViewsToSessions,2);?></small>
                                    <span class="<?php if(isset($upViewsToSessions)){ echo "greenarrow"; }else{ echo "redarrow"; }  ?>"><?php if(isset($upViewsToSessions)){ echo round($upViewsToSessions,2); }else{ echo round($downViewsToSessions,2); }  ?>%</span>
                                </div>
                                <a href="#" class="sessionbtn">PAGE VIEWS/SESSION</a>
                            </section> -->
                            
                        </section>
                        
                        
                        <div class="contentblock">
                            <div class="trafficcompare">
							    <span class="scroll" id="Trafficomparison"></span>
                                <h2>Traffic Comparison of Dec'15 and Jan'16</h2>
                                <div class="chart">
                                    <div class="containerchart" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                                </div>
                            </div>
                            
                        </div>
						
                        <div class="tablelist">
                        	<h2><?php if(isset($web)){ ?>Landing Page<?php }else{?> Screen <?php } ?> Traffic of jan'2016</h2>
                        
                        	<div class = "table-responsive">
                               <table class = "table">
                                  <thead>
                                     <tr>
                                        <th>&nbsp;</th>
                                        <th>Sessions</th>
                                        <th>Avg Session Duration(Seconds)</th>
                                        <th>% New Sessions</th>
                                        <th>New Users</th>
                                        <!-- <th>Page Views/Session</th>
                                        <th>Bounce rate (%)</th> -->
                                     </tr>
                                  </thead>
                                  
                                  <tbody>
								  
								  <?php 
								  $i = 1;
								  foreach($sessionsSArray as $key=>$result){
									  if($i<11){
                                  ?>
                                    <tr>
                                        <td><?php if(isset($web)) { echo "<a href='http://salonvanity.com".$resultSArray[$key]."'  target='_blank'>".substr($resultSArray[$key],0,12)."</a>"; } else { echo $resultSArray[$key]; } ?></td>
                                        <td><?php echo $sessionsSArray[$key]; ?></td>
                                        <td><?php echo $avgSessionDurationSArray[$key]; ?></td>
                                        <td><?php echo $newUsersSArray[$key]; ?></td>
                                        <td><?php echo $bounceRateUsersSArray[$key] ; ?></td>
                                        <!-- <td>3</td>
                                        <td>38.84</td>-->
                                    </tr>
                                  <?php
									  }
									  $i++;
									  }
									  
								  ?>
								                         
                                  </tbody>
                                  
                               </table>
                            </div>  
                            
                            
                       </div>
                       
                       	<div class="social">
						    <span class="scroll" id="TrafficSocial"></span>
                        	<h2>Traffic from Different Social Networks</h2>
                            <div class="chart">
                                    <div class="containerchart3" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                            </div>
                            
                            
                        	
                        </div>
                        
                        <div class="devices">
						    <span class="scroll" id="TrafficDevices"></span>
                        	<h2>Traffic from Various Devices</h2>
                            <div class="chart">
                                    <div class="containerchart4" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                            </div>
                            
                            
                        	
                        </div>
						<table>
                        
							</table>
							
                        <div class="trafficcity devices">
                            <span class="scroll" id="TrafficCountry"></span>
                        	<h2>Traffic Source by Country</h2>
                            <div class="chart">
                                    <div class="chartdrill1" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                            </div>
                            
                        	<div class="tablelist ">
                            	<div class = "table-responsive">
                               <table class = "table">
                                  <thead>
                                     <tr>
                                        <th>&nbsp;</th>
                                        <th>Sessions</th>
                                        <th>Users</th>
                                        <th>Page Views</th>
                                        <!-- <th>Bounce rate (%)</th> -->
                                     </tr>
                                  </thead>
                                  
                                  <tbody>
                                   <?php

                            
							$i = 1;
							foreach($countryUsersArray as $key=>$result):
							if($i <6 && $resultUsersArray[$key] != 'India' &&  $resultUsersArray[$key] != '(not set)'){
							?>
							<tr>
							  <td><?php echo $resultUsersArray[$key] ?></td>
							  <td><?php echo $sessionsUsersArray[$key] ?></td>
							  <td><?php echo $result; ?></td>
							  <td><?php echo $pageViewsUsersArray[$key]; ?></td>
							  <!-- <td><?php echo $bounceRateUsersArray[$key]; ?></td> -->
							</tr>
							<?php
							}
							$i++;
							endforeach
							?>
                               
                                    
                                  
                                    
                                    
                                     
                                  </tbody>
                                  
                               </table>
                            </div>
                            </div>
                            
                        </div>
                        
                        <div class="trafficcity devices" style="border:none;">
                            <span class="scroll" id="TrafficCity"></span>
                        	<h2>Traffic by City</h2>
                            <div class="chart">
                                    <div class="chartdrill2" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                            </div>
                            
                        	<div class="tablelist">
                            	<div class = "table-responsive">
                               <table class = "table">
                                  <thead>
                                     <tr>
                                        <th>&nbsp;</th>
                                        <th>Sessions</th>
                                        <th>Users</th>
                                        <th>Page Views</th>
                                        <!-- <th>Bounce rate (%)</th> -->
                                     </tr>
                                  </thead>
                                  
                                  <tbody>
                                    <?php

                            							$i = 1;
							foreach($acountryUsersArray as $key=>$result):
							if($i <6 && isset($aresultUsersArray[$key]) && strtolower($aresultUsersArray[$key]) != 'hyderabad' &&  $aresultUsersArray[$key] != '(not set)'){
							?>
							<tr>
							  <td><?php echo $aresultUsersArray[$key] ?></td>
							  <td><?php echo $asessionsUsersArray[$key] ?></td>
							  <td><?php echo $result; ?></td>
							  <td><?php echo $apageViewsUsersArray[$key]; ?></td>
							  <!-- <td><?php echo $abounceRateUsersArray[$key]; ?></td> -->
							</tr>
							
							<?php
							
							//$myCountryJsonArray[] = "{ name:"."'".$resultUsersArray[$key]."',  y: ".$result.", color:'".'#f4f4f4'."', drilldown :'".$resultUsersArray[$key]."' }";
							//$myCountrySeriesJsonArray[] = "{ name:"."'".$resultUsersArray[$key]."',  id:"."'".$resultUsersArray[$key]."', data: "." [ ['Sessions',".$sessionsUsersArray[$key]."],['Users',".$result."],['Page Views',".$pageViewsUsersArray[$key]."],['Bounce rate',".$bounceRateUsersArray[$key]."] ] }";
							
							}
							$i++;
							endforeach
							
							?>
                            							
                                   
                                    
                                     
                                  </tbody>
                                  
                               </table>
                            </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            	
            </div>
            <!-- aincontent ends -->
            
            <!-- footer starts -->
            <footer>
            </footer>
            <!-- footer ends -->
            
</div>
<!-- wrapper ends -->

<div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border:none !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="border:none !important;">
        
		
		
		<div class="tablelist">
                        	<h2>Stylist Page Views By Users</h2>
                        
                        	<div class = "table-responsive">
                               <table class = "table">
                                  <thead>
                                     <tr>
                                        
                                        <th>Stylist</th>
										<th>Users</th>                                        
                                     </tr>
                                  </thead>
                                  
                                  <tbody>
								  
								  <?php 
								  $i = 1;
								  foreach($staffPageViews as $key=>$result){
									  if($i<11){
                                  ?>

                                    <tr>
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $result; ?></td>
                                                                                
                                    </tr>
                                  <?php
									  }
									  $i++;
									  }
									  
								  ?>
								                         
                                  </tbody>
                                  
                               </table>
                            </div>  
                            
                            
                       </div>
		
		
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<style type="text/css">
.modal-body  {padding-top:0 !important;}
.modal-body .tablelist h2 {padding-top:0 !important;}
.modal-body .tablelist {margin:0 !important;}
</style>

</body>
</html>