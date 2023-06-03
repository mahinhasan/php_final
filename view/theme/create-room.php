<?php
  include_once 'navbar.php';
 
?>

<main class="create-room layout">
  <div class="container">
    <div class="layout__box">
      <div class="layout__boxHeader">
        <div class="layout__boxTitle">
          <a href="index.php">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
              <title>arrow-left</title>
              <path
                d="M13.723 2.286l-13.723 13.714 13.719 13.714 1.616-1.611-10.96-10.96h27.625v-2.286h-27.625l10.965-10.965-1.616-1.607z">
              </path>
            </svg>
          </a>
          <h3>Create Study Room</h3>
        </div>
      </div>
      <div class="layout__body">
        <form class="form" action="../../controler/roomCheck.php" method="POST">
          <div class="form__group">
            <label for="room_name">Caption </label>
            <input id="room_name" name="room_name" type="text" placeholder="E.g. Thailand is awesome place" />
          </div>

          <div class="form__group">
            <label for="room_topic">Place Name</label>
            <input required type="text" name="room_topic" id="room_topic" list="topic-list" />
            <datalist id="topic-list">
              <option value="">Select your topic</option>
              <option value="Python">Python</option>
              <option value="Django">Django</option>
            </datalist>
          </div>

          <div class="form__group">
            <label for="room_about">Brief Your Feelings</label>
            <textarea name="room_about" id="room_about" placeholder="Write about your Tour..."></textarea>
          </div>
          <div class="form__action">
            <a class="btn btn--dark" href="index.php">Cancel</a>
            <button class="btn btn--main" type="submit">Create Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

</body>
</html>
