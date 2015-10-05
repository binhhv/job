
	<div class="container employer-page">
		<div class="row">
			<div class="col-sm-4 col-sm-push-8">
				<div class="row">
					<div class="col-sm-12">
						<?php echo $employer_menu;?>

					</div>
				</div>
			</div>
			<div class="col-sm-8 col-sm-pull-4">
			<div class="card">
				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-3">
							<h3 >211</h3>
						</label>
						<label class="alert-recruitment">tin tuyển dụng đã được đăng .</label>
					</div>
				</div>

				<div class="row-employer row">
					<div class="col-sm-12">
						<label class="alert-recruitment text-color-1">
							<h3 class="alert-field-employer" >Tạo tin tuyển dụng</h3>
						</label>

					</div>
					<div class="col-sm-12 employer-line"></div>
					<div class="col-sm-12 item-field-employer">
						<div class="table-responsive box-body no-padding">
					        <table id="recruitment_active_tb" class="table table-striped nowrap" cellspacing="0">
					          <thead>
					            <tr>
					              <th>Mã số</th>
					              <th>Tiêu đề tin</th>
					            <!--   <th>Mức lương</th>
					            <th id="row_jcform_type_th">Hình thức công việc</th> -->
					              <th id="row_rec_is_approve_th">Trạng thái</th>
					              <th id="row_rec_created_at_th">Ngày đăng tin</th>
					         <!--      <th id="row_numapply_th">Số lượng ứng tuyển</th> -->
					              <th id="row_action_th"></th>
					            </tr>
					          </thead>
					          <tbody>
					          <?php if (!empty($arr_rec)) {
	foreach ($arr_rec as $rows): ?>
					              <tr>
					                  <td><?php echo $rows->rec_code;?></td>
					                  <td><?php echo $rows->rec_title;?></td>
					                  <!-- <td><?php echo $rows->rec_salary;?></td> -->
					                 <!--  <td id="row_jcform_type"><?php echo $rows->jcform_type;?></td> -->
					                  <td id="row_rec_is_approve"><?php echo $rows->rec_is_approve;?></td>
					                  <td id="row_rec_created_at"><?php $create_date = strtotime($rows->rec_created_at);
	echo date('d-m-Y', $create_date)?></td>
					                 <!--  <td id="row_numapply"><?php echo $rows->numapply;?></td> -->
					                  <td id="row_action" class="center">
										<button type="button" class="btn btn-xs btn-info" onclick="detail_recruitment(<?php echo $rows->rec_id?>)"><span>chi tiết</span></button>
					                    <a class="btn btn-xs btn-info" href="#detail_recruitmentModel"  data-toggle="modal"><span>chi tiết</span></a>
					                    <a class="btn btn-xs btn-warning" href="#update_recruitmentModel"  data-toggle="modal"><span>sửa</span></a>
					                    <a class="btn btn-xs btn-danger" href="<?php echo site_url('make/deleteMake/');?>" onClick="return confirm('Are you sure to delete this make ?');"><span>xóa</span></a>

					                  </td>
					              </tr>
					               <?php endforeach;}

?>
					                            </tbody>
					        </table>
					      </div>
					</div>

				</div>
			</div>

			</div>

		</div>
	</div>
	<?php echo $update_imfomation_employer?>
	<?php echo $update_contact_employer?>
	<?php echo $update_account_employer?>
	<?php echo $recruitment?>
	<?php echo $recruitmnet_active?>
	<?php echo $detail_recruitmnet?>

	<script>
		 $('#recruitment_active_tb').DataTable({
        "bSort": false
    });

		 function detail_recruitment(rec_id){
			var cct = $("input[name=csrf_test_name]").val(); //alert(cct);
			$.ajax({
		        type: 'GET',
		        url: '<?php echo base_url();?>employer/employer/detail_recruitment',
		        data: { 'csrf_test_name': cct, 'rec_id':rec_id },
		        success:function(response){
		        	// document.getElementById(id_survey).disabled = true;
		        	// $("#open-survey-"+response).hide();
		        	$('#detail_recruitmentModel').modal().append(response);;
		        	// $("#edit-"+response).hide();
		        	console.log(response);
		        }
			});

		}
</script>