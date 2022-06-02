function getLastDay (year,month) {
    const D =new Date(year,month,0).getDate(); 
    return D;
}

function valueSet(){
    console.log("ValueSet");
    // option要素を削除(Day)
	while (0 < Day.childNodes.length) {
		Day.removeChild(Day.childNodes[0]);
	}

    //option削除(year)
    while(0 < Year.childNodes.length) {
        Year.removeChild(Year.childNodes[0]);
    }

    //option削除(Month)
    while(0 < Month.childNodes.length) {
        Month.removeChild(Month.childNodes[0])
    }


    for($i = startYear; $i <=endYear; $i++) {
        let tmpY = document.createElement('option');
        let text = document.createTextNode($i);
        tmpY.appendChild(text);

        Year.appendChild(tmpY);
    }

    //year
    for(let i = 0; i < 8; i++){
        let control = parseInt(Year.options[i].value, 10);
        if(control === planStartYear){
            Year.options[i].selected = true;
            break;
        }
    }

    let startMonthGenerate = 1;
    let stopMonthGenerate = 12;
    let yearValue = parseInt(Year.value, 10);
    if(yearValue === endYear && stopMonthGenerate > endMonth){
        stopMonthGenerate = endMonth;
    }
    if(yearValue === startYear && startMonthGenerate < startMonth){
        startMonthGenerate = startMonth;
    }
    for($i = startMonthGenerate; $i <=stopMonthGenerate; $i++) {
        let tmpM = document.createElement('option');
        let text = document.createTextNode($i);
        tmpM.appendChild(text);

        Month.appendChild(tmpM);
    }

    //month
    for(let i = 0; i < 12; i++){
        let control = parseInt(Month.options[i].value, 10);
        if(control === planStartMonth){
            Month.options[i].selected = true;
            break;
        }
    }

    valueChangePrimary();
}

function valueChangePrimary(){
    console.log("valueChangePrimary");
    valueChange();

    //day
    for(let i = 0; i < 35; i++){
        let control = parseInt(Day.options[i].value, 10);
        if(control === planStartDay){
            Day.options[i].selected = true;
            break;
        }
    }

    //minute1
    for(let i = 0; i < 6; i++){
        let control = parseInt(minute1.options[i].value, 10);
        if(control === planStartMinute){
            minute1.options[i].selected = true;
            break;
        }
    }
    
    //hour1
    for(let i = 0; i < 18; i++){
        let control = parseInt(hour1.options[i].value, 10);
        if(control === planStartHour){
            hour1.options[i].selected = true;
            break;
        }
    }

    //hour2
    for(let i = 0; i < 18; i++){
        let control = parseInt(hour2.options[i].value, 10);
        if(control === planEndHour){
            hour2.options[i].selected = true;
            break;
        }
    }

    //minute2
    for(let i = 0; i < 6; i++){
        let control = parseInt(minute2.options[i].value, 10);
        if(control === planEndMinute){
            minute2.options[i].selected = true;
            break;
        }
    }
}

function valueChange(){
    let dayNum = getLastDay(Year.value,Month.value);
    let monthValue = parseInt(Month.value, 10);
    let yearValue = parseInt(Year.value, 10);
    let VCStart = 1;

    if(yearValue === startYear && monthValue === startMonth && VCStart < startDay){
        VCStart = startDay;
        console.log("VCStart");
    }

    if(yearValue === endYear && monthValue === endMonth && dayNum > endDay){
        dayNum = endDay;
        console.log("dayNum");
    }

	// option要素を削除(Day)
	while (0 < Day.childNodes.length) {
		Day.removeChild(Day.childNodes[0]);
	}

	// option要素を生成、張り付け
    for(let i= VCStart; i<=dayNum; i++){
        let option1 = document.createElement('option');
        let text = document.createTextNode(i);
        option1.appendChild(text);

        Day.appendChild(option1);
    }

    valueChangeHour();

    //テスト用
    //const dayNum = getLastDay(2022,2);
    //console.log(dayNum);
}

function valueChangeAdvanced(){
    //option削除(Month)
    while(0 < Month.childNodes.length) {
        Month.removeChild(Month.childNodes[0])
    }

    let startMonthGenerate = 1;
    let stopMonthGenerate = 12;
    let yearValue = parseInt(Year.value, 10);
    if(yearValue === endYear && stopMonthGenerate > endMonth){
        stopMonthGenerate = endMonth;
    }
    if(yearValue === startYear && startMonthGenerate < startMonth){
        startMonthGenerate = startMonth;
    }
    for($i = startMonthGenerate; $i <=stopMonthGenerate; $i++) {
        let tmpM = document.createElement('option');
        let text = document.createTextNode($i);
        tmpM.appendChild(text);

        Month.appendChild(tmpM);
    }
    valueChange();
}

