/**
 * Quantity steppers + progressive-enhancement Add to Cart.
 * Forms with class "add-to-cart-form" submit normally (full page reload,
 * works without JS) unless fetch succeeds, in which case we update the
 * cart badge in place instead.
 */
(function () {
  'use strict';

  document.addEventListener('click', function (event) {
    var btn = event.target.closest('.qty-stepper button');
    if (!btn) return;

    var stepper = btn.closest('.qty-stepper');
    var input = stepper.querySelector('input[type="number"]');
    if (!input) return;

    var min = parseInt(input.min || '1', 10);
    var max = parseInt(input.max || '999', 10);
    var value = parseInt(input.value || '1', 10) || min;

    if (btn.classList.contains('qty-increase')) value = Math.min(max, value + 1);
    if (btn.classList.contains('qty-decrease')) value = Math.max(min, value - 1);

    input.value = value;
  });

  document.addEventListener('submit', function (event) {
    var form = event.target;
    if (!form.classList || !form.classList.contains('add-to-cart-form')) return;

    event.preventDefault();
    var formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    })
      .then(function (response) { return response.json(); })
      .then(function (data) {
        if (!data.success) {
          alert(data.message || 'Could not add to cart.');
          return;
        }
        document.querySelectorAll('.cart-badge').forEach(function (badge) {
          badge.textContent = data.cart_count;
          badge.style.display = data.cart_count > 0 ? '' : 'none';
        });

        var btn = form.querySelector('.btn-add-cart');
        if (btn) {
          var original = btn.textContent;
          btn.textContent = 'Added ✓';
          setTimeout(function () { btn.textContent = original; }, 1200);
        }
      })
      .catch(function () {
        // Fall back to a normal form submit if the fetch itself failed.
        HTMLFormElement.prototype.submit.call(form);
      });
  });
})();
