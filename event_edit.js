function getLastDay (year,month) {
    const D =new Date(year,month,0).getDate();
    return D;
}

function valueSet(){
    console.log("ValueSet");

    //year1
    for(let i = 0; i < 4; i++){
        let control = parseInt(yearSelect1.options[i].value, 10);
        if(control === startYear){
            yearSelect1.options[i].selected = true;
            break;
        }
    }

    //year2
    for(let i = 0; i < 4; i++){
        control = parseInt(yearSelect2.options[i].value, 10);
        if(control === endYear){
            yearSelect2.options[i].selected = true;
            break;
        }
    }

    //month1
    for(let i = 0; i < 12; i++){
        control = parseInt(monthSelect1.options[i].value, 10);
        if(control === startMonth){
            monthSelect1.options[i].selected = true;
            break;
        }
    }

    //month2
    for(let i = 0; i < 12; i++){
        control = parseInt(monthSelect2.options[i].value, 10);
        if(control === endMonth){
            monthSelect2.options[i].selected = true;
            break;
        }
    }

    //day1
    for(let i = 0; i < 31; i++){
        control = parseInt(daySelect1.options[i].value, 10);
        if(control === startDay){
            daySelect1.options[i].selected = true;
            break;
        }
    }

    //day2
    for(let i = 0; i < 31; i++){
        control = parseInt(daySelect2.options[i].value, 10);
        if(control === endDay){
            daySelect2.options[i].selected = true;
            break;
        }
    }

    //hour1
    for(let i = 0; i < 24; i++){
        control = parseInt(hourSelect1.options[i].value, 10);
        if(control === startHour){
            hourSelect1.options[i].selected = true;
            break;
        }
    }

    //hour2
    for(let i = 0; i < 24; i++){
        control = parseInt(hourSelect2.options[i].value, 10);
        if(control === endHour){
            hourSelect2.options[i].selected = true;
            break;
        }
    }

    //minute1
    for(let i = 0; i < 6; i++){
        control = parseInt(minuteSelect1.options[i].value, 10);
        if(control === startMinute){
            minuteSelect1.options[i].selected = true;
            break;
        }
    }

    //minute2
    for(let i = 0; i < 6; i++){
        control = parseInt(minuteSelect2.options[i].value, 10);
        if(control === endMinute){
            minuteSelect2.options[i].selected = true;
            break;
        }
    }
}

function valueChangeUp(){
    let dayNumUp = getLastDay(yearSelect1.value,monthSelect1.value);

	// option要素を削除
	while (0 < daySelect1.childNodes.length) {
		daySelect1.removeChild(daySelect1.childNodes[0]);
	}

	// option要素を生成、張り付け
    for($i= 1; $i<=dayNumUp; $i++){
        let option1 = document.createElement('option');
        let text = document.createTextNode($i);
        option1.appendChild(text);

        daySelect1.appendChild(option1);
    }

    //テスト用
    //const dayNum = getLastDay(2022,2);
    //console.log(dayNum);
}

function valueChangeLow(){
    let dayNumLow = getLastDay(yearSelect2.value, monthSelect2.value);

    while(0 < daySelect2.childNodes.length) {
        daySelect2.removeChild(daySelect2.childNodes[0]);
    }

    for($j = 1; $j<=dayNumLow; $j++){
        let option2 = document.createElement('option');
        let text = document.createTextNode($j);
        option2.appendChild(text);

        daySelect2.appendChild(option2);
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

//その他の要素の回収
let daySelect1 = document.getElementById('day1');
let daySelect2 = document.getElementById('day2');
let hourSelect1 = document.getElementById('hour1');
let hourSelect2 = document.getElementById('hour2');
let minuteSelect1 = document.getElementById('minute1');
let minuteSelect2 = document.getElementById('minute2');

//受け取った値の処理
let tmp = js_ES.substr(0,4);
const startYear = parseInt(tmp,10);
tmp = js_ES.substr(5,2);
const startMonth = parseInt(tmp, 10);
tmp = js_ES.substr(8,2);
const startDay = parseInt(tmp, 10);
tmp = js_ES.substr(11,2);
const startHour = parseInt(tmp, 10);
tmp = js_ES.substr(14,2);
const startMinute = parseInt(tmp,10);

tmp = js_EE.substr(0,4);
const endYear = parseInt(tmp,10);
tmp = js_EE.substr(5,2);
const endMonth = parseInt(tmp, 10);
tmp = js_EE.substr(8,2);
const endDay = parseInt(tmp, 10);
tmp = js_EE.substr(11,2);
const endHour = parseInt(tmp, 10);
tmp = js_EE.substr(14,2);
const endMinute = parseInt(tmp,10);



//const dayNumTest = getLastDay(2022,2);
//確認用
//console.log(dayNum);

valueSet();
