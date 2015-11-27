<section ng-controller="blogCategoryController">
    <div class="modal-header">
        <h3 class="modal-title">Chỉnh sửa danh mục blog.</h3>
    </div>
    <div class="modal-body">
            <form name="updateBlogCategoryForm" novalidate>
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group col-sm-12">
                                <label class="control-label" for="blog_category">Danh mục</label>
                                <div class="controls">
                                    <input type="text" ng-model="category.cblog_name" id="blog_category" name="blog_category" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="updateBlogCategory(category)" ng-disabled="updateBlogCategoryForm.$invalid">Lưu</button>
                                <button class="btn btn-warning" ng-click="cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
