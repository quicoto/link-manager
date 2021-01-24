<form role="search" method="get" class="row g-3" action="<?= get_site_url() ?>">
  <div class="col-auto">
    <input type="search" class="form-control" value="<?= $_GET["s"] ?>" required name="s">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Search</button>
  </div>
</form>