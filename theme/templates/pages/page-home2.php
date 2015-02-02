<!-- Start Drupal search block -->
<div id="block-search-form" class="block block-search">
  <div class="content">
    <form action="/search-results" method="post" id="search-block-form" accept-charset="UTF-8"><div><div class="container-inline">
          <h2 class="element-invisible">Search form</h2>
          <div class="form-item form-type-textfield form-item-search-block-form">
            <label class="element-invisible" for="edit-search-block-form--2">Search </label>
            <input title="Enter the terms you wish to search for." type="text" id="edit-search-block-form--2" name="search_block_form" value="" size="15" maxlength="128" class="form-text">
          </div>
          <div class="form-actions form-wrapper" id="edit-actions--2"><input type="submit" id="edit-submit--4" name="op" value="Search" class="form-submit"></div><input type="hidden" name="form_build_id" value="form-5D_NxeG2GMygOge3O0ebHs6PNBovEyUnhSv9oo0GVBA">
          <input type="hidden" name="form_id" value="search_block_form">
        </div>
      </div></form>  </div>
</div>
<!-- End Drupal search block -->
I'm the second home page!
<?php echo $bp->get_menu(); ?>

<?php echo $bp->get_breadcrumb(); /* The breadcrumb output html is easy enough to change */ ?>

<?php include $bp->get_node_template(); ?>

<?php $bp->get_sidebar(); ?>