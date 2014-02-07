<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action="/spotlight" method="post" id='editSpotlightForm' style="width: 50%;">
    <input type="hidden" name="editId" id='editId' value="<?php echo $spotlight->getId()?>" />
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>

    <ul>

      <li>
        <p>Image File: <?php echo $spotlight->getImageName()?></p>
        <p> Note: If you want to change the image file, you must create a new spotlight. </p>
      </li>

      <li>
        <label for="description">Description</label>
        <textarea row='3' columns='50' name="description" id="description" form='editSpotlightForm' placeholder="Enter spotlight desciption" required maxlength="350"><?php echo $spotlight->getDescription() ?> </textarea>
      </li>

      <li>
        <label for="info_link"> Link to Spotlight</label>
        <input type="text" name="info_link" id="info_link" placeholder="Copy spotlight url here" value="<?php echo $spotlight->getInfoLink() ?>" required/>
      </li>

    </ul>

    <div class="buttons">
      <input type="submit" name="editSpotlight" value="Submit" />
    </div>

</form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>