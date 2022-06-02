function getLastDay (year,month) {
    const D =new Date(year,month,0).getDate(); 
    return D;
}

function valueChangeUp(){
    let select1 = document.getElementById('day1');
    let dayNumUp = getLastDay(yearSelect1.value,monthSelect1.value);

	// option要素を削除
	while (0 < select1.childNodes.length) {
		select1.removeChild(select1.childNodes[0]);
	}

	// option要素を生成、張り付け
    for($i= 1; $i<=dayNumUp; $i++){
        let option1 = document.createElement('option');
        let text = document.createTextNode($i);
        option1.appendChild(text);

        select1.appendChild(option1);
    }

    //テスト用
    //const dayNum = getLastDay(2022,2);
    //console.log(dayNum);
}

function valueChangeLow(){
    let select2 = document.getElementById('day2');
    let dayNumLow = getLastDay(yearSelect2.value, monthSelect2.value);

    while(0 < select2.childNodes.length) {
        select2.removeChild(select2.childNodes[0]);
    }

    for($j = 1; $j<=dayNumLow; $j++){
        let option2 = document.createElement('option');
        let text = document.createTextNode($j);
        option2.appendChild(text);

        select2.appendChild(option2);
    }
}

//開始年
let yearSelect1 = document.getElementById('year1');
yearSelect1.options[0].selected = true;//最初の選択肢を選択しておく
yearSelect1.addEventListener('change',valueChangeUp);

//開始月
let monthSelect1 = document.getElementById('month1');
monthSelect1.options[0].selected = true;
monthSelect1.addEventListener('change',valueChangeUp);

//終了年
let yearSelect2 = document.getElementById('year2');
yearSelect2.options[0].selected = true;
yearSelect2.addEventListener('change',valueChangeLow);

//終了月
let monthSelect2 = document.getElementById('month2');
monthSelect2.options[0].selected = true;
monthSelect2.addEventListener('change',valueChangeLow);

//const dayNumTest = getLastDay(2022,2);
//確認用
//console.log(dayNum);
