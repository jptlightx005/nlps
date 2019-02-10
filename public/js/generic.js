
function popupWindow(url){
    var height = screen.height - 100;
    if(height >= 792)
        height = 792;
    window.open(url, '', 'width=900,height='+(height));
    return false;
}

function printPopupWindow(url){
    var height = screen.height - 100;
    if(height >= 792)
        height = 792;
    var popupWinddow = window.open(url, '', 'width=900,height='+(height));
    popupWinddow.print();
    return false;
}