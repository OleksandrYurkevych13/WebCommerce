let cartBoxes;
//cart open and close
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');
//Open cart
cartIcon.onclick = () =>{
  cart.classList.add('active');
};
closeCart.onclick = () =>{
  cart.classList.remove('active');
};

//add to cart
if(document.readyState == 'loading'){
  document.addEventListener('DOMContentLoaded', ready);
}else{
  ready();
}

//making function
function ready(){
  //remove
  var removeCartButtons = document.getElementsByClassName('cart-remove');
  for (var i = 0; i< removeCartButtons.length; i++){
    var button  = removeCartButtons[i];
    button.addEventListener('click', removeCartItem);
  }
  var quantityInputs = document.getElementsByClassName('cart-quantity');
  for (var i = 0; i< quantityInputs.length; i++){
    var input  = quantityInputs[i];
    input.addEventListener('change', quantityChanged);
  }
  //Add to cart
  var addCart = document.getElementsByClassName('add-cart');
  for (var i = 0; i< addCart.length; i++){
    var button  = addCart[i];
    button.addEventListener('click', addCartClicked);
  }
  loadCartItems();
}
//remove cart time 
function removeCartItem(event){
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  updatetotal();
  saveCartItems();
}
function quantityChanged(event){
  var input = event.target;
  if(isNaN(input.value) || input.value <= 0){
    input.value = 1;
    
  }
  updatetotal();
  saveCartItems();
  updateIcon();
}

function addCartClicked(event){
  var button = event.target;
  
  var shopProducts = button.parentElement;
  var title = shopProducts.getElementsByClassName('card-title')[0].innerText;
  var price = shopProducts.getElementsByClassName('card-text')[0].innerText;
  var productImg = shopProducts.getElementsByClassName('cartImg')[0].src;
  
  addProductToCart(title,price,productImg);
  updatetotal();
  saveCartItems();
  updateIcon();
}

function addProductToCart(title,price,productImg) {
  var cartShopBox = document.createElement('div');
  cartShopBox.classList.add('cart-box');
  var cartItems = document.getElementsByClassName('cart-content')[0];
  var cartItmesNames = cartItems.getElementsByClassName('cart-product-title');
  for (var i = 0; i < cartItmesNames.length; i++) {
    if (cartItmesNames[i].innerText == title) {
      alert('You have already added this item to cart');
      return;
    }
  }
  var cartBoxContent = `
      <img src="${productImg}" alt="" class="cart-img">
      <div class="detail-box">
        <div class="cart-product-title">${title}</div>
        <div class="cart-price">${price}</div>
        
        <input type="number" name="" id="" value="1" class="cart-quantity">
      </div>
      <!-- Remove -->
      <i class="bx bx-trash cart-remove" ></i>`;
      cartShopBox.innerHTML = cartBoxContent;
      cartItems.append(cartShopBox);
      cartShopBox.getElementsByClassName('cart-remove')[0]
      .addEventListener('click', removeCartItem);
      cartShopBox.getElementsByClassName('cart-quantity')[0]
      .addEventListener('change', quantityChanged);
      saveCartItems();
      updateIcon();
}


function updatetotal(){
  var cartContent = document.getElementsByClassName('cart-content')[0];
  var cartBoxes = cartContent.getElementsByClassName('cart-box');
  var total =0;
  for(var i=0; i < cartBoxes.length; i++){
    var cartBox = cartBoxes[i];
    var priceElement = cartBox.getElementsByClassName('cart-price')[0];
    var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
    var price = parseFloat(priceElement.innerText.replace('$', ''))
    var quantity = quantityElement.value;
    total += price* quantity;
    
  }
  total = Math.round(total *100) / 100;
  document.getElementsByClassName('total-price')[0].innerText = '$' + total;
  //Save total to localstrg
  localStorage.setItem("cartTotal", total);
}


//keep item in cart 
function saveCartItems(){
  var cartContent = document.getElementsByClassName('cart-content')[0];
  // Оголошуємо змінну cartBoxes
  var cartBoxes = cartContent.getElementsByClassName('cart-box');
  var cartItems = [];

  for( var i=0 ;i < cartBoxes.length; i++){
    var cartBox = cartBoxes[i];
    var titleElement = cartBox.getElementsByClassName('cart-product-title')[0];
    var priceElement = cartBox.getElementsByClassName('cart-price')[0];
    var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
    var productImg = cartBox.getElementsByClassName('cart-img')[0].src;

    var item = {
      title: titleElement.innerText,
      price: priceElement.innerText,
      quantity: quantityElement.value,
      productImg: productImg,
    };

    cartItems.push(item);
  }
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
}




//load in cart
function loadCartItems(){
  var cartItems = localStorage.getItem('cartItems');
  if(cartItems){
    cartItems = JSON.parse(cartItems);

    for (var i=0; i < cartItems.length; i++){
      var item = cartItems[i];
      addProductToCart(item.title, item.price, item.productImg);

      var cartBoxes = document.getElementsByClassName('cart-box');
      var cartBox = cartBoxes[cartBoxes.length - 1];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      quantityElement.value = item.quantity;
    }
  }
  var cartTotal = localStorage.getItem('cartTotal');
  if(cartTotal){
    document.getElementsByClassName('total-price')[0].innerText = 
    "$" + cartTotal;
  }
  updateIcon();
}

//carticon
function updateIcon(){
  var cartBoxes = document.getElementsByClassName('cart-box');
  var quantity = 0;

  for (var i = 0; i < cartBoxes.length; i++) {
      var cartBox = cartBoxes[i];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      quantity += parseInt(quantityElement.value);
  }

  var cartIcon = document.querySelector('#cart-icon');
  cartIcon.setAttribute('data-quantity', quantity);
}


