	<div class="container job-province">

		<div class="row">
		<div class="col-sm-4 ">
			<!-- <div class="col-sm-12 "> -->
				<div class="job-province-box">
				<?php if (isset($searchHorizontal)) {
	echo $searchHorizontal;
}
?>
			</div>
		<!-- </div> -->
			<div class="job-hight-light job-province-box  margin-top-10">
				<div class=" text-center background-color-3 margin-bottom-5">
					<h1 class="title-job-hight-light">Việc làm nổi bật</h1>

				</div>
				<?php $listJobShow = $this->globals->getRecruitmentShow(2);
if (isset($listJobShow) && count($listJobShow) > 0) {
	foreach ($listJobShow as $value) {?>
				<div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span><a href="<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->rec_id . '.html'?>">
								<?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title;?>
								</a></label>
								<span><?php echo $value->employer_name;?></span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i><?php echo $value->career_name;?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i><?php echo date('d/m/Y', strtotime($value->rec_job_time));?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i><?php echo $value->salary_value;?></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i><?php echo $value->province_name;?></div>
						</div>
				</div>
	<?php }
}
?>

				<!-- <div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span>Tuyển nhân viên</label>
								<span>Công ty abx</span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i></div>
						</div>
				</div>
				<div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span>Tuyển nhân viên</label>
								<span>Công ty abx</span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i></div>
						</div>
				</div>
				<div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span>Tuyển nhân viên</label>
								<span>Công ty abx</span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i></div>
						</div>
				</div>
				<div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">
								<label><span class="btn-warning">qc</span>Tuyển nhân viên</label>
								<span>Công ty abx</span>
							</div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-tag"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-calendar-o"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-money"></i></div>
							<div class="col-sm-6 col-xs-6"><i class="fa fa-map-marker"></i></div>
						</div>
				</div> -->
				<!-- <div class="item-job-hl">
						<div class="row">
							<div class="col-sm-12">123123123</div>
							<div class="col-sm-6 col-xs-6">123</div>
							<div class="col-sm-6 col-xs-6">123</div>
							<div class="col-sm-6 col-xs-6">123</div>
							<div class="col-sm-6 col-xs-6">123123</div>
						</div>
				</div> -->
			</div>
		</div>
		<div class="col-sm-8 ">

		<!-- <div class="col-sm-12"> -->
				<div class="row">
					<div class="col-sm-12 margin-top-5">
						<div  id="map-search"></div>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-12 padding-lr-10 group">
					<div class="col-sm-4 margin-top-5 padding-lr-5 item-group">
						<div class="item-menu-job-search create-form">
							<table>
								<tr>
									<td>
										<span class="title-menu-job create-form-color">Tạo hồ sơ</span>
										<label class="description-menu-job">Cách nhanh nhất để được mời phỏng vấn</label>
									</td>
									<td class="td-icon-job">
										<h1 class="icon-job create-form-color"><i class="fa fa-paper-plane"></i></h1>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-sm-4 margin-top-5 padding-lr-5 item-group">
						<div class="item-menu-job-search post-job">
							<table>
								<tr>
									<td>
										<span class="title-menu-job post-job-color">Đăng tin</span>
										<label class="description-menu-job">Nhanh chóng tiếp cận hàng trăm nghìn người tìm việc.</label>
									</td>
									<td class="td-icon-job">
										<h1 class="icon-job post-job-color"><i class="fa fa-file-text-o"></i></h1>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-sm-4 margin-top-5 padding-lr-5 item-group">
						<div class="item-menu-job-search">
							<table>
								<tr>
									<td>
										<span class="title-menu-job post-job-color">HOTLINE</span>
										<label class="description-menu-job">XXX-XXX-XXXX</label>
									</td>
									<td class="td-icon-job">
										<h1 class="icon-job post-job-color"><i class="fa fa-phone"></i></h1>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				</div>
				<div class="job-province-alert text-center">
				<?php if (isset($listJob) && count($listJob) > 0) {?>
				<h1 class="numjob-province-title">Tìm thấy&nbsp;<label> <?php echo $numjob;?></label> việc làm </h1>
					<div class="border-bottom-title border-color-1"></div>
					<!-- Có <span class="text-danger num-job-province"><?php echo count($listJob);?></span> việc làm tại <?php echo $province->province_name;?> -->
				<?php } else {?>
					Không tìm thấy việc làm nào.
				<?php }
