<section ng-controller="videoController">
    <div class="modal-header">
        <h3 class="modal-title">Video : {{video.config_data_json | convertJson:'file_name'}}</h3>
    </div>
    <div class="modal-body modal-delete">
            <form name="activeDeleteLogoForm">
                <fieldset>
                    <div class="row">

                        <div class="col-sm-12">
                            {{titleModal}}
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group text-right">

                                <button class="btn btn-success" ng-click="activeDeleteVideo(video);" ng-disabled="disabled_modal" >{{titleButton}}</button>
                                <button class="btn btn-warning" ng-click="cancel()" ng-disabled="disabled_modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
    </div>
</section>
