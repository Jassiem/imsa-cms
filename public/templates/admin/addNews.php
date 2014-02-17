<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
<div class='row'>
  <div class='col-lg-3'></div>
  <div class='col-lg-6'>
  <form action='/news' method='post' id='addNewsForm'>
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class='errorMessage'><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>
    <div class='well well-lg push-left'>
      <h2> Add News Article </h2>

      <div class='buffer-20'></div>
      <div class='buffer-20'></div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for='title'>Title</span>
        <input class='form-control' type='text' name='title' id='title' placeholder='Enter title' required autofocus maxlength="20" />
      </div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for='contents'>Contents</span>
        <textarea class='form-control' row='3' columns='50' name='contents' id='contents' form='addNewsForm' placeholder='Enter news snippet. Up to 50 characters' required maxlength="50"> </textarea>
      </div>

      <div class='form-group'>
        <span class='input-group-addon control-label' for='link'>Link</span>
        <input class='form-control' type='url' name='link' id='link' placeholder='Enter link' required maxlength='255'/>
      </div>

      <div class='buttons'>
        <button class='btn btn-primary' type='submit' name='addNews'> Submit </button>
      </div>

    </div>
  </form>
  </div>
  <div class='col-lg-3'></div>
</div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>