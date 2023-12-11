 <div class="modal fade" id="{{ $idModal }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Biểu mẫu mới {{ $title }}
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <label for="form-name" class="col-form-label">Tên biểu mẫu</label>
                         <input type="text" class="form-control" id="form-name-{{ $name }}"
                             name="form-name-{{ $name }}" value="">
                     </div>
                     <div class="form-group">
                         <label for="message-text" class="col-form-label">Nội dung</label>
                         <textarea class="form-control" id="form-desc-{{ $name }}" name="form-desc-{{ $name }}"></textarea>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary btn-submit" id="btn-submit"
                     data-button-name="{{ $name }}">Lưu</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
             </div>
         </div>
     </div>
 </div>
