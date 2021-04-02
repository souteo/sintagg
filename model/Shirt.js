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

    constructor(id, size, price, design, description){
        this.id = id;
        this.size = size;
        this.price = price;
        this.design = design;
        this.description = description;

        this.getColors(id).then(res =>{
            this.colors = res;
        })
    }

}