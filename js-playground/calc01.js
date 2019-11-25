console.log("calc01.js start");
var calc = function(){
    var formula = document.getElementById('inputStr').value.split(' ');
    console.log(formula);
    // 2 + 3 * 4 / 2 = 10
    var result = Number(formula[0]);
    var num;
    for(i=1; i<formula.length; i++){
        var value = formula[i]
        if(value.match(/\+|\-|\*|\//) != null){
            //연산기호인 경우
            console.log(value);
            switch(value){
                case '+': result += Number(formula[i+1]); break;
                case '-': result -= Number(formula[i+1]); break;
                case '*': result *= Number(formula[i+1]); break;
                case '/': 
                    result /= Number(formula[i+1]); 
                    result = parseInt(result);
                    break;
                default: document.write('잘못입력하셨습니다.');
            }
            console.log('result : ' , result);
        }
    }
    // document.write(result);
    document.getElementById('result').innerHTML = result;
    console.log('result : ',result);

}