 <div class="modal fade" id="{{ $idModal }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title title-dateform" id="exampleModalLabel">Biểu mẫu mới {{ $title }}
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="form-group">
                     <label for="form-name" class="col-form-label">Tên biểu mẫu</label>
                     <input type="text" class="form-control" id="form-name-{{ $name }}"
                         name="form-name-{{ $name }}" value="" required>
                 </div>
                 <div class="form-group">
                     <label for="message-text" class="col-form-label">Nội dung</label>
                     <textarea style="height: auto !important;" rows="4" cols="50" class="form-control-1 w-100"
                         id="form-desc-{{ $name }}" name="form-desc-{{ $name }}" required></textarea>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="custom-btn align-items-center py-1 px-3 h-100 text-table btn-submit{{ $name }}"
                     id="btn-submit{{ $name }}" data-button-name="{{ $name }}" data-action="insert"
                     data-id="">Lưu</button>
                 <button type="button" class="btn-save-print rounded h-100 text-table py-1 px-3 closeModal" data-dismiss="modal">Hủy</button>
             </div>
         </div>
     </div>
 </div>
