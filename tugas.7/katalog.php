<?php
// Data menu lengkap dengan gambar yang dipastikan aktif
$menuData = [
 [
        "id" => 1, 
        "name" => "Caramel Macchiato", 
        "category" => "Coffee", 
        "price" => 32000, 
        "stock" => 12, 
        "image" => "https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 2, 
        "name" => "Espresso Single", 
        "category" => "Coffee", 
        "price" => 20000, 
        "stock" => 15, 
        "image" => "https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 3, 
        "name" => "Cappuccino", 
        "category" => "Coffee", 
        "price" => 28000, 
        "stock" => 4, 
        "image" => "https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 4, 
        "name" => "Cold Brew Bottle", 
        "category" => "Coffee", 
        "price" => 35000, 
        "stock" => 20, 
        "image" => "https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 5, 
        "name" => "Matcha Latte", 
        "category" => "Non-Coffee", 
        "price" => 30000, 
        "stock" => 10, 
        "image" => "https://images.unsplash.com/photo-1536256263959-770b48d82b0a?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 6, 
        "name" => "Mocha Frappe", 
        "category" => "Non-Coffee", 
        "price" => 36000, 
        "stock" => 0, 
        "image" => "https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 7, 
        "name" => "Avocado Toast", 
        "category" => "Bakery", 
        "price" => 42000, 
        "stock" => 6, 
        "image" => "https://images.unsplash.com/photo-1588137378633-dea1336ce1e2?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 8, 
        "name" => "Croissant Plain", 
        "category" => "Bakery", 
        "price" => 22000, 
        "stock" => 3, 
        "image" => "https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=400&auto=format&fit=crop&q=60"
    ],
    [
        "id" => 9, 
        "name" => "Bagel & Cream Cheese", 
        "category" => "Bakery", 
        "price" => 32000, 
        "stock" => 10, 
        "image" => "https://images.unsplash.com/photo-1589367920969-ab8e050bbb04?w=400&auto=format&fit=crop&q=60"
    ]
];

