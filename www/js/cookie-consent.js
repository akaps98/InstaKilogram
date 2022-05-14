function setCookie(name,value,days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    const nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for(let i=0;i < ca.length;i++) {
        let c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

const cookieBtn = document.getElementById('cookieConsentBtn')
if (getCookie('allow-cookie')){
    const cookieMessage = document.getElementById('cookieNotice')
    cookieMessage.style.display = "none";
}

cookieBtn.addEventListener('click', () => {
    setCookie('allow-cookie', true, 1)
    if (getCookie('allow-cookie')){
        const cookieMessage = document.getElementById('cookieNotice')
        cookieMessage.style.display = "none";
    }
})


