

document.addEventListener('DOMContentLoaded', function () {
    console.log("dom ready!");

    document.getElementById("bos-wp-btn-login").addEventListener("click" , function(){
        console.log("login btn");
        bosWPLogin();
    });

    document.getElementById("bos-wp-btn-logout").addEventListener("click" , function(){
        console.log("logout btn");
        bosWPLogout();
    });
});

window.setTimeout(  function(){
    if (window.NSObject && !window.NSObject.signedIn){
        document.getElementById("bos-wp-btn-login").style.display = "block";
        document.getElementById("bos-wp-btn-logout").style.display = "none";
    }
    

    if (window.NSObject && window.NSObject.signedIn){
        document.getElementById("bos-wp-btn-login").style.display = "none";
        document.getElementById("bos-wp-btn-logout").style.display = "block";
    }
    
}, 2000);


function bosWPLogin() {
    console.log("bos wp login");
    if (window.NSObject && !window.NSObject.signedIn) {
        window.NSObject.requestSignIn();
    };
}


function bosWPLogout() {
    console.log("bos wp logout");
    if (window.NSObject && window.NSObject.signedIn) {
        if( confirm("Confirm logout?") );
        window.NSObject.signOut();
    };
}

