/**
 * Quantity steppers + progressive-enhancement Add to Cart, plus the cart
 * review page's instant remove/quantity-update and the AJAX category-chip
 * switching on price-list.php / products-show.php.
 */
(function () {
  'use strict';

  /** Keeps the nav badge and floating cart summary in sync after any AJAX cart change. */
  function updateCartWidgets(data) {
    document.querySelectorAll('.cart-badge').forEach(function (badge) {
      badge.textContent = data.cart_count;
      badge.style.display = data.cart_count > 0 ? '' : 'none';
    });

    var floatEl = document.getElementById('cart-float');
    if (floatEl && typeof data.subtotal !== 'undefined') {
      var countEl = document.getElementById('cart-float-count');
      var totalEl = document.getElementById('cart-float-total');
      if (countEl) countEl.textContent = data.cart_count + (data.cart_count === 1 ? ' item' : ' items');
      if (totalEl) totalEl.textContent = '₹' + Number(data.subtotal).toFixed(2);
      floatEl.style.display = data.cart_count > 0 ? '' : 'none';
    }
  }

  function cartCsrfToken() {
    var field = document.querySelector('#remove-item-form [name="csrf_token"]');
    return field ? field.value : '';
  }

  // Quantity steppers. On the cart page (.cart-qty-stepper) a change also
  // pushes an instant AJAX update — no separate "Update Cart" button needed,
  // matching how Remove already works. Elsewhere (e.g. an add-to-cart form
  // that hasn't been submitted yet) it's purely local until Add to Cart.
  var qtyUpdateTimers = {};

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

    if (!stepper.classList.contains('cart-qty-stepper')) return;

    var productId = stepper.dataset.productId;
    clearTimeout(qtyUpdateTimers[productId]);
    qtyUpdateTimers[productId] = setTimeout(function () {
      updateCartQuantity(productId, value, stepper);
    }, 450);
  });

  function updateCartQuantity(productId, quantity, stepper) {
    var formData = new FormData();
    formData.append('csrf_token', cartCsrfToken());
    formData.append('quantity[' + productId + ']', quantity);

    fetch('api/cart-update.php', {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    })
      .then(function (response) { return response.json(); })
      .then(function (data) {
        updateCartWidgets(data);

        if (quantity === 0) {
          var row = stepper.closest('tr');
          if (row) row.remove();
        } else {
          var line = (data.lines || []).find(function (l) { return String(l.product_id) === String(productId); });
          var row2 = stepper.closest('tr');
          if (line && row2) {
            var totalCell = row2.querySelector('.cart-line-total');
            if (totalCell) totalCell.textContent = '₹' + Number(line.line_total).toFixed(2);
          }
        }

        var subtotalEl = document.getElementById('cart-subtotal');
        if (subtotalEl) subtotalEl.textContent = 'Subtotal: ₹' + Number(data.subtotal).toFixed(2);

        if (!data.lines || data.lines.length === 0) {
          window.location.reload();
        }
      })
      .catch(function () {
        window.location.reload();
      });
  }

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
        updateCartWidgets(data);

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
        updateCartWidgets(data);

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
