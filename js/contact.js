document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('contact-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var name = document.getElementById('c_name').value.trim();
    var email = document.getElementById('c_email').value.trim();
    var msg = document.getElementById('c_message').value.trim();

    if (!name || !email || !msg) {
      alert('Please fill name, email and message.');
      return;
    }

    alert('Message was sent successfully! We will get back to you soon.');
    form.reset();
  });
});
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.parentElement;

        document.querySelectorAll('.faq-item').forEach(i => {
            if (i !== item) i.classList.remove('active');
        });

        item.classList.toggle('active');
    });
});
