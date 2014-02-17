<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action="/spotlight" method="post" id='addSpotlightForm' style="width: 50%;" enctype="multipart/form-data">
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>

    <ul>

      <li>
        <label for="image_name">Image: </label>
        <input type="file" name="image_name" id="image_name" required />
      </li>

      <li>
        <label for="description">Description</label>
        <textarea row='3' columns='50' name="description" id="description" form='addSpotlightForm' placeholder="Enter spotlight desciption" required maxlength="350"> </textarea>
      </li>

      <li>
        <label for="info_link"> Link to Spotlight</label>
        <input type="url" name="info_link" id="info_link" placeholder="Copy spotlight url here" required/>
      </li>

    </ul>

    <div class="buttons">
      <input type="submit" name="addSpotlight" value="Submit" />
    </div>

  </form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>