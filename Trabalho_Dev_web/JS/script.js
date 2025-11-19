const products = [
  { id: 1, name: "Smartphone Samsung Galaxy", price: 3999.99, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 2, name: "Notebook Acer", price: 4599.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 3, name: "Fone Bluetooth JBL", price: 399.99, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 4, name: "Apple Watch", price: 2599.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 5, name: "Caixa de Som Alexa", price: 349.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 6, name: "Monitor Gamer LG", price: 1899.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 7, name: "Monitor Gamer sansung", price: 1950.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 8, name: "Playstation 5", price: 4400.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 9, name: "smart watch", price: 999.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 10, name: "Microfone sansung", price: 1268.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 11, name: "Microfone Sony", price: 1858.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 12, name: "Smartphone Samsung Galaxy", price: 3999.99, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 13, name: "Notebook Acer", price: 4599.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 14, name: "Fone Bluetooth JBL", price: 399.99, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 15, name: "Apple Watch", price: 2599.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 16, name: "Caixa de Som Alexa", price: 349.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 17, name: "Monitor Gamer LG", price: 1899.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 18, name: "Monitor Gamer sansung", price: 1950.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 19, name: "Playstation 5", price: 4400.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 20, name: "smart watch", price: 999.00, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 21, name: "Microfone sansung", price: 1268.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
  { id: 22, name: "Microfone Sony", price: 1858.90, img: "https://th.bing.com/th/id/OIP.1fOMmOOOsx2fhVNTcMiREAHaE8?w=242&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" },
];

let cart = JSON.parse(localStorage.getItem("cart")) || [];
let lastSearch = localStorage.getItem("search") || "";

// --- Renderiza produtos ---
function loadProducts(filtered = products) {
  const container = document.getElementById("product-list");
  container.innerHTML = "";

  if (filtered.length === 0) {
    container.innerHTML = "<p style='grid-column:1/-1;text-align:center;'>Nenhum produto encontrado 😢</p>";
    return;
  }

  filtered.forEach(p => {
    const card = document.createElement("div");
    card.className = "product-card";
    card.innerHTML = `
      <img src="${p.img}" alt="${p.name}">
      <h3>${p.name}</h3>
      <p>R$ ${p.price.toFixed(2).replace(".", ",")}</p>
      <button onclick="addToCart(${p.id})">Adicionar ao carrinho</button>
    `;
    container.appendChild(card);
  });
}

// --- Adiciona ao carrinho ---
function addToCart(id) {
  const product = products.find(p => p.id === id);
  const item = cart.find(i => i.id === id);
  if (item) item.qty++;
  else cart.push({ ...product, qty: 1 });

  saveCart();
  updateCart();
}

// --- Atualiza contador e renderiza ---
function updateCart() {
  document.getElementById("cart-count").textContent = cart.reduce((a, b) => a + b.qty, 0);
  renderCart();
}

// --- Abre/fecha carrinho ---
function toggleCart() {
  const modal = document.getElementById("cart-modal");
  modal.classList.toggle("hidden");
}

// --- Renderiza lista no carrinho ---
function renderCart() {
  const list = document.getElementById("cart-items");
  let total = 0;
  list.innerHTML = "";

  if (cart.length === 0) {
    list.innerHTML = "<li>Seu carrinho está vazio 🛒</li>";
  } else {
    cart.forEach(item => {
      total += item.price * item.qty;
      const li = document.createElement("li");
      li.innerHTML = `
        <span>${item.name} x${item.qty} - R$ ${(item.price * item.qty).toFixed(2).replace(".", ",")}</span>
        <button onclick="removeFromCart(${item.id})">❌</button>
      `;
      list.appendChild(li);
    });
  }

  document.getElementById("total").textContent = `Total: R$ ${total.toFixed(2).replace(".", ",")}`;
}

// --- Remove item do carrinho ---
function removeFromCart(id) {
  cart = cart.filter(item => item.id !== id);
  saveCart();
  updateCart();
}

// --- Finalizar compra ---
function checkout() {
  if (cart.length === 0) {
    alert("Seu carrinho está vazio!");
    return;
  }
  alert("Compra finalizada com sucesso! 🎉");
  cart = [];
  saveCart();
  updateCart();
  toggleCart();
}

// --- Busca produtos ---
function searchProducts() {
  const query = document.getElementById("search").value.trim().toLowerCase();
  localStorage.setItem("search", query);
  const filtered = products.filter(p => p.name.toLowerCase().includes(query));
  loadProducts(filtered);
}

// --- Salva carrinho no localStorage ---
function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
}

// --- Inicialização ---
window.addEventListener("load", () => {
  document.getElementById("cart-modal").classList.add("hidden");
  document.getElementById("search").value = lastSearch;
  if (lastSearch) searchProducts();
  else loadProducts();
  updateCart();

  // Busca em tempo real
  document.getElementById("search").addEventListener("keyup", searchProducts);
});
