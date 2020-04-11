function deleteItem(){
    alert("Товар в корзине успешно удален!")
}

if(document.readyState == "loading"){
    document.addEventListener("DOMContentLoaded", ready)
}  
else {
    ready()
}

function ready(){
    var removeCartItemButtons =  document.getElementsByClassName("product-remove");
    for (var i = 0; i < removeCartItemButtons.length; i++){
        var button = removeCartItemButtons[i];
        button.addEventListener("click", removeCartItem);
    }
    var quantityInputs = document.getElementsByClassName("quantity-input");
    for (var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
}

function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.parentElement.remove();
    updateCartTotal();
}

function quantityChanged(event){
    var input = event.target;
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1;
    }
    updateCartTotal();
}

function updateCartTotal(){

    var totalProductSum = 0;
    var cartItemContainer = document.getElementsByClassName("product-item")[0];
    var cartProducts = cartItemContainer.getElementsByClassName("product-single")

    for (var i = 0; i < cartProducts.length; i++){
        var cartProduct = cartProducts[i];
        var priceElement = cartProduct.getElementsByClassName("price")[0]
        var quantityElement = cartProduct.getElementsByClassName("quantity-input")[0]
        var price = Number(priceElement.innerHTML.replace("тг.", "" ));
        var quantity = quantityElement.value
        totalProductSum = totalProductSum + (price * quantity);
    }
     
        var cartTotalProductElement = document.getElementsByClassName("total-price")[0];
        var deliverySumElement = document.getElementsByClassName("delivery")[0];
        var discountSumElement = document.getElementsByClassName("discount")[0];

        var cartTotalProduct = cartTotalProductElement.innerHTML = totalProductSum;

        if (totalProductSum > 10000){
            var deliverySum = parseFloat(Math.ceil(Number(totalProductSum * 0.05)));
        }
        else if (totalProductSum > 50000){
            var deliverySum = parseFloat(Math.ceil(Number(totalProductSum * 0.10)));
        }
        else if (totalProductSum > 100000){
            var deliverySum =  parseFloat(Math.ceil(Number(totalProductSum * 0.2)));
        }
        else if (totalProductSum == 0){
            var deliverySum = 0;
        }
        else
        {
            var deliverySum = parseFloat(Number(deliverySumElement.innerHTML.replace("тг.", "" )*0));
        }

        if (totalProductSum > 50000){
            var discountSum = parseFloat(Math.ceil(Number(totalProductSum * 0.02)));
        }
        else if(totalProductSum > 100000){
            var discountSum = parseFloat(Math.ceil(Number(totalProductSum * 0.05)));
        }
        else if(totalProductSum == 0){
            var discountSum = 0;
        }
        else
        {
            var discountSum = parseFloat(Number(discountSumElement.innerHTML.replace("тг.", "")*0))
        }
       
        total = cartTotalProduct + deliverySum - discountSum;
        
        document.getElementsByClassName("delivery")[0].innerHTML = deliverySum + " тг.";
        document.getElementsByClassName("discount")[0].innerHTML = discountSum + " тг.";
        document.getElementsByClassName("total-price-sum")[0].innerHTML = total + " тг.";
        
   
        
    }

updateCartTotal();
