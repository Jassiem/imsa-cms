<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
<div class='row'>
  <div class='col-xs-3'></div>
    <div class='col-xs-6'>
      <form action="/news" method="post" id='editNewsForm'>
        <input type="hidden" name="editId" id='editId' value="<?php echo $newsSnippet->getId()?>" />
     
        <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
          <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
        <?php } ?>
        
        <div class='well well-lg push-left'>
          <h2> Edit News </h2>

          <div class='buffer-20'></div>
          <div class='buffer-20'></div>

          <div class='form-group'>
            <span class='input-group-addon control-label' for="title">Title</span>
            <input class='form-control' type="text" name="title" id="title" value="<?php echo $newsSnippet->getTitle()?>" required autofocus maxlength="20" />
          </div>

          <div class='form-group'>
            <span class='input-group-addon control-label' for="contents">Contents</span>
            <textarea class='form-control' row='3' columns='50' name="contents" id="contents" form='editNewsForm' required maxlength="200"><?php echo $newsSnippet->getContents()?> </textarea>
          </div>

          <div class='form-group'>
            <span class='input-group-addon control-label' for='link'>Link</span>
            <input class='form-control' type='url' name='link' id='link' value="<?php echo $newsSnippet->getLink() ?>" required maxlength='255'/>
          </div>

          <div class="buttons">
            <button class='btn btn-primary' type="submit" name="editNews"> Submit</button>
          </div>

        </div>
      </form>
    </div>
  <div class='col-xs-3'></div>
</div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>