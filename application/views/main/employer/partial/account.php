<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><?php

if ($idUser == 0) {
	echo lang('title_create_account_em');} else {echo lang('title_update_account_em');}
?></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" id="faccount-em" method="post">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="lastname"><?php echo lang('last_name');?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php
if (isset($userEdit->account_last_name)) {
	echo $userEdit->account_last_name;
}
?>">
                  </div>
                  <div class="col-sm-8 col-sm-offset-4 text-danger hide error-account-lastname">

                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="firstname"><?php echo lang('first_name')?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php
if (isset($userEdit->account_first_name)) {
	echo $userEdit->account_first_name;
}
?>">
                  </div>
                  <div class="col-sm-8 col-sm-offset-4 text-danger hide error-account-firstname">

                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email"><?php echo lang('email')?></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" value="<?php
if (isset($userEdit->account_email)) {
	echo $userEdit->account_email;
}
?>" <?php if (isset($userEdit->account_email)) {
	echo 'disabled ="true"';
}
?>>
                  </div>
                  <div class="col-sm-8 col-sm-offset-4 text-danger hide error-account-email">

                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="password"><?php echo lang('password')?></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" value="<?php
if (isset($userEdit->account_password)) {
	echo $userEdit->account_password;
}
?>">
                  </div>
                  <div class="col-sm-8 col-sm-offset-4 text-danger hide error-account-password">

                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="passconf"><?php echo lang('passconf')?></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="passconf" name="passconf" value="<?php
if (isset($userEdit->account_password)) {
	echo $userEdit->account_password;
}
?>">
                  </div>
                  <div class="col-sm-8 col-sm-offset-4 text-danger hide error-account-passconf">

                  </div>
                </div>
                <input type="hidden" name="idUser" value="<?php echo $idUser;?>">
                <div class="form-group">
                  <div class="token hide">
                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>">
                  </div>
                  <div class="col-sm-12 text-right">
                     <a type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                     <button type="submit" class="btn btn-primary btn-ok"><?php
if ($idUser != 0) {
	echo 'Thay đổi';
} else {
	echo 'Tạo tài khoản';
}
?></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- <div class="modal-footer">

            </div> -->

            <script type="text/javascript">
            $("#faccount-em").submit(function(event) {
                event.preventDefault();
                var url = ($(this).find('input:hidden[name=idUser]').val() == 0) ? base_website + 'employer/create-account': base_website +'employer/update-account' ;
                console.log(url);
                $.ajax({
                    type: "POST", // HTTP method POST or GET
                    url: url, //Where to make Ajax calls
                    dataType: "json", // Data type, HTML, json etc.
                    data: $(this).serialize(),
                    success: handleCreateUpdateAccount,
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                    }
                });
            })
            </script>