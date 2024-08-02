export class Catalog {

    static data = [];

    constructor(prodData) {
        Catalog.data = {
            'id': prodData['id'],
            'name': prodData['Name'],
            'price': prodData['Price'],
            'photo': prodData['Photo'],
            'description': prodData['Description'],
        };
    }

    static updateProductPage() {
        document.getElementById('prod-photo').src = `data:image/png;base64,${Catalog.data.photo}`;
        document.querySelector('[name="name"]').textContent = Catalog.data.name;
        document.querySelector('[name="priceProd"]').textContent = Catalog.data.price;
        document.querySelector('[name="description"]').textContent = Catalog.data.description;
    }

}