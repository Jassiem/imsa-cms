<?php include "templates/includes/header.php" ?>
 
  <form action="/user" method="post" style="width: 50%;">
    <input type="hidden" name="newUser" value="true" />
    <ul>
      <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxlength="20" />
      </li>

      <li>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Your email address" required/>
      <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Your admin password" required maxlength="64" />
      </li>
      <li>
        <label for="confirm_password"> Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Please confirm password" required maxlength="64"/>
      </li>
    </ul>
    <div class="buttons">
      <input type="submit" name="newUser" value="newUser" />
    </div>
  </form>
 
<?php include "templates/includes/adminFooter.php" ?>