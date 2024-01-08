//アコーディオンメニュー
$(function () {
  $('.accordion-title').on("click", function () {
    $(this).next().slideToggle();

    if ($(this).text() === 'V') {
      $(this).text('∧');
    } else {
      $(this).text('V');
    }
  });
});

document.querySelectorAll('.btn-update').forEach(button => {
  button.addEventListener('click', function () {
    var postId = this.getAttribute('data-post-id');
    var postText = this.getAttribute('data-post-text');

    var modal = document.getElementById('updateModal');
    var updateForm = document.getElementById('update-form');
    var inputField = document.getElementById('post-text');
    var idField = updateForm.querySelector('input[name="id"]');

    updateForm.action = '/post/' + postId + '/update-form';
    inputField.value = postText;
    idField.value = postId;

    modal.style.display = 'block';
  });
});

// document.querySelectorAll('.btn-update').forEach(function (button) {
//   button.addEventListener('click', function () {
//     var postId = this.getAttribute('data-post-id');
//     console.log(postId);
//     var postText = this.getAttribute('data-post-text');
//     console.log(postText);
//     var modal = document.getElementById('modal');
//     var updateForm = document.getElementById('update-form');
//     var inputField = document.getElementById('post-text');
//     var idField = document.querySelector('#update-form input[name="id"]');

//     updateForm.action = '/post/' + postId + '/update-form';
//     console.log(updateForm.action);
//     inputField.value = postText;
//     idField.value = postId;

//     modal.style.display = 'block';
//   });
// });

// document.querySelectorAll('.btn-update').forEach(function (button) {
//   button.addEventListener('click', function () {
//     var postId = this.getAttribute('data-post-id');
//     console.log(postId);
//     var postText = this.getAttribute('data-post-text');
//     console.log(postText);
//     var modal = document.getElementById('modal');
//     console.log(modal);
//     var updateForm = document.getElementById('update-form');
//     console.log(updateForm);
//     var idField = document.querySelector('#update-form input[name="id"]');
//     console.log(idField);
//     var inputField = document.getElementById('post-text');
//     console.log(inputField);
//     idField.value = postId;
//     console.log(idField);
//     inputField.value = postText;
//     console.log(postText);
//     modal.style.display = 'block';
//   });
// });


// 戻るボタン
// document.querySelectorAll('.btn-light').forEach(function (button) {
//   button.addEventListener('click', function () {
//     var modal = document.getElementById('modal');
//     modal.style.display = 'none';
//   });
// });

// モーダル以外のクリックで戻る
window.addEventListener('click', function (event) {
  var modal = document.getElementById('modal');
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
