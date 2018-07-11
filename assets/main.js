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

/* STILL UNDER CONSTRUCTION. DO NOT TOUCH. */
if(window.location.pathname.indexOf('/create_a_problem.php') > 0) {
    $('#problem_form').on('submit', (e) => {
        e.preventDefault();
        //console.log($('#problem_form').serialize());
        $.ajax({
            type: 'POST',
            url: '/csi-project/scripts/createProblem.php',
            data: $('#problem_form').serialize(),
            success: (data) => {
                console.log(JSON.parse(data));
            }
        });
    });
}

/*if(window.location.pathname.indexOf('/problem.php') > 0) {
    //Show student the problem
    $.ajax({
        type: 'GET',
        url: '/csi-project/scripts/getProblem.php',
        success: (data) => {
            let display = '';
            if(data) {
                //console.log(data);
                let parsedData = JSON.parse(data);
                //console.log(parsedData);
                
                parsedData.forEach((y) => {
                    display += `
                        <h3>Problem</h3>
                        <p>${y.problem}<p>
                        <div>
                            <label><input type="radio" name="options" id="option1" autocomplete="off" value="${y.option_1}"> ${y.option_1}</label><br>
                            <label><input type="radio" name="options" id="option2" autocomplete="off" value="${y.option_2}"> ${y.option_2}</label><br>
                            <label><input type="radio" name="options" id="option3" autocomplete="off" value="${y.option_3}"> ${y.option_3}</label><br>
                            <label><input type="radio" name="options" id="option4" autocomplete="off" value="${y.option_4}"> ${y.option_4}</label><br>
                            <input type="hidden" name="id" value=${y.id}>
                        </div><br>
                    `;
                });
            }

            $('.wrap-problem').html(display);
        }
    });

    //Submit the response - student
    $("#problem_submit").on('submit', (e) => {
        e.preventDefault();
        let opt = $(`input[name="options"]:checked`).val();
        //console.log(opt);

        if(!opt) {
            alert("Select an option");
        }
        //console.log($("#problem_submit").serialize());
        $.ajax({
            type: "POST",
            url: '/csi-project/scripts/submit_problem.php',
            data: $('#problem_submit').serialize(),
            success: (response) => {
                if(response) {
                    console.log(response);
                    alert(response);
                    alert("The answer has been recorded.");
                    window.location = '/csi-project/';
                }
            }
        })
    });
}*/

if(window.location.pathname.indexOf('/email.php') > 0) {
    $("#suggest_form").on("submit", (e) => {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '/csi-project/scripts/email.php',
            data: $('#suggest_form').serialize(),
            success: (response) => {
                if(response) {
                    alert(response);
                }
            }
        });
    })
}
