<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action='/news' method='post' id='addNewsForm' style="width: 50%;">
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class='errorMessage'><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>
    <ul>

      <li>
        <label for='title'>Title</label>
        <input type='text' name='title' id='title' placeholder='Enter title' required autofocus maxlength="20" />
      </li>

      <li>
        <label for='contents'>Contents</label>
        <textarea row='3' columns='50' name='contents' id='contents' form='addNewsForm' placeholder='Enter news snippet' required maxlength="200"> </textarea>
      </li>

      <li>
        <label for='link'>Link</label>
        <input type='text' name='link' id='link' placeholder='Enter link' required maxlength='255'/>
      </li>
    </ul>

    <div class='buttons'>
      <input type='submit' name='addNews' value='Submit' />
    </div>

</form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>