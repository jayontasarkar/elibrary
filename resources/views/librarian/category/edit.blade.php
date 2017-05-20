<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Edit Category Item</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line title-input">
                        <input type="hidden" class="form-control id" name="title" value="">
                        <input type="text" class="form-control title" name="title" value="">
                    </div>
                    <label class="error error-msg" for="description"></label>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="description" class="desc" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect submit-btn">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>    