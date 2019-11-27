

var game = {
    'quiz_list' : ['HELLO', 'BANANA', 'JAVAKONG', 'HAPPY', 'SMILE', 'chocolate', 'melong', 'nunnu', 'youtube', 'puzzle'],
    'quiz' : '',
    'ans' : '',
    'temp' : []
};
game.random = function(){
    this.quiz = this.quiz_list[Math.floor(Math.random() * this.quiz_list.length)].split('');
    // this.ans = this.quiz; //오류주의! 이렇게하면 객체(배열) 복사 이므로 같은 메모리의 주소값을 가르키게된다. 참조변수!! 
    this.ans = Array.from(this.quiz); //배열의 값만 복사해와서 새로운 배열의 값으로 저장
    document.getElementById('example').innerHTML = this.quiz.join('');
}
game.suffle = function(){ //버튼으로 배열된 단어위 위치를 무작위로 섞어 주는 기능
    // var temp = [];
    while(this.ans.length >0){
        // var t = this.ans.pop(this.ans[Math.floor(Math.random() * this.ans.length)]); //랜덤으로 뽑아서 pop 해서 새로운 배열에 넣어주기
        //pop은 무조건 맨우측 값을 빼니깐,,,, 이거 말고,,,
        var i = Math.floor(Math.random() * this.ans.length); //단어길이만큼의 범위에서 random값을 뽑아서 index로 쓰기
        var t = this.ans.splice(i, 1); //해당 index문자를 빼서 임시 temp 배열에 넣기
        this.temp.push(t);
        console.log(this.temp);
    }
    this.ans = Array.from(this.temp);
    this.temp = []; //임시배열 다시 비워주기
    this.btnprint();
}
game.suffle2 = function(){ //단어를 뒤집거나 밀어내기 기능만으로 섞어주는 기능
    var toggle = Math.floor(Math.random() * 2) === 0;
    if(toggle){
        this.reversing();
    }
    var n = Math.floor(Math.random() * this.ans.length) + 1;
    for(var i=0; i<n; i++){
        this.rpushing();
    }
}
game.btnprint = function () {
    var contents = document.getElementById('contents');
    while( contents.hasChildNodes()){ //기존에 print한 버튼 지우기
        contents.removeChild(contents.firstChild);
    }
    for (var i = 0; i < this.ans.length; i++) {
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.id = "btn" + i;
        btn.value = this.ans[i];
        
        contents.appendChild(btn);

    }
}
game.checkAns = function() {
    if (game.quiz.toString() == game.ans.toString()) {
        document.getElementById('result').innerHTML = "일치합니다.";
        score.count += 1;
        score.print();
        game.startRound();
    } else {
        document.getElementById('result').innerHTML = "일치하지 않습니다.";
    }
}

game.reversing = function (event) {
    var str = game.ans.reverse();
    game.btnprint(str);
    game.checkAns();
};
game.rpushing = function (event) { //오른쪽으로 밀기
    var right = game.ans.pop();
    game.ans.unshift(right);
    game.btnprint();
    game.checkAns();
}
game.lpushing = function(event){ //왼쪽으로 밀기
    var left = game.ans.shift();
    game.ans.push(left);
    game.btnprint();
    game.checkAns();
}
game.startRound = function(){
    game.random(); //랜덤 퀴즈 문제 선택
    game.suffle2();
    game.btnprint(); //맨처음 문자를 버튼에 표시해주기
}


var score = {
    'count' : 0
}
score.print = function(){
    var result = document.getElementById('score');
    var c = document.createElement('span');
    c.innerHTML = 'O';
    result.appendChild(c);
    if(this.count == 3){
        var c = document.createElement('span');
        c.innerHTML = 'Thank you for playing!';
        result.appendChild(c);
    }
};


game.startRound(); //라운드시작
score.count = 0; //초기점수 0 으로 셋팅