<div id="blog-ctrl"  ng-controller="blogController">


<section class="content-header">
          <h1>
           Tạo  Blog
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo base_url('admin/blog'); ?>">Quản lý Blog</a></li>
            <li class="active">Tạo Blog</li>
          </ol>
        </section>
        <section class="content" >
            <form style="background-color: #fff;" name="fCreateBlog" id="fCreateBlog" method="post"  enctype="multipart/form-data">
            <fieldset>
                <div class="row">
                  <div class="col-sm-12">
                   <div class="form-group col-sm-12">
                     <h5>Các trường <label class="text-danger">(*)</label> là bắt buộc</h5></div>
                  </div>

                  <div class="col-sm-12 error-all hide">
                   <div class="form-group col-sm-12">
                     <h5 class="text-danger">Đã có lỗi xảy ra vui lòng thử lại.</h5></div>
                  </div>


                    <div class="col-sm-12">
                        <div class="form-group col-sm-12">
                            <label class="control-label" for="surname">Tiêu đề</label><label class="text-danger">(*)</label>
                            <div class="controls">
                            <input type="text" name="blog_title" id="blog_title" class="form-control">

                            </div>
                             <div class="col-sm-12 text-danger error-blog-title"></div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label" for="surname">Danh mục</label><label class="text-danger">(*)</label>
                            <div class="controls">
                                <select class="form-control" name="blog-category" id="blog-category">
                                <?php if (isset($blogCategory)) {
	foreach ($blogCategory as $key => $value) {?>
                                    <option value="<?php echo $value->cblog_id ?>"><?php echo $value->cblog_name; ?></option>
                                  <?php }
}
?>

                                </select>

                            </div>
                             <!-- <div class="col-sm-12 text-danger error-blog-title"></div> -->
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label" for="surname">Hình blog</label><label class="text-danger">(*)</label>
                            <div class="controls">
                            <!-- <input type="file" name="blog-image" id="blog-image" class="form-control"> -->
                            <input id="fileupload" type="file" name="files"  >
                                            <!-- Chọn file đính kèm <span class="icon_upload_file"></span> -->
                                        <!-- </div> -->
                            <div id="progress" class="progress margin-top-5">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files hide"></div>
                                    <div class="files-name"></div>
                                    <input type="hidden" name="file_name">
                            <input type="hidden" name="file-tmp">
                            <div class="col-sm-12">
                                 <label class="text-danger error-file hide"></label>
                            </div>
                             <div class="col-sm-12 text-danger error-blog-image"></div>
                            </div>
                            <div class="col-sm-12 note_size_photo clearfix font12 italic text-danger no-padding">(Định dạng: .jpg .gif .png. Kích thước &lt;<=2MB)</div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label" for="suburb">Lời giới thiệu</label><label class="text-danger">(*)</label>
                            <div class="controls">
                               <textarea  name="blog_introduce" id="blog_introduce" class="form-control" tabindex="3" rows="3" cols="50" ></textarea>
                            </div>
                             <div class="col-sm-12 text-danger error-blog-introduce"></div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label" for="suburb">Điều kiện/Ưu tiên</label><label class="text-danger">(*)</label>
                            <div class="controls">
                               <textarea  name="blog_content" id="blog_content" class="form-control" tabindex="3" rows="5" cols="50" ></textarea>
                            </div>
                             <div class="col-sm-12 text-danger error-blog-content"></div>
                        </div>
                      </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-center">
                              <a href="javascript:draftBlog()" class="btn btn-warning btn-md" >Lưu blog</a>
                              <button class="btn btn-primary">Đăng blog</button>
                            </div>
                        </div>
                    </div>
                    <div class="token hide"><input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?=$csrf['hash'];?>" /></div>
                    <div class="hide draft-blog">
                                <input type="hidden" name="isDraft" value="0">
                            </div>
            </fieldset>
            </form>
        </section>
        </div>
