// 戻る禁止--------------------------
history.pushState(null, null, location.href);
window.addEventListener('popstate', (e) => {
    history.go(1);
});

// リダイレクト処理--------------------------
const logout = () => {
    window.location.href = 'login.html';
}

const add = () => {
    window.location.href = 'add.html';
}

const list = () => {
    window.location.href = 'list.html';
}

const detail = () => {
    window.location.href = 'detail.html';
}



const setting = () => {
    window.location.href = 'setting.html';
}

