// Função para lidar com o login
function handleLogin(event) {
  event.preventDefault(); // Evita recarregar a página

  // Captura os valores dos campos
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();

  // Validação simples
  if (email === "" || password === "") {
    showMessage("Preencha todos os campos.", "error");
    return;
  }

  if (!validateEmail(email)) {
    showMessage("E-mail inválido. Verifique e tente novamente.", "error");
    return;
  }

  // Simula o envio dos dados (aqui você integraria com o backend via fetch)
  showMessage("Verificando login...", "info");

  setTimeout(() => {
    if (email === "admin@exemplo.com" && password === "123456") {
      showMessage("Login realizado com sucesso! 🎉", "success");
      // redirecionar (exemplo)
      // window.location.href = "dashboard.html";
    } else {
      showMessage("E-mail ou senha incorretos.", "error");
    }
  }, 1500);
}

// Função auxiliar para validar o formato do e-mail
function validateEmail(email) {
  return regex.test(email);
}

// Exibir mensagens na tela
function showMessage(text, type = "info") {
  let messageBox = document.querySelector(".message-box");

  if (!messageBox) {
    messageBox = document.createElement("div");
    messageBox.classList.add("message-box");
    document.body.appendChild(messageBox);
  }

  messageBox.textContent = text;
  messageBox.className = message-box;

  setTimeout(() => {
    messageBox.classList.add("visible");
  }, 50);

  // Remove após 3 segundos
  setTimeout(() => {
    messageBox.classList.remove("visible");
  }, 3000);
}