<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action="/news" method="post" id='editNewsForm' style="width: 50%;">
    <input type="hidden" name="editId" id='editId' value="<?php echo $newsSnippet->getId()?>" />
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>
    <ul>

      <li>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $newsSnippet->getTitle()?>" required autofocus maxlength="20" />
      </li>

      <li>
        <label for="contents">Contents</label>
        <textarea row='3' columns='50' name="contents" id="contents" form='editNewsForm' required maxlength="200"><?php echo $newsSnippet->getContents()?> </textarea>
      </li>

    </ul>

    <div class="buttons">
      <input type="submit" name="editNews" value="Submit" />
    </div>

  </form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>