$menuJson = json_encode($menuData);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee Shop POS</title>
  <style>
    * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background-color: #f4f6f8; margin: 0; padding: 20px; color: #1f2937; }
    .top-bar { max-width: 1200px; margin: 0 auto 20px auto; background: #fff; padding: 16px 24px; border-radius: 12px; border: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; }
    .top-bar h1 { margin: 0; font-size: 20px; color: #111827; }
    .badge-role { background-color: #eef2ff; color: #3730a3; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; border: 1px solid #c7d2fe; }
    .main-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 360px; gap: 24px; align-items: start; }
    .catalog-section { background: #fff; padding: 22px; border-radius: 12px; border: 1px solid #e2e8f0; }
    .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 12px; }
    .section-title { font-size: 16px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0; }
    .category-tabs { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
    .tab-btn { padding: 8px 16px; border: 1px solid #cbd5e1; background-color: #fff; color: #334155; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; }
    .tab-btn.active, .tab-btn:hover { background-color: #111827; color: #fff; border-color: #111827; }
    .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 18px; }
    
    .product-card { border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; background: #fff; display: flex; flex-direction: column; }
    
    .product-img-container { height: 140px; width: 100%; position: relative; background-color: #e2e8f0; }
    .product-img-container img { width: 100%; height: 100%; object-fit: cover; display: block; }
    
    .stock-badge { position: absolute; top: 10px; right: 10px; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 700; box-shadow: 0 2px 4px rgba(0,0,0,0.1); z-index: 2; }
    .stock-in { background-color: #dcfce7; color: #166534; }
    .stock-low { background-color: #fef3c7; color: #92400e; }
    .stock-out { background-color: #fee2e2; color: #991b1b; }

    .product-info { padding: 14px; flex: 1; display: flex; flex-direction: column; }
    .product-cat { font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 600; margin-bottom: 4px; }
    .product-name { font-size: 16px; font-weight: 700; margin: 0 0 6px 0; color: #0f172a; }
    .product-price { font-size: 15px; font-weight: 600; color: #0d9488; margin-bottom: 14px; }
    
    .btn-add { margin-top: auto; width: 100%; padding: 10px; border: none; border-radius: 8px; background-color: #111827; color: #fff; font-weight: 600; font-size: 13px; cursor: pointer; }
    .btn-add:disabled { background-color: #cbd5e1; color: #64748b; cursor: not-allowed; }

    .cart-section { background: #fff; padding: 22px; border-radius: 12px; border: 1px solid #e2e8f0; position: sticky; top: 20px; }
    .cart-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 12px; margin-bottom: 14px; }
    .cart-items { min-height: 120px; max-height: 280px; overflow-y: auto; margin-bottom: 16px; }
    .cart-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed #e2e8f0; font-size: 14px; }
    .btn-remove { background: #fee2e2; color: #b91c1c; border: none; width: 24px; height: 24px; border-radius: 6px; cursor: pointer; font-weight: bold; }
    .summary-row { display: flex; justify-content: space-between; font-size: 13px; color: #475569; margin-bottom: 6px; }
    .summary-total { display: flex; justify-content: space-between; font-size: 17px; font-weight: 700; color: #0f172a; border-top: 1px solid #e2e8f0; padding-top: 10px; margin-top: 10px; margin-bottom: 16px; }
    .btn-checkout { width: 100%; padding: 12px; background-color: #0d9488; color: #fff; border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer; }

    @media (max-width: 860px) { .main-container { grid-template-columns: 1fr; } }
  </style>
</head>
<body>

  <div class="top-bar">
    <h1>Coffee Shop System — PHP Backend</h1>
    <span class="badge-role">POS View</span>
  </div>

  <div class="main-container">
    <div class="catalog-section">
      <div class="section-header">
        <h2 class="section-title">Menu Catalog</h2>
        <input type="text" id="searchBox" placeholder="Cari menu..." onkeyup="renderCatalog()" style="padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
      </div>

      <div class="category-tabs">
        <button class="tab-btn active" onclick="setCategory('All', this)">All Items</button>
        <button class="tab-btn" onclick="setCategory('Coffee', this)">Coffee</button>
        <button class="tab-btn" onclick="setCategory('Non-Coffee', this)">Non-Coffee</button>
        <button class="tab-btn" onclick="setCategory('Bakery', this)">Bakery</button>
      </div>

      <div class="menu-grid" id="menuGrid"></div>
    </div>

    <div class="cart-section">
      <div class="cart-header">
        <h2>Your Cart</h2>
        <span id="cartCount" style="font-size: 13px; color: #64748b;">0 item</span>
      </div>

      <div class="cart-items" id="cartItems">
        <p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 40px;">Keranjang masih kosong</p>
      </div>

      <div class="summary-row">
        <span>Subtotal</span>
        <span id="subtotalText">Rp0</span>
      </div>
      <div class="summary-row">
        <span>Tax (10%)</span>
        <span id="taxText">Rp0</span>
      </div>
      <div class="summary-total">
        <span>Total</span>
        <span id="totalText">Rp0</span>
      </div>

      <button class="btn-checkout" onclick="checkoutOrder()">Checkout Order</button>
    </div>
  </div>

  <script>
    const menuData = <?php echo $menuJson; ?>;
    let selectedCategory = "All";
    let cart = [];

    function formatRupiah(num) {
      return "Rp" + num.toLocaleString("id-ID");
    }

    function setCategory(cat, btn) {
      selectedCategory = cat;
      document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      renderCatalog();
    }

    function renderCatalog() {
      const grid = document.getElementById("menuGrid");
      const keyword = document.getElementById("searchBox").value.toLowerCase();

      const filtered = menuData.filter(item => {
        const matchCat = selectedCategory === "All" || item.category === selectedCategory;
        const matchSearch = item.name.toLowerCase().includes(keyword);
        return matchCat && matchSearch;
      });

      if (filtered.length === 0) {
        grid.innerHTML = `<p style="grid-column: 1/-1; text-align: center; color: #64748b;">Menu tidak ditemukan.</p>`;
        return;
      }

      grid.innerHTML = filtered.map(item => {
        let stockClass = "stock-in";
        let stockLabel = `Stok: ${item.stock}`;

        if (item.stock === 0) {
          stockClass = "stock-out";
          stockLabel = "Habis";
        } else if (item.stock <= 5) {
          stockClass = "stock-low";
          stockLabel = `Sisa ${item.stock}`;
        }

        return `
          <div class="product-card">
            <div class="product-img-container">
              <img src="${item.image}" alt="${item.name}">
              <span class="stock-badge ${stockClass}">${stockLabel}</span>
            </div>
            <div class="product-info">
              <div class="product-cat">${item.category}</div>
              <h3 class="product-name">${item.name}</h3>
              <div class="product-price">${formatRupiah(item.price)}</div>
              <button class="btn-add" onclick="addToCart(${item.id})" ${item.stock === 0 ? "disabled" : ""}>
                ${item.stock === 0 ? "Out of Stock" : "+ Add to Cart"}
              </button>
            </div>
          </div>
        `;
      }).join("");
    }

    function addToCart(id) {
      const product = menuData.find(p => p.id === id);
      if (!product || product.stock <= 0) return;

      const existing = cart.find(c => c.id === id);
      if (existing) {
        if (existing.qty < product.stock) {
          existing.qty++;
        } else {
          alert("Jumlah melebihi stok yang tersedia!");
          return;
        }
      } else {
        cart.push({ ...product, qty: 1 });
      }
      renderCart();
    }

    function removeFromCart(id) {
      cart = cart.filter(item => item.id !== id);
      renderCart();
    }

    function renderCart() {
      const cartContainer = document.getElementById("cartItems");
      const cartCount = document.getElementById("cartCount");

      if (cart.length === 0) {
        cartContainer.innerHTML = `<p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 40px;">Keranjang masih kosong</p>`;
        cartCount.textContent = "0 item";
        updateSummary(0);
        return;
      }

      let totalItems = 0;
      let subtotal = 0;

      cartContainer.innerHTML = cart.map(item => {
        totalItems += item.qty;
        subtotal += item.price * item.qty;
        return `
          <div class="cart-item">
            <div>
              <div style="font-weight: 600;">${item.name} (${item.qty}x)</div>
              <div style="font-size: 12px; color: #64748b;">${formatRupiah(item.price * item.qty)}</div>
            </div>
            <button class="btn-remove" onclick="removeFromCart(${item.id})">×</button>
          </div>
        `;
      }).join("");

      cartCount.textContent = `${totalItems} item`;
      updateSummary(subtotal);
    }

    function updateSummary(subtotal) {
      const tax = Math.round(subtotal * 0.1);
      const total = subtotal + tax;

      document.getElementById("subtotalText").textContent = formatRupiah(subtotal);
      document.getElementById("taxText").textContent = formatRupiah(tax);
      document.getElementById("totalText").textContent = formatRupiah(total);
    }

    function checkoutOrder() {
      if (cart.length === 0) {
        alert("Pilih menu terlebih dahulu sebelum checkout.");
        return;
      }
      alert("Pesanan berhasil diproses via PHP!");
      cart = [];
      renderCart();
    }

    renderCatalog();
  </script>
</body>
</html>