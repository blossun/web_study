console.log("calc01.js start");

calculator = {}
calculator.calc = function(){
    var formula = document.getElementById('inputStr').value.split("");
    console.log(formula);
    // 2 + 3 * 4 / 2 = 10
    var result = Number(formula[0]);
    var num;
    for(i=1; i<formula.length; i++){
        var value = formula[i]
        if(value.match(/\+|\-|\*|\//) != null){ //정규표현식 연산자인 경우 처리
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
    output.print(result);
    // return result;

};

//리팩토링 - 객체화
output = {}
output.print = function(result){ //리팩토링 - 함수화
    console.log("print start");
    document.getElementById('result').innerHTML = result;
    console.log('result : ',result);
};