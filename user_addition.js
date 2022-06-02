function valueSet(){
    while(0 < hour1.childNodes.length){
        hour1.removeChild(hour1.childNodes[0]);
    }
    while(0<hour2.childNodes.length){
        hour2.removeChild(hour2.childNodes[0]);
    }
    while(0<minute1.childNodes.length){
        minute1.removeChild(minute1.childNodes[0]);
    }
    while(0<minute2.childNodes.length){
        minute2.removeChild(minute2.childNodes[0]);
    }

    let startHour = 7;
    let endHour = 22;
    let startMinute = 0;
    let endMinute = 50;
    if(nowYear === yearStart && nowMonth === monthStart && nowDay === dayStart && startHour < hourStart){
        startHour = hourStart;
    }
    if(nowYear === yearEnd && nowMonth === monthEnd && nowDay === dayEnd && endHour > hourEnd){
        endHour = hourEnd;
    }

    for(let i=startHour; i<=endHour; i++){
        let tmp = document.createElement('option');
        let tmp2 = document.createElement('option');
        let text = document.createTextNode(i);
        let text2 = document.createTextNode(i);
        tmp.appendChild(text);
        tmp2.appendChild(text2);

        hour1.appendChild(tmp);
        hour2.appendChild(tmp2);
        hour1.options[0].selected = true;
        hour2.options[0].selected = true;
    }
    let hour1NowValue = parseInt(hour1.value, 10);
    let hour2NowValue = parseInt(hour2.value, 10);

    if(nowYear === yearStart && nowMonth === monthStart && nowDay === dayStart && hour1NowValue === hourStart && startMinute < minuteStart){
        startMinute = minuteStart;
    }
    if(nowYear === yearEnd && nowMonth === monthEnd && nowDay === dayEnd && hour2NowValue === hourEnd && endMinute > minuteEnd){
        endMinute = minuteEnd;
    }

    for(let i=startMinute; i<=endMinute; i+=10){
        let tmp = document.createElement('option');
        let tmp2 = document.createElement('option');
        let text = document.createTextNode(i);
        let text2 = document.createTextNode(i);
        tmp.appendChild(text);
        tmp2.appendChild(text2);

        minute1.appendChild(tmp);
        minute2.appendChild(tmp2);
    }
}

function valueChangeUP(){
    console.log("valueChange");
    while(0<minute1.childNodes.length){
        minute1.removeChild(minute1.childNodes[0]);
    }

    let startMinute = 0;
    let endMinute = 50;
    let nowValue = parseInt(hour1.value,10);
    if(nowYear === yearStart && nowMonth === monthStart && nowDay === dayStart && nowValue === hourStart && startMinute < minuteStart){
        startMinute = minuteStart;
    }
    if(nowYear === yearEnd && nowMonth === monthEnd && nowDay === dayEnd && nowValue === hourEnd && endMinute > minuteEnd){
        endMinute = minuteEnd;
    }

    for(let i=startMinute; i<=endMinute; i+=10){
        let tmp = document.createElement('option');
        let text = document.createTextNode(i);
        tmp.appendChild(text);

        minute1.appendChild(tmp);
    }
}

function valueChangeAB(){
    console.log("valueChangeAB");
    while(0<minute2.childNodes.length){
        minute2.removeChild(minute2.childNodes[0]);
    }

    let startMinute = 0;
    let endMinute = 50;
    let nowValue = parseInt(hour2.value,10);
    if(nowYear === yearStart && nowMonth === monthStart && nowDay === dayStart && nowValue === hourStart && startMinute < minuteStart){
        startMinute = minuteStart;
    }
    if(nowYear === yearEnd && nowMonth === monthEnd && nowDay === dayEnd && nowValue === hourEnd && endMinute > minuteEnd){
        endMinute = minuteEnd;
    }

    for(let i=startMinute; i<=endMinute; i+=10){
        let tmp = document.createElement('option');
        let text = document.createTextNode(i);
        tmp.appendChild(text);

        minute2.appendChild(tmp);
    }
}

let minute1 = document.getElementById('minuteX1');
let minute2 = document.getElementById('minuteX2');

let tmp = js_ES.substr(0,4);
const yearStart = parseInt(tmp,10);
tmp = js_ES.substr(5,2);
const monthStart = parseInt(tmp,10);
tmp = js_ES.substr(8,2);
const dayStart = parseInt(tmp,10);
tmp = js_ES.substr(11,2);
const hourStart = parseInt(tmp,10);
tmp = js_ES.substr(14,2);
const minuteStart = parseInt(tmp,10);

tmp = js_EE.substr(0,4);
const yearEnd = parseInt(tmp,10);
tmp = js_EE.substr(5,2);
const monthEnd = parseInt(tmp,10);
tmp = js_EE.substr(8,2);
const dayEnd = parseInt(tmp,10);
tmp = js_EE.substr(11,2);
const hourEnd = parseInt(tmp,10);
tmp = js_EE.substr(14,2);
const minuteEnd = parseInt(tmp,10);

const nowYear = parseInt(js_YEAR, 10);
const nowMonth = parseInt(js_MONTH, 10);
const nowDay = parseInt(js_DAY, 10);


let hour1 = document.getElementById('timeX1');
hour1.addEventListener('change', valueChangeUP);

let hour2 = document.getElementById('timeX2');
hour2.addEventListener('change', valueChangeAB);

valueSet();