function valueChangeHour(){
    //hour,minuteの処理
    let monthValue = parseInt(Month.value, 10);
    let yearValue = parseInt(Year.value, 10);
    let dayValue = parseInt(Day.value, 10);
    let HourStart = 7;
    let HourEnd = 22;
    if(yearValue === startYear && monthValue === startMonth && dayValue === startDay && HourStart < startHour){
        HourStart = startHour;
    }
    if(yearValue === endYear && monthValue === endMonth && dayValue === endDay && HourEnd > endHour){
        HourEnd = endHour;
    }
    console.log(HourStart);
    console.log(HourEnd);

    while (0 < hour1.childNodes.length){
        hour1.removeChild(hour1.childNodes[0]);
    }
    while (0 < hour2.childNodes.length){
        hour2.removeChild(hour2.childNodes[0]);
    }
    for(i=HourStart; i<=HourEnd; i++){
        let option1 = document.createElement('option');
        let text = document.createTextNode(i);
        option1.appendChild(text);

        hour1.appendChild(option1);
    }
    for(i=HourStart; i<=HourEnd; i++){
        let option1 = document.createElement('option');
        let text = document.createTextNode(i);
        option1.appendChild(text);

        hour2.appendChild(option1);
    }

    //hour1
    for(let i = 0; i < 18; i++){
        let control = parseInt(hour1.options[i].value, 10);
        if(control === planStartHour){
            hour1.options[i].selected = true;
            break;
        }
    }

    //hour2
    for(let i = 0; i < 18; i++){
        let control = parseInt(hour2.options[i].value, 10);
        if(control === planEndHour){
            hour2.options[i].selected = true;
            break;
        }
    }

    valueChangeMinute();
}
function valueChangeMinute(){
    let monthValue = parseInt(Month.value, 10);
    let yearValue = parseInt(Year.value, 10);
    let dayValue = parseInt(Day.value, 10);
    let hour1Value = parseInt(hour1.value, 10);
    let hour2Value = parseInt(hour2.value, 10);
    let MinuteStart = 0;
    let MinuteEnd = 50;
    let MinuteStart2 = 0;
    let MinuteEnd2 = 50;
    if(yearValue === startYear && monthValue === startMonth && dayValue === startDay && hour1Value === startHour && MinuteStart < startMinute){
        MinuteStart = startMinute;
    }
    if(yearValue === endYear && monthValue === endMonth && dayValue === endDay && hour1Value === endHour && MinuteEnd > endMinute){
        MinuteEnd = endMinute;
    }
    if(yearValue === startYear && monthValue === startMonth && dayValue === startDay && hour2Value === startHour && MinuteStart2 < startMinute){
        MinuteStart2 = startMinute;
    }
    if(yearValue === endYear && monthValue === endMonth && dayValue === endDay && hour2Value === endHour && MinuteEnd2 > endMinute){
        MinuteEnd2 = endMinute;
    }

    while (0 < minute1.childNodes.length){
        minute1.removeChild(minute1.childNodes[0]);
    }
    while (0 < minute2.childNodes.length){
        minute2.removeChild(minute2.childNodes[0]);
    }
    for(i=MinuteStart; i<=MinuteEnd; i+=10){
        let option1 = document.createElement('option');
        let text = document.createTextNode(i);
        option1.appendChild(text);

        minute1.appendChild(option1);
    }
    for(i=MinuteStart2; i<=MinuteEnd2; i+=10){
        let option1 = document.createElement('option');
        let text = document.createTextNode(i);
        option1.appendChild(text);

        minute2.appendChild(option1);
    }
}

//値受け取る
let startYear = js_RES.substr(0,4);
startYear = parseInt(startYear, 10);
let startMonth = js_RES.substr(5,2);
startMonth =  parseInt(startMonth, 10);
let startDay = js_RES.substr(8,2);
startDay = parseInt(startDay,10);
let tmp = js_RES.substr(11,2);
const startHour = parseInt(tmp, 10);
tmp = js_RES.substr(14,2);
const startMinute = parseInt(tmp,10);

let endYear = js_REE.substr(0,4);
endYear = parseInt(endYear, 10);
let endMonth = js_REE.substr(5,2);
endMonth = parseInt(endMonth, 10);
let endDay = js_REE.substr(8,2);
endDay = parseInt(endDay, 10);
tmp = js_REE.substr(11,2);
const endHour = parseInt(tmp,10);
tmp = js_REE.substr(14,2);
const endMinute = parseInt(tmp,10);

let tmpN = js_Start.substr(0,4);
const planStartYear = parseInt(tmpN,10);
tmpN = js_Start.substr(5,2);
const planStartMonth = parseInt(tmpN, 10);
tmpN = js_Start.substr(8,2);
const planStartDay = parseInt(tmpN, 10);
tmpN = js_Start.substr(11,2);
const planStartHour = parseInt(tmpN,10);
tmpN = js_Start.substr(14,2);
const planStartMinute = parseInt(tmpN,10);

tmpN = js_End.substr(11,2);
const planEndHour = parseInt(tmpN,10);
tmpN = js_End.substr(14,2);
const planEndMinute = parseInt(tmpN,10);

//年
let Year = document.getElementById('Years');
Year.options[0].selected = true;//最初の選択肢を選択しておく
Year.addEventListener('change',valueChangeAdvanced);

//月
let Month = document.getElementById('Months');
Month.options[0].selected = true;
Month.addEventListener('change',valueChange);

//日
let Day = document.getElementById('Days');
Day.options[0].selected = true;
Day.addEventListener('change', valueChangeHour);

let hour1 = document.getElementById('hour1');
hour1.addEventListener('change', valueChangeMinute);
let minute1 = document.getElementById('minute1');

let hour2 = document.getElementById('hour2');
hour2.addEventListener('change', valueChangeMinute);
let minute2 = document.getElementById('minute2');


//const dayNumTest = getLastDay(2022,2);
//確認用
//console.log(dayNum);

valueSet();
