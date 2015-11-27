<section ng-controller="blogController">
    <div class="modal-header">
        <h3 class="modal-title">Xóa </h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="deleteFAQForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            Bạn có muốn xóa blog : <label class="text-danger">{{blog.blog_title}} </label> không ?
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="deleteBlog(blog);" ng-disabled="disabled_modal" >Xóa</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
