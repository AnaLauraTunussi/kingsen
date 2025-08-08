const promo1 = document.getElementById("porcentagem");
const status_promo = document.getElementById("status_promo");
const preco_promo = document.getElementById("preco_promo");

function togglePorcPromo() {
  if (status_promo.value === "1") {
    promo1.disabled = false;
    preco_promo.disabled = false
  } else {
    preco_promo.disabled = true;
    promo1.disabled = true;
    promo1.value = "";
    preco_promo.value = "";
  }
};

document.getElementById("status_promo").addEventListener("change", togglePorcPromo);

const custo = document.getElementById("custo");
const lucro = document.getElementById("lucro");
const venda = document.getElementById("venda");

function calculo() {

  let custo1 = parseFloat(custo.value.replace(",", ".")) || 0;
  let lucro1 = parseFloat(lucro.value.replace("%", "")) || 0;

  if (custo != 0) {

    let venda1 = custo1 + (custo1 * lucro1) / 100;

    venda.value = venda1.toFixed(2).replace(".", ",");
  }
  else {

    venda.value = 0;
  }
};

document.getElementById("custo").addEventListener("input", calculo);
document.getElementById("lucro").addEventListener("input", calculo);

function promo() {

  let promos = parseFloat(promo1.value.replace("%", "")) || 0;
  let vendas = parseFloat(venda.value.replace(",", ".")) || 0;
  let custos = parseFloat(custo.value.replace(",", ".")) || 0;

  if (promos != 0 || promo_valor < venda) {
    let promo_valor = vendas - (promos * vendas) / 100;

    preco_promo.value = promo_valor.toFixed(2).replace(".", ",");

    if (promo_valor < custos) {
      alert("Preço de promoção menor que custo");
      preco_promo.value = "";
      promo1.value = "";
    }
  }
};

document.getElementById("porcentagem").addEventListener("input", promo);

