
<div class="card">

	<div class="row-employer row ">
		<?php $this->load->view('main/employer/content-profile', array('employerInfo' => $employerInfo));?>
    </div>
    <!--list account-->
    <div class="row-employer row ">
        <?php $this->load->view('main/employer/content-accounts', array('listAccount' => $listAccount, 'employerInfo' => $employerInfo));?>
    </div>
</div>

