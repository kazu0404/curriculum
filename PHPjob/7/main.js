let numbers = [2, 5, 12, 13, 15, 18, 22];

//ここに答えを実装してください。↓↓↓
function isEven() {
    for(let i=0; i<numbers.length; i++){
        if(numbers[i] % 2 ==0){
            num = numbers[i];
            console.log(num + 'は偶数です');
        }
    }
}

answer1 = isEven();

//Carクラスを作成
class Car {

    //コンストラクタ
    constructor(gas, number) {
        this.gas = gas;
        this.number = number;
    }

    //メソッド（関数）作成
    getNumGas() {
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.number}です`);
    }
}

let prius = new Car('regular',4444); 
prius.getNumGas();

