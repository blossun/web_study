console.log("button js"); 
var readInput = function(){ //버튼을 클릭했을 때 이 readInput 함수가 실행되도록 html에 코드 추가
    var input = document.getElementById('input1');
    console.log(input.value);

};

var btn2 = document.createElement('button');
btn2.innerHTML = "버튼2";
btn2.onclick = readInput;
var test = document.getElementById('test2'); //id값이 test2인 div 태그를 부모로해서
test.appendChild(document.createElement('br'));
test.appendChild(btn2); //자식 버튼2 엘리먼트를 추가