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

  // Per-row "Remove" button on the cart review page (place-order.php). Removes
  // instantly via AJAX; falls back to a normal (still immediate — no need to
  // touch "Place Order") form submit if the fetch itself fails.
  document.addEventListener('click', function (event) {
    var btn = event.target.closest('.remove-cart-item');
    if (!btn) return;

    var hiddenForm = document.getElementById('remove-item-form');
    var hiddenInput = document.getElementById('remove-item-product-id');
    if (!hiddenForm || !hiddenInput) return;

    hiddenInput.value = btn.dataset.productId;
    var row = btn.closest('tr');
    var formData = new FormData(hiddenForm);

    fetch(hiddenForm.action, {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    })
      .then(function (response) { return response.json(); })
      .then(function (data) {
        document.querySelectorAll('.cart-badge').forEach(function (badge) {
          badge.textContent = data.cart_count;
          badge.style.display = data.cart_count > 0 ? '' : 'none';
        });

        if (!data.lines || data.lines.length === 0) {
          window.location.reload();
          return;
        }

        if (row) row.remove();

        var subtotalEl = document.getElementById('cart-subtotal');
        if (subtotalEl) {
          subtotalEl.textContent = 'Subtotal: ₹' + Number(data.subtotal).toFixed(2);
        }
      })
      .catch(function () {
        HTMLFormElement.prototype.submit.call(hiddenForm);
      });
  });

  // AJAX category-chip switching on price-list.php / products-show.php — swaps
  // just the #ajax-results region instead of a full page reload, so a click
  // doesn't re-download/re-parse the header, footer, and vendor CSS/JS every time.
  document.addEventListener('click', function (event) {
    var link = event.target.closest('[data-ajax-nav] .category-chip');
    if (!link) return;

    var container = document.getElementById('ajax-results');
    if (!container) return;

    event.preventDefault();
    var url = link.href;

    container.style.opacity = '0.5';

    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function (response) {
        if (!response.ok) throw new Error('Request failed');
        return response.text();
      })
      .then(function (html) {
        container.innerHTML = html;
        container.style.opacity = '';

        document.querySelectorAll('[data-ajax-nav] .category-chip').forEach(function (chip) {
          chip.classList.remove('active');
        });
        link.classList.add('active');

        window.history.pushState({}, '', url);

        // Newly inserted product images need their own lightbox binding.
        if (typeof GLightbox === 'function') {
          GLightbox({ selector: '.glightbox' });
        }
      })
      .catch(function () {
        // Fall back to a normal navigation if the fetch itself failed.
        window.location.href = url;
      });
  });

  // We changed the URL via pushState above without a real navigation, so make
  // browser back/forward behave like one.
  window.addEventListener('popstate', function () {
    window.location.reload();
  });
})();
