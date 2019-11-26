
var getStr = function () {
    var str = document.getElementById('example').innerHTML.split('');
    console.log(str);
    return str;
};
var reversing = function (ans) {
    // console.log(ans);
    var str = ans.reverse();
    btnprint(str);
    console.log(str);
    checkAns();
};
var pushing = function (ans) {
    //오른쪽 밀어내기로 수정
    // var left = ans.shift();
    // ans.push(left);
    var right = ans.pop();
    ans.unshift(right);
    btnprint(ans);
    checkAns();

}
var btnprint = function (ans) {
    // var str = '';
    var contents = document.getElementById('contents');
    for (var i = 0; i < ans.length; i++) {
        // str += "<input type=\"button\" id=\"btn"+i+"\" value=\""+ans[i]+"\">";
        // btn 생성을 createElement() 로 수정
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.id = "btn" + i;
        btn.value = ans[i];
        if (contents.childElementCount != ans.length) {
            contents.appendChild(btn);
        } else {
            contents.removeChild(contents.firstChild);
            contents.appendChild(btn);
        }

    }
    // document.getElementById('contents').innerHTML=str;
}
function checkAns() {
    if (quiz.toString() == ans.toString()) {
        document.getElementById('result').innerHTML = "일치합니다.";
    } else {
        document.getElementById('result').innerHTML = "일치하지 않습니다.";
    }
}
function main() {
    btnprint(quiz);
    checkAns();

}
quiz = getStr();
ans = getStr();
main();
