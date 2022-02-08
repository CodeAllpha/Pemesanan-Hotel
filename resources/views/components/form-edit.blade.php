@props(['action','upload'=>false])
<div class="content-body">
<div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-body">
                <form action="{{ $action }}" method="post" <?= $upload ? 'enctype="multipart/form-data"':''?>>
                    @method('put')
                    <?= $slot?>
                  <div class="form-group d-grid">
                      <button type="submit" class="btn btn-primary btn-block">
                          Update
                      </button>
                  </div>
                  </form>
             </div>
       </div>
    </div>
  </div>
</div>