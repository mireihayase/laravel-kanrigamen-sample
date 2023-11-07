var tableEle = document.getElementById('table2');
let select = document.querySelector('[name="select-value"]');
const num = select.selectedIndex;
var selectV = select.options[num].value;






// テーブルチェックボックス切り替え
const trClick = (num) => {
    document.getElementById("table2-b1-" + num).checked ^= 1;
};

let checkAll = document.getElementById("checkAll");
let el = document.getElementsByClassName("checks");
const funcCheckAll = (bool) => {
    for (let i = 0; i < el.length; i++) {
        el[i].checked = bool;
    }
}

const funcCheck = () => {
    let count = 0;
    for (let i = 0; i < el.length; i++) {
        if (el[i].checked) {
            count += 1;
        }
    }
    window.scroll({ top: 0, behavior: 'smooth' });
    if (el.length === count) {
        checkAll.checked = true;
    } else {

        checkAll.checked = false;
    }
};

checkAll.addEventListener("click", () => {
    funcCheckAll(checkAll.checked);
}, false);

for (let i = 0; i < el.length; i++) {
    el[i].addEventListener("click", funcCheck, false);
}


// ボディライトメニュー操作--------------------------

document.getElementById("body-a1").style.display = "none";
document.getElementById("body-a2").style.display = "block";

function clickBtn1() {
    const bodya1 = document.getElementById("body-a1");
    const bodya2 = document.getElementById("body-a2");
    if (bodya1.style.display == "block") {
        bodya1.style.display = "none";
    } else {
        bodya1.style.display = "block";
        bodya2.style.display = "none";
    }
}

function clickBtn2() {
    const bodya1 = document.getElementById("body-a1");
    const bodya2 = document.getElementById("body-a2");
    if (bodya2.style.display == "block") {
        bodya2.style.display = "none";
    } else {
        bodya1.style.display = "none";
        bodya2.style.display = "block";
    }
}

function onSelectChange(select) {
    var params = new URLSearchParams(window.location.search);
    params.set('paginate', select.value);
    window.location.search = params.toString();
}