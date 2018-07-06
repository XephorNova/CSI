// Client side javascript comes over here
let message = '', data;

$(function () {

// Initialize text editor
$('#editor').summernote({
    tabsize: 2,
    height: 200,
    placeholder: 'Start writing your post ...',
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['picture', 'link', 'hr']]
    ]
});

    //Listen for the submit button on the blog form.
    $('#blog_form').on('submit', function (e) {
      e.preventDefault();

      //Check if the form is to be edited.
      if($('#blog_form').hasClass("edit_form")) {
          console.log("update");
        $.ajax({
            type: 'POST',
            url: '/csi-project/scripts/updatePost.php?' + window.location.href.slice(window.location.href.indexOf('?') + 1),
            data: $('#blog_form').serialize(),
            success: function(response) {
              data = JSON.parse(response);
              message = data.message;
              alert(message);
              window.location = '../admin/admin.php';
            }
        });
      } else {
        $.ajax({
            type: 'POST',
            url: '/csi-project/scripts/createPost.php',
            data: $('#blog_form').serialize(),
            success: function (someData) {
              console.log('form submitted');
              data = JSON.parse(someData);
              if(data.error) message = data.message + data.error;
              else message = data.message;

              alert(message);
              window.location = '../admin/admin.php';
            }
          });
      }
    });

    //If href consists of the word 'blog' or '/view_posts.php', get all the data
    if(window.location.href.indexOf("blog") > -1 || window.location.pathname.indexOf('/view_posts.php') > 0) {
        $.ajax({
            type: 'GET',
            url: '/csi-project/scripts/getPosts.php',
            success: (response) => {
                console.log(response);
                makePostsVisibleOnScreen(response);
            }
        });
    }
  });

  //Display the posts on the screen
  function makePostsVisibleOnScreen(array) {
    let output = '';
    let wrap = document.querySelector('.wrap-blog');
    let actual_result = JSON.parse(array);
    //console.log(actual_result);

    actual_result.forEach((x) => {
        console.log(x);
        output += `
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">${x.blog_title}</h5>
                    <p class="card-text">${x.blog_post_date}</p>
                    ${window.location.pathname.indexOf('/blog.php') > 0 ? `<a href="./post.php?id=${x.id}"><button class="btn btn-dark mr-2">Read</button></a>` : ''}
                    ${window.location.pathname.indexOf('/view_posts.php') > 0 ? `<a href="./edit_post.php?id=${x.id}"><button class="btn btn-primary mr-2">Edit</button></a><a href="./view_posts.php?id=${x.id}"><button class="btn btn-danger mr-2">Remove</button></a>` : ''}
                </div>
            </div>
        `;
    });

    wrap.innerHTML = output;
  }

  if(window.location.pathname.indexOf('/edit_post.php') > 0 || window.location.pathname.indexOf('/create_a_post.php') > 0) {
      $("#preview").on("click", (e) => {
        e.preventDefault();
        console.log("clicked");

        //$('.bd-example-modal-lg').modal();

        let content = '';
        content = `
        <p>${$('#editor').val()}</p>
        <br>
        <p class="title">${$('#author').val()}</p>`;

        $('#preview_modal .modal-body').html(content);

    });
}

/* Show Login Modal */
if(window.location.pathname.indexOf('/admin') > 0) {
    $('#exampleModalCenter').modal('show');
}

/* STILL UNDER CONSTRUCTION. DO NOT TOUCH. 
if(window.location.pathname.indexOf('/create_a_problem.php') > 0) {
    $('#problem_form').on('submit', (e) => {
        e.preventDefault();
        console.log(e);

        $.ajax({
            type: 'POST',
            url: '/csi-project/scripts/createProblem.php',
            data: $('#problem_form').serialize(),
            success: (data) => {
                console.log(JSON.parse(data));
            }
        });
    });
} */