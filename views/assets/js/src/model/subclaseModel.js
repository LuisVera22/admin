class SubclaseModel{
    constructor(){
        this.param = "";
    }

    setParam(param){
        this.param = param;
    }

    getFormData(crud){
        return{
            param:this.param,
            crud:crud
        };
    }
}