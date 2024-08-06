import { Catalog } from '../classes/Catalog.js';
import { RequestManager } from '../classes/RequestManager.js';

document.addEventListener('DOMContentLoaded', function() {

    const idProduct = 1;
    RequestManager.sendRequest('/catalog','POST', idProduct)
        .then(result => {
            console.log('Результат запроса:', result);
            new Catalog(result);
            Catalog.updateProductPage();
            document.dispatchEvent(new Event('productDataLoaded'));
        });
});