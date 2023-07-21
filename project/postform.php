<div class="column2 col-9">
  <div id="formToggle">
          <button id="formToggleBtn" onclick="toggleForm()">Post</button>
        </div>
        <div class="post">
          <div id="formArea">
            <br>
            <form>
              <label for="postTitle"> </label>
              <h2>Title: </h2>
              <input type="text" id="postTitle" class="singletextbox" name="Title"><br>
              <label for="postBody"></label>
              <h3>Body:</h3>
              <p>Be specific in your question, Include all the information that you think others need to answer your
                question</p>

              <textarea id="postBody" name="Body"></textarea>
              <label for="postTag"></label>
              <h3>Tags: </h3>
              <p>Choose the tags that best fit your question</p>
              <input type="text" id="postTag" class="singletextbox" name="Title"><br>

            </form>
            <button id="postBtn" onclick="makePost()">Post</button>
          </div>
        </div>
        <div id="postArea"></div>
      </div>