

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
        var i = Math.floor(Math.random() * this.ans.length);
        var t = this.ans.splice(i, 1);
        this.temp.push(t);
        console.log(this.temp);
    }
    this.ans = Array.from(this.temp);
    this.temp = [];
    this.btnprint();

}
game.btnprint = function () {
    var contents = document.getElementById('contents');
    for (var i = 0; i < this.ans.length; i++) {
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.id = "btn" + i;
        btn.value = this.ans[i];
        if (contents.childElementCount != this.ans.length) {
            contents.appendChild(btn);
        } else {
            contents.removeChild(contents.firstChild);
            contents.appendChild(btn);
        }

    }
}
game.checkAns = function() {
    if (game.quiz.toString() == game.ans.toString()) {
        document.getElementById('result').innerHTML = "일치합니다.";
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

game.random(); //랜덤 퀴즈 문제 선택
game.btnprint(); //맨처음 문자를 버튼에 표시해주기
