<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>News | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logo.svg')}}" />
    <link
      href="https://fonts.googleapis.com/css?family=Open Sans"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"/>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap");
      body {
        background-color: rgb(240, 243, 247);
      }
      .judul {
        font-family: "Open Sans";
      }
      .nama span {
        font-family: "Poppins";
        font-weight: 600;
      }
      .card {
        width: 95%;
        margin: 0 auto 3px;
      }
      .card-title {
        margin-bottom: 0;
      }
      .card-text {
        font-size: 0.94rem;
        margin-bottom: 0.2rem;
      }
      .card-text:last-child {
        margin-bottom: 0;
      }
      .card-text small {
        font-size: 0.8rem;
      }
      .card-text small span {
        font-size: 0.7rem;
      }
      .btn-outline-dark,
      .btn-outline-primary,
      .btn-outline-danger,
      .btn-primary {
        font-size: 0.8rem;
        width: 120px;
        margin: 0.3rem;
      }
      .btn-primary,
      .btn-danger,
      .btn-plus {
        margin: 0 4px;
        font-size: 0.9rem;
      }
      .p {
        width: 95%;
      }
      .sign-opt {
        font-size: 14px;
      }
      .comment {
        border-top: 1px solid gray;
      }
      textarea {
        resize: none;
      }
      .nama_commentator,
      .comment_commentator {
        line-height: 0px;
      }
      .comment_commentator {
        margin-top: -10px;
      }
      .comment-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .image-blog {
        width: 300px;
        height: 200px;
        overflow: hidden;
        background-size: cover;
        background-position: center center;
      }
    </style>
    <script
      src="https://kit.fontawesome.com/b2c7ef89be.js"
      crossorigin="anonymous"
    ></script>
  </head>
  @include('layouts.app.navbar')
  <body class="body">
    @yield('content') @include('layouts.app.footer')

    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
      ClassicEditor.create(document.querySelector("#content"))
        .then((editor) => {
          console.log(editor);
        })
        .catch((error) => {
          console.error(error);
        });
      // Searchbar code
      function search_news() {
        let input = document.getElementById("search").value;
        input = input.toLowerCase();
        let x = document.getElementsByClassName("posts");

        for (i = 0; i < x.length; i++) {
          if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
          } else {
            x[i].style.display = "block";
          }
        }
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
