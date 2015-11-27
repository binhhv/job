<section ng-controller="blogController">
    <div class="modal-header">
        <h3 class="modal-title" >Hủy đăng  blog</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteCVForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                        Bạn có hủy đăng blog :  <label class="text-danger">({{blog.blog_title}})</label> ?
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="disabledBlog(blog);" ng-disabled="disabled_modal" >Đồng ý</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
