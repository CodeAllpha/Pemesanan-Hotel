<div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" method="post" action="#">
          @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Hapus Data ?</h5>
        </div>
        <div class="modal-body">
          Klik "Delete" Untuk Menghapus Data
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>

  @push('js')
  <script>
      $(function(){
          $('#modalDelete').on('show.bs.modal',function (event){
              var a = $(event.relatedTarget)
              var recipient = a.data('link')
              var modal = $(this)
              modal.find('.modal-content').attr('action',recipient)
          })
      });
  </script>
  @endpush