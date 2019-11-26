

var game = {
    'quiz' : document.getElementById('example').innerHTML.split(''),
    'ans' : document.getElementById('example').innerHTML.split('')
};
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


game.btnprint(); //맨처음 문자를 버튼에 표시해주기
