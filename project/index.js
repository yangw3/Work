$(document).ready(function(){
  var maxLength = 400; // Max number of characters before read more button displayes
  $('.entryBody').each(function(){
    // Show more show less functionality
    if($(this).text().length > maxLength){
      var smallString = $(this).text().substring(0, maxLength);
      var removedString = $(this).text().substring(maxLength, $(this).text().length);
      $(this).text("");
      console.log(smallString)
      $(this).append(smallString);
      // Re-populate the post area (p tag) with the reduced text and read more button
      $(this).append('<span class="dots"> ...</span>');
      $(this).append('<span class="moreText">' + removedString + '</span><br>');
      $(this).append('<button class="showMoreBtn">Show more</button>');
      $(this).append('<button class="showLessBtn">Show less</button>');
      $(this).children('.showLessBtn').hide();
    }
  })
  $('.entryBody').on('click', '.showMoreBtn', function(){
    // User clicks on a show more button
    // Change necessary displays
    $(this).parent().children(".dots").hide();
    $(this).parent().children(".moreText").show();
    $(this).parent().children(".showLessBtn").show();
    $(this).parent().children(".showMoreBtn").hide();
  });

  $('.entryBody').on('click', '.showLessBtn', function(){
    // Revert to how it was on page load
    $(this).parent().children(".dots").show();
    $(this).parent().children(".moreText").hide();
    $(this).parent().children(".showLessBtn").hide();
    $(this).parent().children(".showMoreBtn").show();
  });
})

// POST FROM FORM FUNCTIONALITY
// Get the elements for the title and body text of the blog post

const titleField = document.getElementById('postTitle');
const bodyField = document.getElementById('postBody');
const tagField = document.getElementById('postTag');
const formArea = document.getElementById('formArea');
// Get container where blog entry goes
const postArea = document.getElementById('postArea');
// Buttons to post text or upload images
const postBtn = document.getElementById('postBtn');
const uploadImgBtn = document.getElementById('uploadImg');
const toggleFormBtn = document.getElementById('formToggleBtn');

// When button is clicked trigger this function
function makePost(){
  // Get the form data
  var title = titleField.value;
  var body = bodyField.value;
  var tag = tagField.value;
  var currDate = new Date();
  var dateArray = currDate.toDateString().split(' '); // split the date into an array of strings
  // Construct the word date
  // For later, add figure out how to print the full names and words (if statements if necessary)
  var postDate = dateArray[0] + ' ' + dateArray[2] + ' ' + dateArray[1] + ' ' + dateArray[3];
  // Put the text in postArea
  postArea.insertAdjacentHTML("afterbegin", "<div class='actualpost'> <h2 class=\"entryTitle\">" + title + 
  "</h2>\n<p class=\"postDate\">" + postDate +
  "</p>\n<p class=\"entryBody\">" + body + 
  "</p>\n"+"<p class=\"postTag\">"+ tag +"</p><button id='comment'>Comment</button></div>");
}

// Toggle the form being there or not
function toggleForm(){
  console.log("Form Toggle");
  // Get the current status of the display setting
  var currDisplay = formArea.style.display;
  // If the display is block, so the form is showing
  if (currDisplay == 'block'){
    // Hide the form
    formArea.style.display = 'none';
    // Change button text
    toggleFormBtn.innerHTML = 'Post';
  }
  else{
    // Display the form
    formArea.style.display = 'block';
    // Change button text
    toggleFormBtn.innerHTML = 'Hide';
  }   
}

// reveals the slides this is used in our index.php
// reveal function that would allow users to scroll down the page while changing effects.
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;

      if (elementTop < windowHeight - elementVisible) {
          reveals[i].classList.add("active");
      } else {
          reveals[i].classList.remove("active");
      }
   }
}
window.addEventListener("scroll", reveal);

//shows user menu when clicked
function menutoggle(){
  const togglemenu = document.querySelector('.menu');
  togglemenu.classList.toggle('active');
}

// js for hide/show comments
function showHide(id){
  $(document.getElementById(id)).toggle();
  $(document.getElementById("showComment"+id)).toggle();
  $(document.getElementById("hideComment"+id)).toggle();
}