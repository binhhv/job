<div class="card">

<?php if (isset($numRecruitmentActive)) {
	?>
				<div class="row-employer row">
					<div class="col-sm-12 padding-2">
					<?php if ($numRecruitmentActive > 0) {?>
						<label class="alert-recruitment text-color-3">
							<h3 ><?php echo $numRecruitmentActive; ?></h3>
						</label>
						<label class="alert-recruitment"><?php echo lang('em_i_num_rec'); ?></label>
						<?php } else {?>
						<label class="alert-recruitment"><?php echo lang('em_i_ms_no_rec'); ?> &nbsp;</label> <!--<a class="btn btn-xs btn-primary" href="">Đăng tin ngay</a>-->
							<?php }
	?>
	<button class="btn btn-primary pull-right" onclick="location.href='<?php echo base_url('employer/create-recruitment'); ?>'"><i class="fa fa-paper-plane"></i><?php echo lang('em_rec_post') ?></button>
					</div>
					<div class="col-sm-12" id="chart-recruitment" style="min-width: 310px; height: 400px; margin: 0 auto">

					</div>
				</div>

				<?php }
?>
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" ><?php echo lang('title_depoyer_re_depl') ?></h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_name_re_depl') ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_name; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_address_re_depl') ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_address; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_map_province_re_depl'); ?></div>
						<div class="detail-field-employer"><?php echo $employerInfo->province_name; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_phone_re_depl'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_phone; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_size_re_depl'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_size; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_website_re_depl'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_website; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('employer_about_re_depl'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_about; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php if ($user['role'] == 2) {?>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary btn-xs btn-edit-info-employer" ><i class="fa fa-pencil-square-o"></i> &nbsp; <?php echo lang('em_i_edit_info'); ?></button> <!--data-toggle="modal" data-target="#employer_updateModal"-->
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php }
?>
				</div>

				<!--thông tin liên hệ-->
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" ><?php echo lang('title_job_contact_info'); ?></h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('contact_nae_rec'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_name; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('job_form_phone'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_phone; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('job_title_contact_mobile'); ?></div>
						<div class="detail-field-employer"><?php echo $employerInfo->employer_contact_mobile; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="title-field-employer text-muted"><?php echo lang('m_email'); ?></div>
						<div class="detail-field-employer "><?php echo $employerInfo->employer_contact_email; ?></div>
					</div>
					<div class="col-sm-12 employer-line"></div>
					<?php if ($user['role'] == 2) {?>
					<div class="col-sm-12 item-field-employer text-left">
						<button class="btn btn-primary btn-xs btn-edit-contact-employer"><i class="fa fa-pencil-square-o"></i> &nbsp; <?php echo lang('em_i_edit_info'); ?></button><!-- data-toggle="modal" data-target="#employer_contact_updateModal"-->
					</div>
					<?php }
?>
					<div class="col-sm-12 employer-line"></div>
				</div>
				<!--thông tin tài khoản-->


			</div>


<!--modal edit contact employer-->
<div class="modal fade" id="employer_contact_updateModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content content_employer_contact_updateModal">
        </div>
    </div>
</div>
<!--modal edit info employer-->
<div class="modal fade" id="employer_updateModal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content content_employer_updateModal">
        </div>
    </div>
</div>


<script type="text/javascript">

$(function () {
	var data = <?php echo $arrReportRecruitment ?>;
	console.log(data);
        $('#chart-recruitment').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ tin tuyển dụng đã đăng trong năm ' + <?php echo date('Y'); ?>
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Tháng 1',
                    'Tháng 2',
                    'Tháng 3',
                    'Tháng 4',
                    'Tháng 5',
                    'Tháng 6',
                    'Tháng 7',
                    'Tháng 8',
                    'Tháng 9',
                    'Tháng 10',
                    'Tháng 11',
                    'Tháng 12'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Số tin tuyển dụng (tin)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} tin</b></td></tr>',
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
                name: 'Tin tuyển dụng',
                data: data

            }]
        });
});
</script>