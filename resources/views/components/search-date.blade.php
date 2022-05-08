<form action="?" method="get" class="form-inline">
    <div class="input-group ml-auto">
        <div class="input-group-prepend">
            <input type="date" name="tanggal"
            class="form-control" placeholder="cari"
            value="<?= request()->tanggal?>">
        </div>

        <div class="input-group-prepend">
            <button class="btn btn-sm btn-primary" type="submit">
                <i class="la la-search"></i>
            </button>
        </div>
    </div>
</form>