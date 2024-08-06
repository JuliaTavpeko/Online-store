export class Quantity {

    static currentQuantity = 0;

    static setQuantity(newQuantity) {
        Quantity.currentQuantity = newQuantity;
    }

    static getQuantity() {
        console.log('Quantity.currentQuantity:',Quantity.currentQuantity);
        return Quantity.currentQuantity;
    }

    static addQuantityHandlers() {
        document.addEventListener('click', (event) => {
            const button = event.target.closest('.plus-btn, .minus-btn');
            if (button) {
                const product = button.closest('.quantity');
                const quantityInput = product.querySelector('.input_price');
                if (button.classList.contains('plus-btn')) {
                    quantityInput.value++;
                    Quantity.setQuantity(quantityInput.value);
                } else if (button.classList.contains('minus-btn')) {
                    quantityInput.value = quantityInput.value > 1 ? quantityInput.value - 1 : quantityInput.value;
                    Quantity.setQuantity(quantityInput.value);
                }
            }
        });

    }

}