const url = 'http://localhost:8000';

/// ** selectors **
const csrf = document.querySelector('meta[name="csrf-token"]').content;

const addToCartButton = document.getElementsByClassName('addToCart');

let myCartQuantity = document.getElementById('myCartQuantity').childNodes[0].nodeValue;

const removeForm = document.getElementsByClassName('removeForm');
const productPrice = document.getElementsByClassName('product-price');

let operation;
const editForm = document.getElementsByClassName('editForm');
const editBtn = document.getElementsByClassName('edit-btn');

/// ** eventListeners **
// Add to cart
for (let i=0; i < addToCartButton.length; i++) {
    addToCartButton[i].addEventListener('click', function() {

        const productId = addToCartButton[i].id;
        addToCart(productId)
            .then(function(res) {
                console.log(res);

                myCartQuantity = isNaN(myCartQuantity) ? 0 : myCartQuantity;
                myCartQuantity++;
                document.getElementById('myCartQuantity').childNodes[0].nodeValue = myCartQuantity;

            });

    });
}


// Remove from cart
for (let i = 0; i < removeForm.length; i++) {
    removeForm[i].addEventListener('submit', function(e) {
        
        e.preventDefault();
        const productId = this.id.value;
        
        removeFromCart(productId)
        .then(function(res) {
            console.log(res);

            let element = document.getElementsByClassName('id' + res.id)[0];
            element.parentNode.removeChild(element);

            getTotal();

            if (!res.cartQuantity) {
                window.location.replace('/products');
            }

            myCartQuantity = isNaN(myCartQuantity) ? 0 : myCartQuantity;
            myCartQuantity--;
            document.getElementById('myCartQuantity').childNodes[0].nodeValue = myCartQuantity;
        });

    });
}


// Edit form
for (let i = 0; i < editForm.length; i++) {
    editForm[i].addEventListener('submit', function(e) {
        
        e.preventDefault();
        const productId = this.id.value;
        let data = {};
        const quantity = this.quantity.value;

        if (operation === '+') {
            data = {
                id: productId,
                increase_product_quantity_btn: operation,
                quantity
            }
        } else if (operation === '-') {
            data = {
                id: productId,
                decrease_product_quantity_btn: operation,
                quantity
            }
        }
        if (editBtn[i]) {

            editBtn[i].setAttribute('disabled', '');

        }
        
        setTimeout(function() {
            if (editBtn[i]) {
                
                editBtn[i].removeAttribute('disabled');

            }
        }, 500);


        editProductQuantity(data)
            .then(function(res) {
                console.log(res);
// {id: '2', productQuantity: 5, price: '7.59', operation: '+'}
                if (res.operation === '+') {
                    // cart nav icon
                    setTimeout(function() {
                        myCartQuantity = isNaN(myCartQuantity) ? 0 : myCartQuantity;
                        quantityValues = document.getElementsByName('quantity');

                        let sum1 = 0;

                        for (let i = 0; i < quantityValues.length; i++) {
                            let val = quantityValues[i].value;
                            sum1 += parseInt(val);
                        }

                        document.getElementById('myCartQuantity').childNodes[0].nodeValue = sum1;
                        document.getElementsByClassName('product-price')[i].innerHTML = '$ ' + (parseFloat(res.price) * parseInt(res.productQuantity)).toFixed(2);

                        // cart total
                        sum1 = 0;
                        subtotalElements = document.getElementsByClassName('product-price');
                        
                        for (let i = 0; i < subtotalElements.length; i++) {
                            sum1 += parseFloat(subtotalElements[i].innerHTML.replace(/\$ /, ''))
                        }

                        document.getElementsByClassName('cart-total-price')[0].childNodes[3].innerHTML = '$ ' + (sum1).toFixed(2);
                    }, 300);

                    // cart quantity
                    document.getElementsByName('quantity')[i].value = parseInt(quantity) + 1;

                } else if (res.operation === '-') {
                    // cart quantity
                    
                    if ((parseInt(quantity) - 1) <= 0) {
                        let element = document.getElementsByClassName('id' + res.id)[0];
                        
                        setTimeout(function() {
                            if (element && element != null) {
                                try {
                                    
                                    element.parentNode.removeChild(element);

                                } catch {
                                //
                                }

                            }
                        }, 300);


                    } else {
                        // if (document.getElementsByName('quantity')[i].value) {
                        if (document.getElementsByName('quantity')[i]) {
                            document.getElementsByName('quantity')[i].value = parseInt(quantity) - 1;
                        }
                        if (document.getElementsByClassName('product-price')[i]) {
                            
                            document.getElementsByClassName('product-price')[i].innerHTML = '$ ' + (parseFloat(res.price) * parseInt(res.productQuantity)).toFixed(2);

                        }

                    }

                    // cart nav icon
                    setTimeout(function() {
                        myCartQuantity = isNaN(myCartQuantity) ? 0 : myCartQuantity;
                        quantityValues = document.getElementsByName('quantity');

                        let sum1 = 0;

                        for (let i = 0; i < quantityValues.length; i++) {
                            let val = quantityValues[i].value;
                            sum1 += parseInt(val);
                        }


                        document.getElementById('myCartQuantity').childNodes[0].nodeValue = sum1;
                        // cart total
                        sum1 = 0;
                        subtotalElements = document.getElementsByClassName('product-price');
                        
                        for (let i = 0; i < subtotalElements.length; i++) {
                            sum1 += parseFloat(subtotalElements[i].innerHTML.replace(/\$ /, ''))
                        }

                        document.getElementsByClassName('cart-total-price')[0].childNodes[3].innerHTML = '$ ' + (sum1).toFixed(2);

                    }, 300);
                    

                    if (document.getElementsByClassName('countRows').length - 1 === 0) {
                        window.location.replace('/products');
                    }

                }

            })

    });
}
// Get clicked operation
for (let i = 0; i< editBtn.length; i++) {
    editBtn[i].addEventListener('click', function(e) {

        operation = this.value;

    })
}


/// ** functions **
async function addToCart(productId) {

    const response = await fetch(url + '/add_to_cart', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': 'application/json',
            // 'Accept': 'application/json',
        },
        body: JSON.stringify({id: productId})
    })

    return response.json();
}


async function removeFromCart(productId) {

    const response = await fetch(url + '/remove_from_cart', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': 'application/json',
            // 'Accept': 'application/json',
        },
        body: JSON.stringify({id: productId})
    })

    return response.json();

}


function getTotal() {

    let total = 0;
    let productPrice = document.getElementsByClassName('product-price');

    for (let i = 0; i < productPrice.length; i++) {

        let number = parseFloat((productPrice[i].childNodes[0].nodeValue).replace(/\$ /, ''));
        total += number;
        
    }

    document.getElementsByClassName('cart-total-price')[0].childNodes[3].innerHTML = '$ ' + total;

}


async function editProductQuantity(data) {

    const response = await fetch(url + '/edit_product_quantity', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': 'application/json',
            // 'Accept': 'application/json',
        },
        body: JSON.stringify(data)
    });

    return response.json();

}
