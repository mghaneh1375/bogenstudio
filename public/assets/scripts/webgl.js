/**/

function $$(x) {
    return document.getElementById(x);
}

// Add indexOf to IE.
if(!Array.indexOf){
    Array.prototype.indexOf = function(obj){
        for(var i=0; i<this.length; i++){
            if(this[i]==obj){
                return i;
            }
        }
        return -1;
    }
}

var canvas, gl;

function launchLogo() {
    initializeLogo(canvas);
}

function log(msg) {
    var d = document.createElement("div");
    d.appendChild(document.createTextNode(msg));
    document.body.appendChild(d);
}

function removeClass(element, clas) {
    // Does not work in IE var classes = element.getAttribute("class");
    var classes = element.className;
    if (classes) {
        var cs = classes.split(/\s+/);
        if (cs.indexOf(clas) != -1) {
            cs.splice(cs.indexOf(clas), 1);
        }
        // Does not work in IE element.setAttribute("class", cs.join(" "));
        element.className = cs.join(" ");
    }
}

function addClass(element, clas) {
    element.className = element.className + " " + clas;
}

function pageLoaded() {
    removeClass($$("have-javascript"), "hidden");
    addClass($$("no-javascript"), "hidden");

    canvas = document.getElementById("webgl-logo");
    var ratio = (window.devicePixelRatio ? window.devicePixelRatio : 1);
    canvas.width = 140 * ratio;
    canvas.height = 150 * ratio;
    var experimental = false;
    try { gl = canvas.getContext("webgl"); }
    catch (x) { gl = null; }

    if (gl == null) {
        try { gl = canvas.getContext("experimental-webgl"); experimental = true; }
        catch (x) { gl = null; }
    }

    if (gl) {
        removeClass($$("webgl-yes"), "hidden");
        launchLogo();
    } else if ("WebGLRenderingContext" in window) {
        // not a foolproof way to check if the browser
        // might actually support WebGL, but better than nothing
        removeClass($$("webgl-disabled"), "hidden");
    } else {
        // Show the no webgl message.
        removeClass($$("webgl-no"), "hidden");
    }
}

// addEventListener does not work on IE7/8.
window.onload = pageLoaded;

