document.addEventListener('DOMContentLoaded', () => {

    const HELLO_POPUP = document.querySelector('#hello-popup-popup');
    const HELLO_POPUP_CONTENT = document.querySelector('#hello-popup-content');

    HELLO_POPUP.addEventListener("click", (target) => {
        console.log(target.target);
        if(target.target == HELLO_POPUP){
            HELLO_POPUP.remove();
        }
    });

});
