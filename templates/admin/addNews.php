<?php include "templates/includes/header.php" ?>
 
  <form action="/news" method="post" id='addNewsForm' style="width: 50%;">
 
<?php if ( isset( $this->results['errorMessage'] ) ) { ?>
  <div class="errorMessage"><?php echo $this->results['errorMessage'] ?></div>
<?php } ?>
  <ul>

    <li>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="Enter title" required autofocus maxlength="20" />
    </li>

    <li>
      <label for="contents">Contents</label>
      <textarea row='3' columns='50' name="contents" id="contents" form='addNewsForm' placeholder="Enter news snippet" required maxlength="200"> </textarea>
    </li>

  </ul>

  <div class="buttons">
    <input type="submit" name="addNews" value="Submit" />
  </div>

</form>
 
<?php include "templates/includes/footer.php" ?>