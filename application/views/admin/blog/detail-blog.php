
  <div >


<section class="content-header">

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active"><a href="<?php echo base_url('admin/blog') ?>">Danh sách blog</a></li>

          </ol>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-sm-12">
              <div class="blog-content-box blog-box">
                  <!-- <a href="" class="btn btn-primary edit-detail-blog">Chỉnh sửa</a> -->
                  <h3 class="blog-title">
                    <a><?php echo $blog->blog_title; ?></a>
                  </h3>
                  <h4 class="blog-created">
                    <b>Ngày đăng</b> : <?php echo date('d/m/Y', strtotime($blog->blog_created_at)); ?>
                  </h4>
                  <h4 class="blog-created">
                    <b>Người đăng</b> : <?php echo $blog->account_email; ?>
                  </h4>
                  <h4 class="blog-created">
                    <b>Danh mục</b> : <?php echo $blog->cblog_name; ?>
                  </h4>
                    <?php if (isset($user) && $user['id'] == $blog->blog_map_account) {?>
                    <a href="<?php echo base_url('admin/blog/edit') . '/' . $blog->blog_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i>Chỉnh sửa</a> <?php }
?>
                  <hr>
                  <div class="blog-content row">
                    <div class="col-sm-4 blog-content-left">
                      <img class="blog-image img-responsive" src="<?php echo base_url() . 'uploads/blog/' . $blog->blog_id . '/' . $blog->blog_image_tmp; ?>">
                    </div>
                    <div class="col-sm-8 bog-content-right">
                     <b> <?php echo $blog->blog_introduce; ?></b>
                    </div>
                    <div class="col-sm-12">
                      <hr>
                    </div>
                    <div class="col-sm-12">
                      <?php echo $blog->blog_content; ?>
                    </div>

                  </div>
          </div>
            </div>
          </div>
        </section>
</div>
