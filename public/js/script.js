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

document.querySelectorAll('.btn-update').forEach(function (button) {
  button.addEventListener('click', function () {
    var postId = this.getAttribute('data-post-id');
    var postText = this.getAttribute('data-post-text');
    var modal = document.getElementById('modal');
    var updateForm = document.getElementById('update-form');
    var inputField = document.getElementById('post-text');
    var idField = document.querySelector('#update-form input[name="id"]');

    updateForm.action = '/post/' + postId + '/update-form';
    inputField.value = postText;
    idField.value = postId;

    modal.style.display = 'block';
  });
});

document.querySelectorAll('.btn-light').forEach(function (button) {
  button.addEventListener('click', function () {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
  });
});

window.addEventListener('click', function (event) {
  var modal = document.getElementById('modal');
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
