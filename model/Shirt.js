export class Shirt {

    async getColors(id){
        let colors = [];
        axios({
            method: 'GET',
            url: `../controller/ProductsListController.php?filter=getShirtColors&value=${id}`
        }).then(res =>{
            for(let color of res.data){
                colors.push(color.COLOR);
            }
        }).catch(err => console.log(err))
        return colors
    } 

    constructor(id, talle, precio, diseño, descripción){
        this.id = id;
        this.talle = talle;
        this.precio = precio;
        this.diseño = diseño;
        this.descripción = descripción;

        this.getColors(33).then(res =>{
            this.colors = res;
        })
    }

}