?>
				</div>
			<!-- </div> -->
			<div class="job-province-box <?php if (!isset($listJob) || count($listJob) <= 0) {
	echo 'hide';
}
?>">
			<?php if (isset($listJob)) {
	//var_dump($listJob);
	foreach ($listJob as $value) {?>
				<!-- <div class="col-sm-12"> -->
				<div class="job-province-item" onclick="location.href='<?php echo base_url('job') . '/' . str_replace(' ', '-', $value->rec_title) . '-' . $value->recmp_map_rec . '.html'?>'">
					<div class="row">
						<div class="col-sm-5  col-xs-12">

							<label class="title text-color-3"><strong><?php echo (strlen($value->rec_title) > 30) ? substr($value->rec_title, 0, 30) . '...' : $value->rec_title;?></strong></label>
							<label class="data"><?php echo $value->employer_name;?></label>
						</div>
						<div class="col-sm-4 col-xs-6">
							<label class="title"><i class="fa fa-tag"></i>&nbsp;<?php echo $value->career_name;?></label>
							<label class="data"><i class="fa fa-money"></i>&nbsp;<?php echo $value->salary_value;?></label>
						</div>
						<div class="col-sm-3 col-xs-6">
							<label class="title"><i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('d/m/Y', strtotime($value->rec_job_time));?></label>
							<label class="data"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $value->province_name;?></label>
						</div>
					</div>
				</div>
				<div class="job-line-province-item"></div>
			<!-- </div> -->
				<?php }
	?>

	<div class="text-center job-province-item ">
		<?php if (isset($pagination)) {
		echo $pagination;
	}
	?>
	</div>

<?php }
?>


	</div>
	</div>

		</div>
		<div class="row">
			<div class="col-sm-12 margin-top-5">
				<div  style="background:url(<?php echo base_url() . "assets/main/img/about/parallax-bg-3.jpg"?>) 50% 0px no-repeat ;">
					<div class="ads-search-job">
						<div class="row">
									<div class="col-md-8">
										<h1 class="title text-center">Liên hệ quảng cáo</h1>
										<!-- <p class="text-center">&nbsp;</p> -->
									</div>
									<div class="col-md-4">
										<div class="text-center">
											<a href="http://localhost/job/adwords" class="btn btn-default btn-lg">Liên hệ</a>
										</div>
									</div>
								</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function initialize() {





            var data = <?php echo $jobMap;?>;
            var datacenter = <?php echo $centerMap?>;
	      	  var mapOptions = {
			    zoom: 6,
			    center: new google.maps.LatLng(datacenter.province_lat, datacenter.province_long)
			  };
  			map = new google.maps.Map(document.getElementById('map-search'),
     		 mapOptions);

            //var bounds = new google.maps.LatLngBounds();

            for (var i = 0; i < data.length; i++) {
                createMarker(map,data[i]);

            }


        }
      function createMarker(currentMap, data) {
				var marker = new MarkerWithLabel({
       			position: new google.maps.LatLng(data.province_lat, data.province_long),
     			 map: currentMap,
                 icon: '<?php echo base_url();?>assets/main/img/map/marker5.png',

                 draggable: false,
                 raiseOnDrag: false,
                 labelContent: ""+data.numjob,
                 labelAnchor: new google.maps.Point((data.numjob.length >= 3)? 10 : ((data.numjob.length >= 2) ? 7 : 4), 25),
                 labelClass: "mapIconLabel", // the CSS class for the label
                 labelInBackground: false,
                  url: "<?php echo base_url('province') . '/'?>"+  data.province_name.replace(' ', '-')  + '-'  + data.province_id + '.html',
				});
				 var infowindow = new google.maps.InfoWindow({
				                     content: data.province_name + "<br>" + data.numjob +" việc làm. "
				                 });

				 google.maps.event.addListener(marker, 'click', function() {
				        // window.open(marker.url);// window.location.href = marker.url;
				        window.open(marker.url, '_self');
				    });
				 google.maps.event.addListener(marker, 'mouseover', function() {
				    infowindow.open(map, this);
				});
				 google.maps.event.addListener(marker, 'mouseout', function() {
				    infowindow.close();
				});

				}
		      $(document).ready(function(){
		      		initialize();
		      });
		      $( window ).resize(function() {
		      		initialize();
				});

</script>
<script type="text/javascript">
function equalHeight(group) {
    tallest = 0;
    group.each(function() {
        thisHeight = $(this).height();
        if(thisHeight > tallest) {
            tallest = thisHeight;
        }
    });
    group.find('div').height(tallest);
}

$(document).ready(function(){
    equalHeight($(".item-group"));
});
</script>