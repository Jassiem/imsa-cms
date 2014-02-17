<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
  <div class='row'>
  <div class='col-lg-3'></div>
  <div class='col-lg-6'>
 
  <form action="/spotlight" method="post" id='addSpotlightForm' enctype="multipart/form-data">
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
    <?php } ?>

    <div class='well well-lg push-left'>
      <h2> Add Spotlight </h2>

      <div class='buffer-20'></div>
      <div class='buffer-20'></div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for="image_name">Image: </span>
        <input class='form-control' type="file" name="image_name" id="image_name" required />
      </div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for="description">Description</span>
        <textarea  class='form-control' row='3' columns='50' name="description" id="description" form='addSpotlightForm' placeholder="Enter spotlight desciption" required maxlength="350"> </textarea>
      </div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for="info_link"> Link to Spotlight</span>
        <input class='form-control' type="url" name="info_link" id="info_link" placeholder="Copy spotlight url here" required/>
      </div>

      <div class="buttons">
        <button class='btn btn-primary' type="submit" name="addSpotlight"> Submit </button>
      </div>

    </div>

  </form>
  </div>
  <div class='col-lg-3'> </div>
  </div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php' ); ?>